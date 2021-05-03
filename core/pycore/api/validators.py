from django.core.exceptions import ValidationError
from openpyxl import load_workbook


def validate_xlsx_header(request_data, header):
    pass


def validate_load_start_data(xlsx_file):
    wb = load_workbook(file_obj)
    ws = wb.active
