from django.core.exceptions import ValidationError
from openpyxl import load_workbook


def validate_xlsx_header(request_data, header):
    pass


def validate_load_start_data(file_obj):
    pass

def validate_xlsx_file(file_obj):
    workbook = load_workbook(file_obj)
    worksheet = workbook.active
    size = worksheet.max_row + 1

    if worksheet[f'A{1}'].value != 'test':
        raise ValidationError("testowoo")
