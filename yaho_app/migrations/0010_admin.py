# Generated by Django 4.0 on 2021-12-28 07:41

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('yaho_app', '0009_alter_information_date'),
    ]

    operations = [
        migrations.CreateModel(
            name='Admin',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(db_column='name', max_length=20)),
                ('password', models.CharField(db_column='password', max_length=20)),
            ],
            options={
                'db_table': 'admin',
            },
        ),
    ]
