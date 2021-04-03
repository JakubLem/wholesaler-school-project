from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework.viewsets import ModelViewSet
from rest_framework.decorators import action
from .models import Note, PriceList, Option
from django.shortcuts import get_object_or_404
from openpyxl import load_workbook
from . import serializers


class GetTestViewSet(APIView):
    def get(self, request):
        return Response("OK")


class NoteViewSet(ModelViewSet):
    serializer_class = serializers.NoteSerializer
    queryset = Note.objects.all()


class PriceListViewSet(ModelViewSet):
    serializer_class = serializers.PriceListSerializer
    queryset = PriceList.objects.all()
    lookup_field = 'main_identifier'
    lookup_url_kwarg = 'main_identifier'

    def retrieve(self, request, main_identifier=None):
        queryset = PriceList.objects.all()
        pricelist = get_object_or_404(queryset, main_identifier=main_identifier)
        serializer = serializers.PriceListSerializer(pricelist)

        response = {
            'price_list': serializer.data['main_identifier'],
            'options': list()
        }

        for pk in serializer.data['options']:
            option = get_object_or_404(Option, pk=pk)
            response['options'].append(
                option.json_view
            )

        return Response(response)

    @action(detail=False, methods=['post'], serializer_class=serializers.XlsxPriceListSerializer)
    def upload_mainwsppricelist(self, request):
        serializer = serializers.XlsxPriceListSerializer(data=request.data)
        if not serializer.is_valid():
            raise BaseException("error")

        def delete():
            try:
                mainwsppricelist = get_object_or_404(PriceList, main_identifier='mainwsppricelist')
                mainwsppricelist.delete()
            except:
                pass            

        delete()

        mainwsppricelist = PriceList(main_identifier='mainwsppricelist', quantity=0)
        mainwsppricelist.save()

        file_object = serializer.validated_data['pricelistfile']
        workbook = load_workbook(file_object)
        worksheet = workbook.active
        worksheet_size = worksheet.max_row + 1
        options = list()

        for i in range(2, worksheet_size, 1):
            option_max_weight = worksheet[f'A{i}'].value
            option_price = worksheet[f'B{i}'].value
            option = Option(max_weight=option_max_weight, price=option_price, price_list=mainwsppricelist)
            option.save()
            options.append(option)
        
        mainwsppricelist.quantity = len(options)
        mainwsppricelist.save()
        return Response({"OK": len(options)})


class OptionViewSet(ModelViewSet):
    serializer_class = serializers.OptionSerializer
    queryset = Option.objects.all()
