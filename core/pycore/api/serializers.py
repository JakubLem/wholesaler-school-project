from rest_framework import serializers

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
    class Meta:
        model = Option
        fields = ('id', 'max_weight', 'price')
