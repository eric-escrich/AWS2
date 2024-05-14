from django.core.management.base import BaseCommand
from faker import Faker
from shop.models import Categoria, Producte, Tag

fake = Faker()

class Command(BaseCommand):
    help = 'Crea productos'

    def handle(self, *args, **kwargs):
        categorias = Categoria.objects.all()
        tags = Tag.objects.all()
        
        for _ in range(10):
            categoria = fake.random_element(categorias)
            producte = Producte.objects.create(
                nom=fake.company(),
                descripcio=fake.text(),
                preu=fake.random_number(digits=3),
                categoria=categoria,
                quantitat_disponible=fake.random_number(digits=2)
            )
            producte.tags.set(fake.random_elements(tags, length=fake.random_int(min=1, max=3)))
        self.stdout.write(self.style.SUCCESS('Productos creados'))