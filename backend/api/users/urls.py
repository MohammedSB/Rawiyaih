from django.contrib import admin
from django.urls import path, include
from . import views
from .views import CustomTokenObtainPairView

from rest_framework_simplejwt.views import (
    TokenRefreshView,
)

urlpatterns = [
    path('create-user/', views.userCreate),
    path('login-user/', views.userLogin),
    path('token/', CustomTokenObtainPairView.as_view(), name='token_obtain_pair'),
    path('token/refresh/', TokenRefreshView.as_view(), name='token_refresh'),
]