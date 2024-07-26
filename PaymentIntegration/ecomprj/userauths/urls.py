from django.urls import path
from . import views
from django.contrib.auth.views import LogoutView





app_name = "userauths"

urlpatterns = [
    path("sign-up/", views.register_view, name="sign-up"),
    path('login/', views.login_view, name='login'),
    path("logout/", views.logout_view, name="logout"),
    path('cart/', views.cart_view, name='cart'),
    path('add-to-cart/', views.add_to_cart, name='add_to_cart'),
    path('update-cart/', views.update_cart, name='update_cart'),
    path('remove-from-cart/', views.remove_from_cart, name='remove_from_cart'),
    path('checkout/', views.checkout_view, name='checkout'),
    path('process_payment/', views.process_payment, name='process_payment'),
    path('payu_payment/', views.payu_payment_view, name='payu_payment'),
    path('paypal_payment/', views.paypal_payment_view, name='paypal_payment'),
    path('payu_webhook/', views.payu_webhook, name='payu_webhook'),
    path('paypal_webhook/', views.paypal_webhook, name='paypal_webhook'),
    path('verify-payu/<str:transaction_id>/', views.verify_payu_transaction, name='verify_payu_transaction'),  # Verificar transacción PayU
    path('verify-paypal/<str:transaction_id>/', views.verify_paypal_transaction, name='verify_paypal_transaction'),
    path('checkout/', views.checkout_view, name='checkout'),
    path('complete_purchase/', views.complete_purchase, name='complete_purchase'),
    path('order_confirmation/', views.order_confirmation, name='order_confirmation'),
    
]
