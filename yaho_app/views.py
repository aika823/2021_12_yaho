from django.shortcuts import redirect, render
from .models import Advertisement, Application, Information
from datetime import date



def index(request):
    
    information = Information.objects.filter().first()
    advertisement = Advertisement.objects.first()
    today = date.today()
    
    valid = advertisement.start < today < advertisement.end

    context = {
        'information':information, 
        'advertisement':advertisement,
        'valid': valid
    }
    return render(request, "main.html", context=context)


def create(request):

    if request.method == "POST":

        print(request.POST)

        baby_name = request.POST.get('baby_name')
        baby_birthdate = request.POST.get('baby_birthdate')

        if request.POST.get('baby_name_kor'):
            baby_name = request.POST.get('baby_name_kor')
            language = "한국어"
        elif request.POST.get('baby_name_eng'):
            baby_name = request.POST.get('baby_name_eng')
            language = "영어"
        elif request.POST.get('baby_name_vnm'):
            baby_name = request.POST.get('baby_name_vnm')
            language = "베트남어"

        if request.POST.get('parent_name_kor'):
            parent_name = request.POST.get('parent_name_kor')
        elif request.POST.get('parent_name_eng'):
            parent_name = request.POST.get('parent_name_eng')
        elif request.POST.get('parent_name_vnm'):
            parent_name = request.POST.get('parent_name_vnm')
        
        if request.POST.get('phone_kor'):
            phone = request.POST.get('phone_kor')
        if request.POST.get('phone_eng'):
            phone = request.POST.get('phone_eng')
        if request.POST.get('phone_vnm'):
            phone = request.POST.get('phone_vnm')

        if request.POST.get('code_kor'):
            code = request.POST.get('code_kor')
        if request.POST.get('code_eng'):
            code = request.POST.get('code_eng')
        if request.POST.get('code_vnm'):
            code = request.POST.get('code_vnm')

        if request.POST.get('address_kor'):
            address = request.POST.get('address_kor')
        elif request.POST.get('address_eng'):
            address = request.POST.get('address_eng')
        elif request.POST.get('address_vnm'):
            address = request.POST.get('address_vnm')

        if request.POST.get('care_type_kor'):
            care_type = request.POST.get('care_type_kor')
        elif request.POST.get('care_type_eng'):
            care_type = request.POST.get('care_type_eng')
        elif request.POST.get('care_type_vnm'):
            care_type = request.POST.get('care_type_vnm')


        application = Application(
            baby_name = baby_name,
            baby_birthdate = baby_birthdate,
            parent_name = parent_name,
            phone = phone,
            address = address,
            care_type = care_type,
            code = code,
            language = language
        )
        application.save()

    return redirect('/')