from django.db import models


class Note(models.Model):
    string = models.CharField(max_length=100)

    def __str__(self):
        return f'{self.string}'


class PriceList(models.Model):
    quantity = models.IntegerField()


class Option(models.Model):
    max_weight = models.FloatField()
    price = models.FloatField()
    price_list = models.ForeignKey(PriceList, null=False, blank=False, on_delete=models.CASCADE, related_name='options')

    def __str__(self):
        return f'{self.max_weight, self.price}'