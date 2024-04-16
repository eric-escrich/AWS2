from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from .models import Producto
from .serializers import ProductoSerializer

@csrf_exempt
def lista_productos(request):
    if request.method == 'GET':
        productos = Producto.objects.all()
        serializer = ProductoSerializer(productos, many=True)
        return JsonResponse(serializer.data, safe=False)

@csrf_exempt
def detalle_producto(request, producto_id):
    try:
        producto = Producto.objects.get(pk=producto_id)
    except Producto.DoesNotExist:
        return JsonResponse({'error': 'Producto no encontrado'}, status=404)
    
    if request.method == 'GET':
        serializer = ProductoSerializer(producto)
        return JsonResponse(serializer.data)

@csrf_exempt
def agregar_producto(request):
    if request.method == 'POST':
        data = request.POST
        serializer = ProductoSerializer(data=data)
        if serializer.is_valid():
            serializer.save()
            return JsonResponse(serializer.data, status=201)
        return JsonResponse(serializer.errors, status=400)

@csrf_exempt
def borrar_producto(request, producto_id):
    try:
        producto = Producto.objects.get(pk=producto_id)
    except Producto.DoesNotExist:
        return JsonResponse({'error': 'Producto no encontrado'}, status=404)
    
    if request.method == 'DELETE':
        producto.delete()
        return JsonResponse({'mensaje': 'Producto eliminado correctamente'}, status=204)