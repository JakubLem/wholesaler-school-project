# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
import graphene
from graphene_django import DjangoObjectType
from .models import Note, Option, PriceList


#  TYPES
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


#  MUTATIONS
class CreateNote(graphene.Mutation):
    class Arguments:
        id = graphene.ID()
        string = graphene.String()

    note = graphene.Field(NoteType)

    def mutate(self, info, string):  # noqa:W0613
        note = Note.objects.create(string=string)
        note.save()
        return CreateNote(note=note)


class UpdateNote(graphene.Mutation):
    class Arguments:
        id = graphene.ID()  # noqa 
        string = graphene.String()

    note = graphene.Field(NoteType)

    def mutate(self, info, pk, string):  # noqa:W0613
        note = Note.objects.get(pk=pk)
        note.string = string
        note.save()
        return UpdateNote(note=note)


class Mutation(graphene.ObjectType):
    create_note = CreateNote.Field()
    update_note = UpdateNote.Field()


class Query(graphene.ObjectType):
    notes = graphene.List(NoteType)
    options = graphene.List(OptionType)
    pricelist = graphene.Field(PriceListType, main_identifier=graphene.String())

    def resolve_notes(self, info):  # noqa:W0613
        return Note.objects.all()

    def resolve_options(self, info):  # noqa:W0613
        return Option.objects.all()

    def resolve_pricelist(self, info, **args):  # noqa:W0613
        main_identifier = args.get('main_identifier')
        if main_identifier:
            return PriceList.objects.get(main_identifier=main_identifier)
        return None


schema = graphene.Schema(query=Query, mutation=Mutation)

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
