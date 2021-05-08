# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
from django.db import models


class Note(models.Model):
    string = models.CharField(max_length=100)

    def __str__(self):
        return f'{self.string}'


class PriceList(models.Model):
    main_identifier = models.CharField(max_length=100)
    quantity = models.IntegerField()

    def __str__(self):
        return f'{self.main_identifier, self.quantity}'


class Option(models.Model):
    max_weight = models.FloatField()
    price = models.FloatField()
    price_list = models.ForeignKey(PriceList, null=False, blank=False, on_delete=models.CASCADE, related_name='options')

    def __str__(self):
        return f'{self.max_weight, self.price}'

    @property
    def json_view(self):
        result = {
            'id': self.id,
            'max_weight': self.max_weight,
            'price': self.price
        }
        return result


class Producer(models.Model):
    name = models.CharField(max_length=100)
    short_description = models.CharField(max_length=150)
    year_of_created = models.IntegerField()


class Category(models.Model):
    name = models.CharField(max_length=100)
    short_description = models.CharField(max_length=150)


class Product(models.Model):
    name = models.CharField(max_length=100)
    category = models.ForeignKey(Category, null=False, blank=False, on_delete=models.CASCADE, related_name='products')
    price = models.FloatField()
    promo_price = models.FloatField()
    status = models.BooleanField()
    producer = models.ForeignKey(Producer, null=False, blank=False, on_delete=models.CASCADE, related_name='products')
