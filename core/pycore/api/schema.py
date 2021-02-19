import graphene

class Query(graphene.ObjectType):

    searcher = graphene.JSONString(name=graphene.JSONString(default_value='{"first": 100}'))

    def resolve_searcher(self, type, passed_json):
        some_result = do_some_with_json(passed_json)
        return some_result


schema = graphene.Schema(query=Query)