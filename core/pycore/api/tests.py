from django.test import Client
from .models import ownrandomstring


class TestTest:
    def test_test(self):
        assert 1 == 1

    def test_test_url(self):
        c = Client()
        response = c.get('/api/test/')

        assert response.status_code == 200


class TestFunctions:
    def test_ownrandomstring(self):
        ors = ownrandomstring()
        assert type(ors) == str
        assert len(ownrandomstring()) == 20


class TestAPI:
    def test_api(self):
        assert 1 == 1
