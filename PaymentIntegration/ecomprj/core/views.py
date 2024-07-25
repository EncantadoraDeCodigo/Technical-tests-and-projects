from django.http import HttpResponse
from django.shortcuts import render

def index(request):
    return render(request, 'core/index.html')

def cart(request):
    return render(request, 'core/cart.html')

def checkout(request):
    return render(request, 'core/checkout.html')

def contact(request):
    return render(request, 'core/contact.html')

def shop(request):
    return render(request, 'core/shop.html')

def shop_detail(request):
    return render(request, 'core/shop-detail.html')

def testimonial(request):
    return render(request, 'core/testimonial.html')

def error_404(request, exception):
    return render(request, 'core/404.html')
