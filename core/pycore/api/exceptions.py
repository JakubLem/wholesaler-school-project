from rest_framework.exceptions import APIException


class Error:
    def __init__(self, category, message):


class Errors:
    def __init__(self, errors):
        self.errors = errors

    @property
    def json(self):
        return self.errors


class GeneralException(APIException):
    def __init__(self, detail=None, code=None):
        super(GeneralException, self).__init__(detail=detail, code=code)
        self.code = code
        self.detail = detail


class InvalidRequest(GeneralException):
    status_code = 400
    
    def __init__(self, errors):
        self.errors = errors
