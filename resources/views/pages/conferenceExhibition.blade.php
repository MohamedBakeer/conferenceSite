@extends('layout')

@section('title', '| معرض المؤتمر')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/conferenceExhibition.css') }}">
@endsection

@section('content')
    <section class="sec1">
        @if ($lang_dom == 'ar')
        <div class="right">
            <div class="header">
                <h1>أهداف هذا المعرض :</h1>
            </div>
            @if ($exhibitionobjectives->isNotEmpty()) 
                <ul>
                    @foreach ($exhibitionobjectives as $exhibitionobjective)
                        <li>{{ $exhibitionobjective }}</li>
                    @endforeach
                </ul>
            @else
                <p>سيتم تحديث المعلومات قريبًا.</p>
            @endif
            
        </div>
        <div class="left">
            <div class="header">
                <h1>المعرض يشتمل على :</h1>
            </div>
            
            @if ($exhibitionincludes->isNotEmpty()) 
                <ul>
                    @foreach ($exhibitionincludes as $exhibitioninclude)
                        <li>{{ $exhibitioninclude }}</li>
                    @endforeach
                </ul>
            @else
                <p>سيتم تحديث المعلومات قريبًا.</p>
            @endif
            
        </div>
        @elseif ($lang_dom == 'en')
        <div class="right" dir="ltr">
            <div class="header">
                <h1>Objectives of the Exhibition:</h1>
            </div>
            @if ($exhibitionobjectives_en->isNotEmpty()) 
                <ul>
                    @foreach ($exhibitionobjectives_en as $exhibitionobjective)
                        <li>{{ $exhibitionobjective }}</li>
                    @endforeach
                </ul>
            @else
                <p>The information will be updated soon.</p>
            @endif
        </div>
        
        <div class="left" dir="ltr">
            <div class="header">
                <h1>The Exhibition Includes:</h1>
            </div>
            
            @if ($exhibitionincludes_en->isNotEmpty()) 
                <ul>
                    @foreach ($exhibitionincludes_en as $exhibitioninclude)
                        <li>{{ $exhibitioninclude }}</li>
                    @endforeach
                </ul>
            @else
                <p>The information will be updated soon.</p>
            @endif
        </div>
        
        @endif
        
    </section>

    <sections class="sec2">
        
        @if ($lang_dom == 'ar')
        <h2>مطوية المعرض {{ $ConferenceName }}</h2>
        @elseif ($lang_dom == 'en')
        <h2>Exhibition brochure {{ $ConferenceName_en }}</h2>
        @endif
        <div class="Thebrochure">
          @if ($TheExhibitionbrochureimages == '0')
            <img src="{{ url('asset/image/Noneimage.png') }}" alt="comming soon">
          @else
          <img onclick="arrowChangeimg()" src="{{ url('asset/image/'.$kaydomain.'/TheExhibitionbrochureimages/'.$TheExhibitionbrochureimages[0]) }}" alt="comming soon">
          {{-- <div class="navigation">
            <i onclick="arrowChangeimg()" class="fa-solid fa-chevron-right"></i>
            <i onclick="arrowChangeimg()" class="fa-solid fa-chevron-left"></i>
          </div> --}}
        @endif

        </div>
    </sections>
@endsection


@section('scriptyield')
    <script>
        let images = [];
        let imagesPath = "{{ url('asset/image/'.$kaydomain.'/background') }}"+'/'; // المسار الأساسي
        // تمرير الصور من Laravel إلى JavaScript
        @foreach ($backgroundimages as $img)
            images.push("{{ $img }}");
        @endforeach
        console.log("Loaded images:", images); // مراجعة الصور في وحدة التحكم
        let currentIndex = 0;
        let sec1 = document.querySelector(".sec1");
        function changeBackground() {
            if (images.length === 0) return; // تأكد من أن هناك صورًا
            // إضافة تأثير `linear-gradient` مع الصورة الجديدة
            sec1.style.backgroundImage = `
                linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)),
                url(${imagesPath}${images[currentIndex]})
            `;
            currentIndex = (currentIndex + 1) % images.length; // التنقل بين الصور
        }
        // تشغيل أول صورة وتبديلها كل 20 ثانية
        changeBackground();
        setInterval(changeBackground, 5000);


        @if ($TheExhibitionbrochureimages == '0')
            console.log("No images available for TheExhibitionbrochureimages.");
        @else
        let TheExhibitionbrochureimages = [];
        let TheExhibitionbrochureimagesPath = "{{ url('asset/image/'.$kaydomain.'/TheExhibitionbrochureimages') }}"+'/'; // المسار الأساسي
        // تمرير الصور من Laravel إلى JavaScript
        @foreach ( $TheExhibitionbrochureimages as $img )
        TheExhibitionbrochureimages.push("{{ $img }}");
        @endforeach 

        console.log("Loaded images:", TheExhibitionbrochureimages , TheExhibitionbrochureimages.length); // مراجعة الصور في وحدة التحكم

        let currentimg = -1;
        function arrowChangeimg() {
          if(currentimg == TheExhibitionbrochureimages.length-1){
            currentimg = -1;
          }
          currentimg++;
          document.querySelector(".sec2 > .Thebrochure > img").src = TheExhibitionbrochureimagesPath + TheExhibitionbrochureimages[currentimg];
        }
        arrowChangeimg();
        @endif
        

    </script>
@endsection