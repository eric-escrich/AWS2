from django.contrib import admin
from django.urls import include, path

from lliga import views

urlpatterns = [
    path("menu", views.menu, name="menu"),
    path("classificacio/<int:lliga_id>", views.classificacio, name="classificacio")
]