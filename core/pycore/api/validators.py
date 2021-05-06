# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
#  from django.core.exceptions import ValidationError

from django.core.exceptions import ValidationError
from openpyxl import load_workbook


def validate_xlsx_header(request_data, header):
    pass


def validate_xlsx_file(file_obj):
    workbook = load_workbook(file_obj)
    worksheet = workbook.active
    size = worksheet.max_row + 1

    if worksheet[f'A{1}'].value != 'test':
        raise ValidationError("testowoo")


def validate_load_start_data(request):  # noqa:W0613
    # raise ValidationError({"test": "test_test"})
    return True
