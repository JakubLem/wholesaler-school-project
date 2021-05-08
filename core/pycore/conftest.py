# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
import pytest

from django.test import Client

from django.utils.crypto import get_random_string
from django.core.files.uploadedfile import SimpleUploadedFile

from graphene_django.utils.testing import graphql_query
from openpyxl import Workbook
from openpyxl.writer.excel import save_virtual_workbook


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


@pytest.fixture(scope='function')
def temp_xlsx_file():

    def temp_file(header, data):
        wb = Workbook()
        ws = wb.active
        ws.append(header)
        for row in data:
            ws.append(row)
        file_obj = save_virtual_workbook(wb)
        return SimpleUploadedFile("test_file.xlsx", file_obj, content_type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")

    return temp_file
