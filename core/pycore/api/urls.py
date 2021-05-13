# | school project | Jakub Lemiesiewicz |
# | Zespół Szkół Komunikacji w Poznaniu |
from django.conf.urls import url, include
from rest_framework import routers
from graphene_django.views import GraphQLView
from api.schema import schema
from . import views


router = routers.DefaultRouter()
router.register(r'notes', views.NoteViewSet)
router.register(r'pricelists', views.PriceListViewSet)
router.register(r'options', views.OptionViewSet)
router.register(r'categories', views.CategoryViewSet)
router.register(r'products', views.ProductViewSet)
router.register(r'producers', views.ProducerViewSet)

urlpatterns = [
    url(r'test/', views.GetTestViewSet.as_view(), name='test'),
    url(r'loaddata_startdata/', views.LoadStartDataViewSet.as_view(), name='loaddata_startdata'),
    url(r'^graph/', GraphQLView.as_view(graphiql=True, schema=schema)),
    url(r'^', include(router.urls)),
]
