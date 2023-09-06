from django.contrib import admin
from django.urls import path, include
from . import views

urlpatterns = [
    path('save-book/', views.saveBook),
    path('show-books/', views.showBooks),
    path('get-book/', views.getBook)
]