from django.contrib import admin
from .models import *
# Register your models here.

class ProducteInline(admin.TabularInline):
    model = Producte
    readonly_fields = ["descripcio"]

class CategoriaInline(admin.TabularInline):
    model = Categoria
    extra = 0
    exclude = ("descripcio",)

class ProductesInline(admin.ModelAdmin):
    list_display = ["nom", "preu", "categoria"]

class CategoriaAdmin(admin.ModelAdmin):
    inlines = [CategoriaInline, ProducteInline]
    list_display = ["nom","parent"]

class DetallCompraInline(admin.TabularInline):
    model = DetallCompra

class CompraAdmin(admin.ModelAdmin):
    inlines = [DetallCompraInline]

class CistellaAdmin(admin.ModelAdmin):
    filter_horizontal = ['producte']

admin.site.register(Tag)
admin.site.register(Producte, ProductesInline)
admin.site.register(DetallCompra)
admin.site.register(Cistella, CistellaAdmin)
admin.site.register(Categoria, CategoriaAdmin)
admin.site.register(Compra, CompraAdmin)