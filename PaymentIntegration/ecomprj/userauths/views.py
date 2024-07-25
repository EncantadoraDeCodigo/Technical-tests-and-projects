from django.shortcuts import render, redirect
from userauths.forms import UserRegisterForm
from django.contrib.auth import login, authenticate
from django.contrib import messages
from django.contrib.auth import logout
import requests
from django.conf import settings
from django.http import JsonResponse
from paypalrestsdk import Payment
import paypalrestsdk
import hashlib
import hmac
from django.middleware.csrf import get_token
from django.views.decorators.http import require_POST
from django.urls import reverse
from django.views.decorators.csrf import csrf_exempt
import json 



paypalrestsdk.configure({
    "mode": settings.PAYPAL_MODE,  # 'sandbox' o 'live'
    "client_id": settings.PAYPAL_CLIENT_ID,
    "client_secret": settings.PAYPAL_CLIENT_SECRET
})

def register_view(request):
    if request.method == "POST":
        form = UserRegisterForm(request.POST)
        if form.is_valid():
            new_user = form.save()
            username = form.cleaned_data.get("username")
            messages.success(request, f"Hey {username}, your account was created successfully.")
            
            # Autenticación y login del usuario
            new_user = authenticate(username=form.cleaned_data['username'],
                                    password=form.cleaned_data['password1'])  # Asegúrate de que 'password1' esté sin espacio

            if new_user is not None:
                login(request, new_user)
                return redirect("index")  # Redirige a la página principal
            else:
                messages.error(request, "Authentication failed. Please try again.")
                return redirect("userauths:sign-up")  # Redirige a la página de registro si la autenticación falla
        else:
            print("User cannot be registered")
            print(form.errors)  # Muestra los errores del formulario para depuración

    else:
        form = UserRegisterForm()

    context = {
        'form': form,
    }
    return render(request, 'userauths/sign_up.html', context)


def login_view(request):
    if request.method == "POST":
        email = request.POST.get('email')
        password = request.POST.get('password')
        user = authenticate(request, username=email, password=password)
        if user is not None:
            login(request, user)
            messages.success(request, "You have logged in successfully.")
            return redirect("core:index")
        else:
            messages.error(request, "Invalid email or password.")
    return render(request, 'userauths/login.html')


def logout_view(request):
    logout(request)
    return redirect('core:index')

from django.shortcuts import render


from django.shortcuts import render, redirect
from django.http import JsonResponse
from django.views.decorators.http import require_POST

def cart_view(request):
        cart = request.session.get('cart', [])
        return render(request, 'userauths/cart.html', {'cart_items': cart})



@require_POST
def update_cart(request):
    # Obtén el ID del producto y la nueva cantidad del formulario
    product_id = request.POST.get('product_id')
    new_quantity = int(request.POST.get('quantity', 1))
    
    cart = request.session.get('cart', [])
    
    for item in cart:
        if item['id'] == product_id:
            item['quantity'] = new_quantity
            break

    request.session['cart'] = cart
    return redirect('userauths:cart')

@require_POST
def remove_from_cart(request):
    # Obtén el ID del producto a eliminar
    product_id = request.POST.get('product_id')
    
    cart = request.session.get('cart', [])
    
    cart = [item for item in cart if item['id'] != product_id]

    request.session['cart'] = cart
    return redirect('userauths:cart')

def add_to_cart(request):
    if request.method == 'POST':
        # Obtén los datos del producto del cuerpo de la solicitud
        product_id = request.POST.get('product_id')
        product_name = request.POST.get('product_name')
        product_price = request.POST.get('product_price')

        # Crea una representación del producto
        product = {
            'id': product_id,
            'name': product_name,
            'price': product_price,
            'quantity': 1
        }

        # Obtén el carrito de la sesión, si no existe, crea uno nuevo
        cart = request.session.get('cart', [])

        # Busca si el producto ya está en el carrito
        for item in cart:
            if item['id'] == product_id:
                item['quantity'] += 1
                break
        else:
            cart.append(product)

        # Guarda el carrito en la sesión
        request.session['cart'] = cart

        return JsonResponse({'status': 'success'})
    else:
        return JsonResponse({'status': 'error'}, status=400)

    
    
    
def get_user_cart(request):
    # Suponiendo que el carrito de compras está almacenado en la sesión del usuario
    cart = request.session.get('cart', [])
    return cart


def process_payment(request):
    if request.method == 'POST':
        amount = request.POST.get('amount')  # Obtén el monto total del formulario
        
        if 'payu' in request.POST:
            return redirect('userauths:payu_payment', amount=amount)
        
        if 'paypal' in request.POST:
            return redirect('userauths:paypal_payment', amount=amount)
    
    return redirect('userauths:checkout')


def payu_payment_view(request):
    if request.method == 'POST':
        amount = request.GET.get('amount')  # Obtén el monto total de la URL
        payment_data = {
            'merchant': settings.PAYU_MERCHANT_ID,
            'amount': amount,
            'currency': 'USD',
            'description': 'Test Payment',
            'email': request.POST.get('email'),
            'returnUrl': 'http://yourdomain.com/return_url',
            'notifyUrl': 'http://yourdomain.com/payu-webhook/',
            'signature': generate_signature(),
        }

        response = requests.post(f"{settings.PAYU_URL}/payment", data=payment_data)
        return redirect(response.json().get('redirect_url'))


def paypal_payment_view(request):
    if request.method == 'POST':
        amount = request.GET.get('amount')  # Obtén el monto total de la URL
        payment = paypalrestsdk.Payment({
            "intent": "sale",
            "payer": {"payment_method": "paypal"},
            "redirect_urls": {
                "return_url": "http://yourdomain.com/return_url",
                "cancel_url": "http://yourdomain.com/cancel_url"
            },
            "transactions": [{
                "amount": {"total": amount, "currency": "USD"},
                "description": "Test Payment"
            }]
        })

        if payment.create():
            return redirect(payment.links[1].href)
        else:
            return JsonResponse({'error': payment.error})


def payu_webhook(request):
    if request.method == 'POST':
        return JsonResponse({'status': 'success'})
    return JsonResponse({'status': 'error'}, status=400)

def paypal_webhook(request):
    if request.method == 'POST':
        return JsonResponse({'status': 'success'})
    return JsonResponse({'status': 'error'}, status=400)

def verify_payu_transaction(request, transaction_id):
    response = requests.get(f"{settings.PAYU_URL}/transaction/{transaction_id}", headers={"Authorization": "Bearer your_access_token"})
    return JsonResponse(response.json())

def verify_paypal_transaction(request, transaction_id):
    response = requests.get(f"https://api.paypal.com/v1/payments/payment/{transaction_id}", headers={"Authorization": "Bearer your_access_token"})
    return JsonResponse(response.json())

def generate_signature():
    secret_key = settings.PAYU_SECRET_KEY
    params = {
        'merchant': settings.PAYU_MERCHANT_ID,
        'amount': '100',
        'currency': 'USD',
        'description': 'Test Payment',
        'email': 'test@example.com'
    }
    param_string = '&'.join([f'{key}={value}' for key, value in sorted(params.items())])
    signature = hmac.new(secret_key.encode('utf-8'), param_string.encode('utf-8'), hashlib.sha256).hexdigest()
    return signature

def checkout_view(request):
    cart = get_user_cart(request)
    total_amount = sum(item['price'] * item['quantity'] for item in cart)
    context = {
        'cart': cart,
        'total_amount': total_amount,
    }
    return render(request, 'userauths/checkout.html', context)