# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
from django.conf.urls import url, include
from rest_framework import routers
from . import views
from graphene_django.views import GraphQLView
from api.schema import schema
from django.urls import path
from rest_framework import routers



router = routers.DefaultRouter()
router.register(r'notes', views.NoteViewSet)
router.register(r'pricelists', views.PriceListViewSet)
router.register(r'options', views.OptionViewSet)

urlpatterns = [
    url(r'test/', views.GetTestViewSet.as_view(), name='test'),
    url(r'loaddata_startdata/', views.LoadStartDataViewSet.as_view(), name='loaddata_startdata'),
    url(r'^graph/', GraphQLView.as_view(graphiql=True, schema=schema)),
    url(r'^', include(router.urls)),
]
