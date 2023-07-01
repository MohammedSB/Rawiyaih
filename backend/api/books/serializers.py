from rest_framework import serializers
from .models import Book
from rest_framework_simplejwt.serializers import TokenObtainPairSerializer

class BookSerializer(serializers.ModelSerializer):
    class Meta:
        model = Book
        fields = '__all__'