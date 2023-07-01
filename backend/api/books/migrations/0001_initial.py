# Generated by Django 4.2 on 2023-06-30 00:32

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Book',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('author', models.CharField()),
                ('title', models.CharField()),
                ('content', models.TextField()),
                ('date_created', models.DateTimeField()),
                ('is_published', models.BooleanField(default=False)),
            ],
        ),
    ]
