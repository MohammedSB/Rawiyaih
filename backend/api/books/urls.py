from django.contrib import admin
from django.urls import path, include
from . import views

urlpatterns = [
    path('save-book/', views.bookSave),
    path('show-books/', views.showBooks)
]