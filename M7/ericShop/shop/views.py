from django.shortcuts import render, get_object_or_404
from .models import *

def lista_productos(request):
    productos = Producte.objects.all()

    if 'categoria' in request.GET:
        categoria_id = request.GET['categoria']
        if categoria_id:
            productos = productos.filter(categoria=categoria_id)

    categorias = Categoria.objects.all()
    return render(request, 'lista_productos.html', {'productos': productos, 'categorias': categorias})

def detalle_producto(request, producto_id):
    producto = get_object_or_404(Producte, pk=producto_id)
    return render(request, 'detalle_producto.html', {'producto': producto})

def filtrar_por_categoria(request):
    categoria_id = request.GET.get('categoria')
    
    if categoria_id:
        productos = Producte.objects.filter(categoria=categoria_id)
    else:
        productos = Producte.objects.all()

    categorias = Categoria.objects.all()
    return render(request, 'lista_productos.html', {'productos': productos, 'categorias': categorias})