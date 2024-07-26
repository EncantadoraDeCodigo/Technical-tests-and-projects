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
from datetime import datetime
from django import template
import re
from django.contrib import messages
from .forms import CheckoutForm
from .models import Order, OrderItem


register = template.Library()

def multiply(value, arg):
    try:
        return float(value) * float(arg)
    except (ValueError, TypeError):
        return ''

paypalrestsdk.configure({
    "mode": settings.PAYPAL_MODE,  # 'sandbox' o 'live'
    "client_id": settings.PAYPAL_CLIENT_ID,
    "client_secret": settings.PAYPAL_CLIENT_SECRET
})

def process_date(date_str):
    if isinstance(date_str, str):
        try:
            date = datetime.fromisoformat(date_str)
            return date
        except ValueError:
            raise ValueError("Invalid ISO date format")
    else:
        raise TypeError("Argument must be a string")

# Supongamos que 'date_str' es recibido de una fuente externa
date_str = "2024-07-26T15:30:00"
processed_date = process_date(date_str)
print(processed_date)

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



def cart_view(request):
    print("Cart view function called")  # Verifica si la función es llamada

    if request.method == 'POST':
        cart = request.session.get('cart', [])

        if 'update_item' in request.POST:
            product_id = request.POST.get('update_item')
            quantity_key = f'quantity_{product_id}'
            new_quantity = request.POST.get(quantity_key)
            try:
                new_quantity = int(new_quantity)
            except ValueError:
                new_quantity = 1
            for item in cart:
                if item['id'] == product_id:
                    item['quantity'] = new_quantity
                    break

        if 'remove_item' in request.POST:
            product_id = request.POST.get('remove_item')
            cart = [item for item in cart if item['id'] != product_id]

        request.session['cart'] = cart

    cart = request.session.get('cart', [])

    total_amount = 0
    for item in cart:
        try:
            # Extraer el precio numérico
            price_str = item.get('price', '').replace('$', '').split('/')[0].strip()
            price = float(price_str)
            quantity = int(item.get('quantity', 0))
            total_amount += price * quantity
        except (ValueError, TypeError):
            continue

    print(f"Cart Items: {cart}")
    print(f"Total Amount: {total_amount}")

    return render(request, 'userauths/cart.html', {
        'cart_items': cart,
        'total_amount': total_amount
    })





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
        try:
            data = json.loads(request.body)
            product_id = data.get('product_id')
            product_name = data.get('product_name')
            product_price = data.get('product_price')

            # Obtén el carrito de la sesión o crea uno nuevo
            cart = request.session.get('cart', [])

            # Verifica si el producto ya está en el carrito
            for item in cart:
                if item['id'] == product_id:
                    item['quantity'] += 1  # Incrementa la cantidad
                    break
            else:
                cart.append({
                    'id': product_id,
                    'name': product_name,
                    'price': product_price,
                    'quantity': 1  # Cantidad inicial
                })

            request.session['cart'] = cart

            return JsonResponse({'status': 'success'})
        except json.JSONDecodeError:
            return JsonResponse({'status': 'error', 'message': 'Invalid JSON'}, status=400)
    return JsonResponse({'status': 'error', 'message': 'Invalid method'}, status=405)



    
    
    
def get_user_cart(request):
    # Suponiendo que el carrito de compras está almacenado en la sesión del usuario
    cart = request.session.get('cart', [])
    return cart


def process_payment(request):
    if request.method == 'POST':
        # Simulación del proceso de pago (para fines de demostración)
        payment_successful = True  # Simula un pago exitoso

        if payment_successful:
            cart = request.session.get('cart', [])
            total_amount = request.session.get('total_amount', 0)

            # Crear un nuevo pedido
            order = Order.objects.create(
                user=request.user,
                total_amount=total_amount,
                status='Processed'
            )

            # Crear ítems del pedido
            for item in cart:
                price = float(item.get('price', '0'))
                quantity = int(item.get('quantity', '0'))

                OrderItem.objects.create(
                    order=order,
                    product_id=item['id'],
                    quantity=quantity,
                    price=price
                )

            # Limpiar el carrito de compras
            request.session['cart'] = []

            # Mostrar mensaje de éxito
            messages.success(request, 'Payment processed successfully. Thank you for your purchase!')

            # Redirigir al usuario a la página de confirmación del pedido
            return redirect('userauths:order_confirmation')
        else:
            # Mostrar mensaje de error
            messages.error(request, 'Payment failed. Please try again.')

            # Redirigir al usuario al checkout
            return redirect('userauths:checkout')
    else:
        # Si la solicitud no es POST, redirigir al checkout
        return redirect('userauths:checkout')
    
    if payment_successful:
        Order.objects.create(
            user=request.user,
            product_name='Nombre del producto',
            amount_paid=100.00,  # Reemplaza con el monto real
        )
        # Redirige a la página de confirmación
        return redirect('order_confirmation')




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
    cart = request.session.get('cart', [])
    total_amount = 0

    for item in cart:
        try:
            # Obtener el precio y quitar texto adicional
            price_str = item.get('price', '0')
            # Usar expresión regular para encontrar el número en la cadena
            price_match = re.search(r'[\d.]+', price_str)
            price = float(price_match.group()) if price_match else 0

            # Convertir cantidad a entero
            quantity = int(item.get('quantity', '0'))

            # Calcular el monto total
            total_amount += price * quantity
        except (ValueError, TypeError):
            continue  # En caso de error, ignorar ese ítem

    context = {
        'cart': cart,
        'total_amount': total_amount,
    }
    return render(request, 'userauths/checkout.html', context)

def complete_purchase(request):
    if request.method == 'POST':
        form = CheckoutForm(request.POST)
        if form.is_valid():
            # Procesar el pago y redirigir a la confirmación
            return process_payment(request)
        else:
            # Manejar errores del formulario
            messages.error(request, 'Please review the errors in the form.')
            return render(request, 'userauths/checkout.html', {'form': form})
    else:
        form = CheckoutForm()
        return render(request, 'userauths/checkout.html', {'form': form})



def order_confirmation(request):
    # Puedes pasar datos adicionales a la plantilla si es necesario
    return render(request, 'userauths/order_confirmation.html')




