from rest_framework import serializers
from django.shortcuts import get_object_or_404
from django.core.exceptions import ValidationError
from .models import Note, PriceList, Option


class NoteSerializer(serializers.ModelSerializer):
    class Meta:
        model = Note
        fields = ["string"]


class PriceListSerializer(serializers.ModelSerializer):
    options = serializers.SlugRelatedField(many=True, read_only=True, slug_field='main_identifier')
    
    class Meta:
        model = PriceList
        fields = ('id', 'main_identifier', 'quantity', 'options')


class OptionSerializer(serializers.ModelSerializer):
    price_list = serializers.CharField(max_length=150)

    class Meta:
        model = Option
        fields = ('id', 'max_weight', 'price', 'price_list')

    def validate(self, data):
        try:
            price_list = get_object_or_404(PriceList, main_identifier=data['price_list'])
        except Exception:
            raise ValidationError("PriceList with identifier {identifier} doesn't exist".format(
                identifier=data['price_list']
            ))
        data['price_list'] = price_list

        return data
