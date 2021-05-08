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


class UpdateNote(graphene.Mutation):
  class Arguments:
    id = graphene.ID()
    string = graphene.String()


  note = graphene.Field(NoteType)

  def mutate(self, info, id, string):
    note = Note.objects.get(pk=id)
    note.string = string
    note.save()
    return UpdateNote(note=note)


class Mutation(graphene.ObjectType):
  update_note = UpdateNote.Field()


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
