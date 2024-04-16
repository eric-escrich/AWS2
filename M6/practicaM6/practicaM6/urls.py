"""practicaM6 URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.urls import path
from . import views

urlpatterns = [
    path('productos/', views.lista_productos, name='lista_productos'),
    path('productos/<int:producto_id>/', views.detalle_producto, name='detalle_producto'),
    path('productos/agregar/', views.agregar_producto, name='agregar_producto'),
    path('productos/<int:producto_id>/borrar/', views.borrar_producto, name='borrar_producto'),
]