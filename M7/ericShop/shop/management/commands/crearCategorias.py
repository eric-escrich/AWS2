from django.core.management.base import BaseCommand
from faker import Faker
from shop.models import Categoria

fake = Faker()

class Command(BaseCommand):
    help = 'Crea categorías'

    def handle(self, *args, **kwargs):
        for _ in range(5):
            Categoria.objects.create(
                nom=fake.word(),
                descripcio=fake.sentence()
            )
        self.stdout.write(self.style.SUCCESS('Categorías creadas'))
