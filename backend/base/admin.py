from django.contrib import admin
from api.users.models import User
# Register your models here.

class UserAdmin(admin.ModelAdmin):
    pass

admin.site.register(User, UserAdmin)