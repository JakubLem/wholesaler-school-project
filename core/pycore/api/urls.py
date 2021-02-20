from django.conf.urls import url, include
from . import views


urlpatterns = [
    url(r'test/', views.GetTestViewSet.as_view(), name='test'),
    url(r'companies/', views.CompanyViewSet, name="companies")
    
]
