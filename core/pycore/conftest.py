# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
import pytest

from django.test import Client
from django.utils.crypto import get_random_string

from graphene_django.utils.testing import graphql_query


@pytest.fixture
def my_client():
    def client():
        return Client()

    return client


@pytest.fixture
def client_query(client):
    def func(*args, **kwargs):
        return graphql_query(*args, **kwargs, client=client)

    return func


@pytest.fixture
def notes():
    def array(quantity):
        result = list()
        for i in range(quantity): # noqa:W0612
            result.append({'string': get_random_string(length=10)})
        return result

    return array
