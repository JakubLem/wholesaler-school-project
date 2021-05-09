# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
from rest_framework import serializers
from django.shortcuts import get_object_or_404
from django.core.exceptions import ValidationError
from .models import Note, PriceList, Option, Product, Producer, Category
from . import validators


class NoteSerializer(serializers.ModelSerializer):
    class Meta:
        model = Note
        fields = ["string"]


class CategorySerializer(serializers.ModelSerializer):
    class Meta:
        model = Category
        fields = ('id', 'name', 'short_description')

    def validate(self, data):
        validators.validate_category(data)


class ProducerSerializer(serializers.ModelSerializer):
    class Meta:
        model = Producer
        fields = ('id', 'name', 'short_description', 'year_of_created')

    def validate(self, data):
        validators.validate_producer(data)


class ProductSerializer(serializers.ModelSerializer):
    class Meta:
        model = Product
        fields = ('id', 'name', 'category', 'price', 'promo_price', 'status', 'producer')

    def validate(self, data):
        validators.validate_product(data=data)


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
            identifier = data['price_list']
        except Exception as e:  # noqa:W0612
            raise ValidationError("price_list argument is missing")  # noqa

        try:
            price_list = get_object_or_404(PriceList, main_identifier=identifier)
        except Exception as e:  # noqa:W0612
            raise ValidationError("PriceList with main_identifier {identifier} does not exist".format(identifier=identifier))  # noqa
        data['price_list'] = price_list

        return data


class XlsxPriceListSerializer(serializers.Serializer):
    pricelistfile = serializers.FileField(validators=[validators.validate_xlsx_file])
