from django.test import Client


# Create your tests here.
# TODO WSP-5 - test test url

class TestTest:
    def test_test(self):
        assert 1 == 1

    def test_test_url(self):
        c = Client()
        response = c.get('/api/test/')

        assert response.status_code == 200


class TestAPI:
    def test_api(self):
        assert 1 == 1
