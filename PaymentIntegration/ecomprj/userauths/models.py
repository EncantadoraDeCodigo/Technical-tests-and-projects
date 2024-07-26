from django.db import models
from django.contrib.auth.models import AbstractUser
from django.contrib.auth.models import User
from django.contrib import admin


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
    description = models.TextField()
    price = models.DecimalField(max_digits=10, decimal_places=2)
    
    def __str__(self):
        return self.name

class Order(models.Model):
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    product_name = models.CharField(max_length=255)
    amount_paid = models.DecimalField(max_digits=10, decimal_places=2)
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f"{self.product_name} - {self.user.username}"

# models.py



class OrderItem(models.Model):
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    product_id = models.IntegerField()  # Cambia esto si usas un modelo de producto
    quantity = models.IntegerField()
    price = models.DecimalField(max_digits=10, decimal_places=2)
    
class OrderAdmin(admin.ModelAdmin):
    list_display = ('user', 'product_name', 'amount_paid', 'created_at')
    list_filter = ('user', 'created_at')
    search_fields = ('product_name', 'user__username')

