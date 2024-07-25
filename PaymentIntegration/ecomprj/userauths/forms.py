from django.contrib.auth.forms import UserCreationForm
from userauths.models import User

class UserRegisterForm(UserCreationForm):
    class Meta:
        model = User
        fields = ['username', 'email']  # Los campos 'password1' y 'password2' ya están incluidos en UserCreationForm
