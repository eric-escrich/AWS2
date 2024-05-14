from django.contrib import admin
from django.urls import include, path

from shop import views

urlpatterns = [
    path('', views.lista_productos, name='shop'),
    path('producto/<int:producto_id>/', views.detalle_producto, name='detalle_producto'),
    path('categoria/', views.filtrar_por_categoria, name='filtrar_por_categoria'),
]