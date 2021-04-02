from django.test import TestCase
from django.test import Client
import pytest
from . import models
import json
from graphene_django.utils.testing import GraphQLTestCase


MAIN_API_PATH = '/api/'

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
        response = c.get(MAIN_API_PATH)

        assert response.json() == {
            'notes': 'http://testserver/api/notes/', 
            'options': 'http://testserver/api/options/', 
            'pricelists': 'http://testserver/api/pricelists/'
        }

    def test_test_url(self, my_client):
        c = my_client()
        response = c.get(MAIN_API_PATH + 'test/')

        assert response.status_code == 200

    def test_notes(self, my_client, notes):
        c = my_client()
        response = c.get(MAIN_API_PATH + 'notes/')
        assert response.status_code == 200

        quantity = 5
        notes_list = notes(quantity)

        for note in notes_list:
            response = c.post(MAIN_API_PATH + 'notes/', note)
            assert response.status_code == 201
        
        assert models.Note.objects.count() == 5

    def test_price_list_and_options(self, my_client):
        c = my_client()

        response = c.post(MAIN_API_PATH + 'pricelists/', {
            'main_identifier': 'test_identifier',
            'quantity': 0
        })

        assert response.status_code == 201
        assert response.json() == {
            'id': 1,
            'main_identifier': 'test_identifier',
            'quantity': 0,
            'options': []
        }

        response = c.post(MAIN_API_PATH + 'options/', {
            'max_weight': 19,
            'price': 15.99,
            'price_list': 'test_identifier'
        })
        assert response.status_code == 201

        response = c.post(MAIN_API_PATH + 'options/', {
            'max_weight': 25,
            'price': 26.99,
            'price_list': 'test_identifier'
        })
        assert response.status_code == 201
        assert models.Option.objects.count()

        response = c.get(MAIN_API_PATH + 'pricelists/test_identifier/')
        assert response.json() == {
            'price_list': 'test_identifier', 
            'options': [
                {
                    'id': 1, 
                    'max_weight': 19.0, 
                    'price': 15.99
                }, 
                {
                    'id': 2, 
                    'max_weight': 25.0, 
                    'price': 26.99
                }
            ]
        }

    def test_load_data(self, my_client):
        c = my_client()
        response = c.post(MAIN_API_PATH + 'loaddata_startdata/')
        assert response.json() == {'status': 'OK', 'code': 'The pricelist data has been loaded correctly'}

        response = c.post(MAIN_API_PATH + 'loaddata_startdata/')
        assert response.json() == {'status': 'OK', 'code': 'The pricelist data has already existed on the instance'}
