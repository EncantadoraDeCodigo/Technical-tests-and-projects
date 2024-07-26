from django.db import models
from django.contrib.auth.models import AbstractUser
from django.contrib.auth.models import User
from django.contrib import admin
from django.conf import settings



class User(AbstractUser):
    email = models.EmailField(unique=True)
    username = models.CharField(max_length=100, unique=True)
    bio = models.CharField(max_length=100)
    
    USERNAME_FIELD = 'email'  # Usa 'email' como el campo de inicio de sesión
    REQUIRED_FIELDS = []  # Deja vacío si 'username' no es obligatorio

    def __str__(self):
        return self.username
    


class Product(models.Model):
    name = models.CharField(max_length=255)
    price = models.DecimalField(max_digits=10, decimal_places=2)
    # Otros campos necesarios

    def __str__(self):
        return self.name



class Order(models.Model):
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    amount_paid = models.DecimalField(max_digits=10, decimal_places=2)
    full_name = models.CharField(max_length=255)
    address = models.CharField(max_length=255)
    city = models.CharField(max_length=255)
    postal_code = models.CharField(max_length=10)
    transaction_id = models.CharField(max_length=100, unique=True, null=True, blank=True)  # Agregar este campo
    status = models.CharField(max_length=50, default='pending')

    def __str__(self):
        return f'Order {self.id} - {self.status}'

class OrderItem(models.Model):
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    product_id = models.CharField(max_length=255)
    quantity = models.IntegerField(default=0)
    price = models.DecimalField(max_digits=10, decimal_places=2)

    def __str__(self):
        return f'OrderItem {self.id} - {self.product_id}'