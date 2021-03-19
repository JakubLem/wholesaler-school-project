import pytest
from django.test import Client


@pytest.fixture
def my_client():
    return Client()
