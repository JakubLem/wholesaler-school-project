from rest_framework.response import Response
from rest_framework.views import APIView
from rest_framework.viewsets import ModelViewSet
from . import serializers
from .models import Company

class GetTestViewSet(APIView):
    def get(self, request):
        return Response("OK")


class CompanyViewSet(ModelViewSet):  # noqa:R0901
    queryset = Company.objects.all()
    serializer_class = serializers.CompanySerializer
    lookup_field = 'identifier'
    lookup_url_kwarg = 'identifier'
