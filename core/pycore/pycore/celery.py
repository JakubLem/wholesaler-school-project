import os
from celery import Celery


os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'pycore.settings')

app = Celery('pycore celery')
