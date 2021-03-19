from django.db import models


class Note(models.Model):
    string = models.CharField(max_length=100)

    def __str__(self):
        return f'{self.string}'


class Option(models.Model):
    max_weight = models.FloatField()
    price = models.FloatField()

    def __str__(self):
        return f'{self.max_weight, self.price}'


class PriceList(models.Model):
    quantity = models.IntegerField()
