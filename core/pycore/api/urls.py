from django.conf.urls import url, include
from . import views
from django.urls import path


urlpatterns = [
    url(r'test/', views.GetTestViewSet.as_view(), name='test'),
    path('testowo/', views.CompanyViewSet, name='testowo'),
    # url(r'companies/', views.CompanyViewSet, name="companies")
]
