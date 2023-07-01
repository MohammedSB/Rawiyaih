from django.contrib import admin
from django.urls import path, include
from django.conf.urls.static import static

app_name = 'api'

urlpatterns = [
    path('users/', include('api.users.urls')),
    path('books/', include('api.books.urls')),
]
