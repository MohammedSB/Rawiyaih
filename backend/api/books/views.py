from django.shortcuts import render

from rest_framework.decorators import api_view, authentication_classes, permission_classes
from rest_framework.response import Response
from .serializers import BookSerializer


@api_view(['POST'])
def bookSave(request):
    # Hash password before saving
    
    serializer = BookSerializer(data=request.data)
    if serializer.is_valid():
        serializer.save()
        print(serializer.data)

    return Response(serializer.data)
