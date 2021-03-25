from django.test import TestCase
from django.test import Client
import pytest
from . import models
import json
from graphene_django.utils.testing import GraphQLTestCase


class TestTest:
    def test_test(self):
        assert 1 == 1


class TestFunctions:
    def test_function(self):
        assert 1 == 1


@pytest.mark.django_db
class TestAPI:
    def test_api_urls(self, my_client):
        c = my_client()
        response = c.get('/api/')

        assert response.json() == {
            'notes': 'http://testserver/api/notes/', 
            'options': 'http://testserver/api/options/', 
            'pricelists': 'http://testserver/api/pricelists/'
        }

    def test_test_url(self, my_client):
        c = my_client()
        response = c.get('/api/test/')

        assert response.status_code == 200

    def test_notes(self, my_client, notes):
        c = my_client()
        response = c.get('/api/notes/')
        assert response.status_code == 200

        quantity = 5
        notes_list = notes(quantity)

        for note in notes_list:
            response = c.post('/api/notes/', note)
            assert response.status_code == 201

    def test_price_list_and_options(self):
        pass    
