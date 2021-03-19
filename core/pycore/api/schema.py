import graphene
from graphene_django import DjangoObjectType

from .models import Note


class NoteType(DjangoObjectType):
    class Meta:
        model = Note
        fields = ("id", "string")


class Query(graphene.ObjectType):
    notes = graphene.List(NoteType)

    def resolve_notes(self, info):
        return Note.objects.all()

schema = graphene.Schema(query=Query)