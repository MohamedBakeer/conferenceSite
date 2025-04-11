@extends('layout')

@section('title', '| معرض المؤتمر')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/conferenceExhibition.css') }}">
@endsection

@section('content')
    <section class="sec1">
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
    </section>
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

    </script>
@endsection