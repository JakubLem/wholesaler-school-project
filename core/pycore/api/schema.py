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


class PriceListFilter(django_filters.FilterSet):
    class Meta:
        model = PriceList
        fields = ['main_identifier']

class PriceListType(DjangoObjectType):
    class Meta:
        model = PriceList
        # filterset_class = PriceListFilter
        # interfaces = (graphene.relay.Node, )
        fields = ("id", "main_identifier", "options")


class Query(graphene.ObjectType):
    notes = graphene.List(NoteType)
    options = graphene.List(OptionType)
    pricelists = graphene.List(PriceListType)
    # pricelist = graphene.relay.Node.Field(PriceListType)

    def resolve_notes(self, info):
        return Note.objects.all()

    def resolve_options(self, info):
        return Option.objects.all()

    def resolve_pricelists(self, info, **args):
        main_identifier = args.get('main_identifier')
        print(main_identifier)
        return PriceList.objects.get(main_identifier=main_identifier)

schema = graphene.Schema(query=Query)


"""
query {
    pricelists {
        mainIdentifier,
        options {
            maxWeight
            price
        }
    }
}
"""
