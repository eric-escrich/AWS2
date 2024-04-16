from django.shortcuts import render
from django.http import HttpResponse
from django import forms
from django.shortcuts import redirect

from .models import *

class MenuForm(forms.Form):
    lliga = forms.ModelChoiceField(queryset=Lliga.objects.all())
    
def menu(request):
    form = MenuForm()
    if request.method == "POST":
        form = MenuForm(request.POST)
        if form.is_valid():
            lliga = form.cleaned_data.get("lliga")
            return redirect('classificacio',lliga.id)
    return render(request, "menu.html",{
                    "form": form,
            })

# Create your views here.
def index(request):
    return render(request, 'index.html')

def classificacio(request, lliga_id):
    lliga = Lliga.objects.last()
    equips = lliga.equip_set.all()
    classi = []
 
    # calculem punts en llista de tuples (equip,punts)
    for equip in equips:
        punts = 0
        for partit in lliga.partit_set.filter(local=equip):
            if partit.gols_local() > partit.gols_visitant():
                punts += 3
            elif partit.gols_local() == partit.gols_visitant():
                punts += 1
        for partit in lliga.partit_set.filter(visitant=equip):
            if partit.gols_local() < partit.gols_visitant():
                punts += 3
            elif partit.gols_local() == partit.gols_visitant():
                punts += 1
        classi.append( (punts,equip.nom) )
    # ordenem llista
    classi.sort(reverse=True)
    return render(request,"classificacio.html",
                {
                    "classificacio":classi,
                })
