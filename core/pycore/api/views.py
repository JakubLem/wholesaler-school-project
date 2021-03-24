from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework.viewsets import ModelViewSet
from .models import Note, PriceList, Option
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


class OptionViewSet(ModelViewSet):
    serializer_class = serializers.OptionSerializer
    queryset = Option.objects.all()

