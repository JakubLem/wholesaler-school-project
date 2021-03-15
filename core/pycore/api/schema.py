import graphene
from graphene_django import DjangoObjectType

from .models import Note


class NoteType(DjangoObjectType):
    class Meta:
        model = Note
        fields = ("id", "string")


class Query(graphene.ObjectType):
    all_notes = graphene.List(NoteType)

schema = graphene.Schema(query=Query)