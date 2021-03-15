from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework.viewsets import ModelViewSet
from .models import Note
from . import serializers


class GetTestViewSet(APIView):
    def get(self, request):
        return Response("OK")


class NoteViewSet(ModelViewSet):
    queryset = Note.objects.all()
    serializer_class = serializers.NoteSerializer
    lookup_field = "id"