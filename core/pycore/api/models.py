from datetime import datetime
from django.db import models
from django.utils.crypto import get_random_string


def ownrandomstring():
    return get_random_string(length=20)


class Company(models.Model):
    identifier = models.CharField(max_length=150, default=ownrandomstring)
    nip = models.CharField(max_length=13)
    fullname = models.CharField(max_length=150)

    def __str__(self):
        return f'{self.identifier, self.nip, self.fullname}'
