from django.urls import path
from core.views import index
from core.views import cart
from core.views import checkout
from core.views import contact
from core.views import shop
from core.views import shop_detail
from core.views import testimonial


app_name = "core"

urlpatterns = [
    path("", index, name="index"),
    path("", cart),
    path("", checkout),
    path("", contact),
    path("", shop),
    path("", shop_detail),
    path("", testimonial)
]

handler404 = 'core.views.error_404'