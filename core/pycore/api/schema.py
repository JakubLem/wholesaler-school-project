import graphene
from graphene_django import DjangoObjectType
import django_filters
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
    options = graphene.List(OptionType)
    pricelist = graphene.Field(PriceListType, main_identifier=graphene.String())

    def resolve_notes(self, info):
        return Note.objects.all()

    def resolve_options(self, info):
        return Option.objects.all()

    def resolve_pricelist(self, info, **args):
        main_identifier = args.get('main_identifier')
        if main_identifier:
            return PriceList.objects.get(main_identifier=main_identifier)
        return None

schema = graphene.Schema(query=Query)


"""
query {
    pricelist (mainIdentifier: "mainwsppricelist"){
        mainIdentifier,
        options {
            maxWeight
            price
        }
    }
}
"""
