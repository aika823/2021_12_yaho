# Generated by Django 4.0 on 2021-12-27 12:10

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('yaho_app', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='application',
            name='baby_age',
        ),
    ]
