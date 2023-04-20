from django.contrib import admin
from django.urls import path, include
from . import views

urlpatterns = [
    path('create-user/', views.userCreate),
    path('login-user/', views.userLogin),
]


