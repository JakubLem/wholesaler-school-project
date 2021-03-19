from django.test import TestCase
import pytest
class TestTest:
    def test_test(self):
        assert 1 == 1


class TestFunctions:
    def test_function(self):
        assert 1 == 1


class TestAPI:
    def test_test_url(self, my_client):
        c = my_client()
        response = c.get('/api/test/')

        assert response.status_code == 200