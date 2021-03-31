from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework.viewsets import ModelViewSet
from .models import Note, PriceList, Option
from django.shortcuts import get_object_or_404

from . import serializers, validators


class GetTestViewSet(APIView):
    def get(self, request):
        return Response("OK")


class LoadStartDataViewSet(APIView):
    MAIN_PRICELIST_IDENTIFIER = 'mainwsppricelist'

    def check(self):
        try:
            main_pricelist = PriceList.objects.get(main_identifier=self.MAIN_PRICELIST_IDENTIFIER)
            return False
        except:
            return True
        return True

    def post(self, request):
        validators.validate_load_start_data(request)
        
        # TODO WSP-42 TOKEN VALIDATE
        
        if self.check():
            pricelistarray = [
                {'max_weight': 10,'price': 9},
                {'max_weight': 35,'price': 19},
                {'max_weight': 50,'price': 29},
                {'max_weight': 65,'price': 49},
                {'max_weight': 80,'price': 59},
                {'max_weight': 90,'price': 69},
                {'max_weight': 100,'price': 79},
                {'max_weight': 125,'price': 99},
                {'max_weight': 150,'price': 119},
                {'max_weight': 175,'price': 199},
                {'max_weight': 20000000,'price': 249},
            ]

            PriceList.objects.create(
                main_identifier=self.MAIN_PRICELIST_IDENTIFIER,
                quantity=len(pricelistarray)
            )

            for option in pricelistarray:
                Option.objects.create(max_weight=option['max_weight'], price=option['price'], price_list=self.MAIN_PRICELIST_IDENTIFIER)
            return Response("load")
        return Response("exists")

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


class OptionViewSet(ModelViewSet):
    serializer_class = serializers.OptionSerializer
    queryset = Option.objects.all()

