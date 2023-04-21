from django.db import models
from django.contrib.auth.models import User, AbstractUser, AbstractBaseUser



class User(AbstractUser):
    pass
    # def __str__(self):
    #     return self.name