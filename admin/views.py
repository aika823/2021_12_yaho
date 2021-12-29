from django.core.checks.messages import Info
from django.shortcuts import redirect, render
from datetime import date, timedelta, datetime
from yaho_app.models import Advertisement, Application, Information, Admin


def loged_in(request):
    try: 
        id = request.session['admin']
        admin = Admin.objects.get(id=id)
        return True
    except:
        return False


def index(request):
    if loged_in(request):
        context = {
            'application_list' : Application.objects.all()
        }
        return render(request, "index.html", context=context)
    else:
        return redirect('/admin/login')


def login(request):
    if request.method=="POST":
        name=request.POST.get('name')
        password =request.POST.get('password')
        try:
            admin = Admin.objects.get(name=name, password=password)
            request.session['admin'] = admin.id
            return redirect('/admin')
        except:
            return render(request, "login.html")        
    else:
        return render(request, "login.html")        


def application(request):
    if loged_in(request):
        return render(request, "application.html")
    else:
        return redirect('/admin/login')
    

def edit(request):
    if loged_in(request):
        information = Information.objects.filter().first()
        
        if request.method == "POST":

            try:
                information = Information.objects.filter().first()
            except:
                information = Information()

            if information is None:
                information = Information()

            information.tutor = request.POST.get('tutor')
            information.time = request.POST.get('time')
            information.extend = request.POST.get('extend')
            information.date = request.POST.get('date')


            information.save()
            context = {'information':information}
            return render(request, "edit.html", context=context)
        else:
            context = {'information':information}
            return render(request, "edit.html", context=context)
    else:
        return redirect('/admin/login')


def advertisement(request):
    
    if loged_in(request):
        
        
        advertisement = Advertisement.objects.first()
        
        if advertisement is None:
            advertisement = Advertisement()
        
        print(advertisement)

        if request.method == "POST":
            
            advertisement.start = request.POST.get("start")
            advertisement.end = request.POST.get("end")
            
            if request.FILES.get("image"):
                advertisement.image.delete()
                advertisement.image = request.FILES.get("image")
                
            
            advertisement.save()
            return render(request, "advertisement.html", {'advertisement':advertisement})

        else:
            return render(request, "advertisement.html", {'advertisement':advertisement})


    else:
        return redirect('/admin/login')
