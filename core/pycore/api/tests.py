# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
import pytest
from . import models


MAIN_API_PATH = '/api/'


class TestTest:
    def test_test(self):
        pass


class TestFunctions:
    def test_function(self):
        pass

    def test_temp_xlsx_file(self, temp_xlsx_file):
        header = []
        data = []
        temp_xlsx_file(header, data)


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

    def test_upload_xlsx(self, my_client, temp_xlsx_file):
        c = my_client()
        header = ["test", "header"]
        data = [
            ["test", "data"],
            ["test2", "data2"]
        ]
        response = c.post(MAIN_API_PATH + 'pricelists/upload_mainwsppricelist/', {
            'pricelistfile': temp_xlsx_file(header=header, data=data)
        })
        #  TODO WSP-88 edit json view
        assert response.json() == {
            'pricelistfile':
                [
                    'xlsx cell error value',
                    'header error A1',
                    'xlsx cell error value',
                    'header error B1',
                    'xlsx cell error value',
                    'row error row 2 col A',
                    'xlsx cell error value',
                    'row error row 2 col B',
                    'xlsx cell error value',
                    'row error row 3 col A',
                    'xlsx cell error value',
                    'row error row 3 col B'
                ]
        }
