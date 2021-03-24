from rest_framework import serializers

from .models import Note, PriceList, Option


class NoteSerializer(serializers.ModelSerializer):
    class Meta:
        model = Note
        fields = ["string"]


class PriceListSerializer(serializers.ModelSerializer):
    class Meta:
        model = PriceList
        fields = ('main_identifier', 'quantity', 'options')


class OptionSerializer(serializers.ModelSerializer):
    class Meta:
        model = Option
        fields = ('max_weight', 'price')
