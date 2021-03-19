import pytest
from django.test import Client
from graphene_django.utils.testing import graphql_query
from django.utils.crypto import get_random_string


@pytest.fixture
def my_client(settings):
    def client(**kwargs):
        return Client()

    return client


@pytest.fixture
def client_query(client):
    def func(*args, **kwargs):
        return graphql_query(*args, **kwargs, client=client)

    return func


@pytest.fixture
def notes():
    def array(quantity, *args, **kwargs):
        result = list()
        for i in range(quantity):
            result.append({'string': get_random_string(length=10)})
        return result

    return array
