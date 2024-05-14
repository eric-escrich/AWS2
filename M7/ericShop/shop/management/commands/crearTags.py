from django.core.management.base import BaseCommand
from faker import Faker
from faker_music import MusicProvider
from shop.models import Tag

fake = Faker()
fake.add_provider(MusicProvider)

class Command(BaseCommand):
    help = 'Crea tags'

    def handle(self, *args, **kwargs):
        for _ in range(10):
            Tag.objects.create(nom=fake.music_genre())
        self.stdout.write(self.style.SUCCESS('Tags creados'))