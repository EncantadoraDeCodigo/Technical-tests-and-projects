from django.db import models
from django.contrib.auth.models import AbstractUser
from django.contrib.auth.models import User

class User(AbstractUser):
    email = models.EmailField(unique=True)
    username = models.CharField(max_length=100, unique=True)
    bio = models.CharField(max_length=100)
    
    USERNAME_FIELD = 'email'  # Usa 'email' como el campo de inicio de sesión
    REQUIRED_FIELDS = []  # Deja vacío si 'username' no es obligatorio

    def __str__(self):
        return self.username
    
