from django.urls import path

from . import views

app_name = "admin"

urlpatterns = [
    path('', views.index),
    path('/login', views.login),
    path('/application', views.index),
    path('/advertisement', views.advertisement),
    path('/edit', views.edit),
    path('/section', views.section),
]