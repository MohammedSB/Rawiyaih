from django.db import models

GENRES = (
    ("fiction", "fiction"),
    ("non-fiction", "non-fiction"),
) 

# Create your models here.
class Book(models.Model):
    author = models.CharField()
    title = models.CharField()
    # genre = models.CharField(choices=GENRES)
    content = models.TextField()
    date_created = models.DateTimeField()
    is_published = models.BooleanField(default=False)