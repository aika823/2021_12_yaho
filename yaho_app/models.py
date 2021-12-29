from django.db import models
import datetime
import os
from django.db.models.base import Model
from django.db.models.deletion import CASCADE
from django.utils.deconstruct import deconstructible


class Application(models.Model):
    
    baby_name = models.CharField(max_length=20, db_column="baby_name", null=False)
    baby_birthdate = models.DateField(db_column="baby_birthdate", null=False)
    parent_name = models.CharField(max_length=20, db_column="parent_name", null=False)
    phone = models.CharField(max_length=20, db_column="phone", null=False)
    address = models.CharField(max_length=200, db_column="address", null=False)
    care_type = models.CharField(max_length=40, db_column="care_type", null=False)
    code = models.CharField(max_length=40, db_column="code", null=False)
    language = models.CharField(max_length=40, db_column="language", null=False)
    
    class Meta:
        db_table = "application"


class Information(models.Model):
    tutor = models.CharField(max_length=20, db_column="tutor", null=False)
    time = models.CharField(max_length=20, db_column="time", null=False)
    extend = models.CharField(max_length=20, db_column="extend", null=False)
    date = models.DateField(db_column="date", null=False)

    class Meta:
        db_table = "information"


class Admin(models.Model):
    name = models.CharField(max_length=20, db_column="name", null=False)
    password = models.CharField(max_length=20, db_column="password", null=False)

    class Meta:
        db_table = "admin"


class Advertisement(models.Model):
    
    start = models.DateField(db_column="start", null=False)
    end = models.DateField(db_column="end", null=False)
    image = models.ImageField(upload_to=("advertisement/"), default="default_image.jpg")

    class Meta:
        db_table = "advertisement"
        