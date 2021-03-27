import graphene
from graphene_django import DjangoObjectType

from .models import Note, Option, PriceList


class NoteType(DjangoObjectType):
    class Meta:
        model = Note
        fields = ("id", "string")


class OptionType(DjangoObjectType):
    class Meta:
        model = Option
        fields = ("max_weight", "price")


class PriceListType(DjangoObjectType):
    class Meta:
        model = PriceList
        fields = ("main_identifier", "options")


class Query(graphene.ObjectType):
    notes = graphene.List(NoteType)

    def resolve_notes(self, info):
        return Note.objects.all()

schema = graphene.Schema(query=Query)