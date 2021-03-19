from django.test import TestCase

class TestTest:
    def test_test(self):
        assert 1 == 1


class TestFunctions:
    def test_function(self):
        assert 1 == 1


class TestAPI:
    def test_test_url(self):
        c = Client()
        response = c.get('/api/test/')

        assert response.status_code == 200