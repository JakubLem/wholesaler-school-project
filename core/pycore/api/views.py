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
    def post(self, request):
        validators.validate_load_start_data(request)
        


        return Response("load")
        

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

