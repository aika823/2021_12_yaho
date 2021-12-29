from django.urls import path

from . import views

app_name = "yaho_app"

urlpatterns = [
    path('', views.index),
    path('create', views.create),
]