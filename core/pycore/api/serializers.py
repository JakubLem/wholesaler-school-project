# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
from rest_framework import serializers
from django.shortcuts import get_object_or_404
from django.core.exceptions import ValidationError
from .models import Note, PriceList, Option


class NoteSerializer(serializers.ModelSerializer):
    class Meta:
        model = Note
        fields = ["string"]


class PriceListSerializer(serializers.ModelSerializer):
    options = serializers.SlugRelatedField(many=True, read_only=True, slug_field='id')

    class Meta:
        model = PriceList
        fields = ('id', 'main_identifier', 'quantity', 'options')


class OptionSerializer(serializers.ModelSerializer):
    price_list = serializers.CharField(max_length=100)

    class Meta:
        model = Option
        fields = ('id', 'max_weight', 'price', 'price_list')

    def validate(self, data):  # noqa:W0221
        try:
            price_list = get_object_or_404(PriceList, main_identifier=data['price_list'])
        except Exception:
            raise ValidationError("PriceList with main_identifier {main_identifier} doesn't exist")
        data['price_list'] = price_list

        return data


class XlsxPriceListSerializer(serializers.Serializer):
    def validate(self, data):
        return data

    pricelistfile = serializers.FileField()
