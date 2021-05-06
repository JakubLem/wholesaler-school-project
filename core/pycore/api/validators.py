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

    errors = list()
    correct = True

    if worksheet[f'A{1}'].value != 'max_weight':
        correct = False
        errors.append("header error A1")

    if worksheet[f'B{1}'].value != 'price':
        correct = False
        errors.append("header error B1")

    for i in range(2, size, 1):
        pass


    if not correct:
        raise ValidationError("error") # TODO


def validate_load_start_data(request):  # noqa:W0613
    # raise ValidationError({"test": "test_test"})
    return True
