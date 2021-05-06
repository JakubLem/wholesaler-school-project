from rest_framework.exceptions import APIException

class GeneralException(APIException):
    pass


class InvalidRequest(GeneralException):
    pass
