from django.contrib.auth.forms import UserCreationForm
from userauths.models import User
from django import forms

class UserRegisterForm(UserCreationForm):
    class Meta:
        model = User
        fields = ['username', 'email']  # Los campos 'password1' y 'password2' ya están incluidos en UserCreationForm

class CheckoutForm(forms.Form):
    full_name = forms.CharField(max_length=100, label='Full Name')
    address = forms.CharField(max_length=255, label='Address')
    city = forms.CharField(max_length=100, label='City')
    postal_code = forms.CharField(max_length=20, label='Postal Code')
    card_number = forms.CharField(max_length=16, label='Card Number')
    card_expiry = forms.CharField(max_length=5, label='Expiry Date')
    card_cvc = forms.CharField(max_length=3, label='CVC')