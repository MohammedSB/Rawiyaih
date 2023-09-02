import datetime

from django.shortcuts import render
from rest_framework.decorators import api_view, authentication_classes, permission_classes
from rest_framework.response import Response
from rest_framework.authentication import TokenAuthentication, SessionAuthentication, BasicAuthentication
from rest_framework.permissions import IsAuthenticated
from .serializers import BookSerializer
from .models import Book

@api_view(['POST'])
def bookSave(request):

    # Add date created
    request.data["date_created"] = datetime.datetime.now()
        
    serializer = BookSerializer(data=request.data)

    if serializer.is_valid():
        serializer.save()

    return Response(serializer.data)

@api_view(['GET'])
@permission_classes([IsAuthenticated])
def showBooks(request):

    username = request.user.username
    books = Book.objects.filter(author=username)
    serializer = BookSerializer(books, many=True)

    context = {'books': serializer.data}
    return Response(context)