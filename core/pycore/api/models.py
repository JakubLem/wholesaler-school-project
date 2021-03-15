from django.db import models


class Note(models.Model):
    string = models.CharField(max_length=100)

    def __str__(self):
        return self.string
