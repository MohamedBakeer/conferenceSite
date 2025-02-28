@extends('layout')

@section('title', '| الرئيسية') 
@section('stylo')
  <link rel="stylesheet" href="{{ url('asset/css/pages/home.css') }}">
@endsection

@section('content')


  <section class="sec1">
    <div class="content">
      <h1> المؤتمر الهندسي الخامس </h1>
      <p>لنقابة المهن الهندسية بالزاوية</p>
      <button>"الهندسة والذكاء الإصطناعي في تحقيق التنمية المستدامة لبناء الدولة"</button>
    </div>
    <div class="timeStart">
      <span>2028-12-07</span>
    </div>
  </section>
  <section class="sec2">
  </section>
  <section class="sec3">
  </section>






  

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        let images = [];
        let kaydomain = "{{ $kaydomain }}"; // تمرير متغير الدومين من Laravel
        let imagesPath = "{{ url('asset/image/background/') }}/" + kaydomain + "/"; // المسار الأساسي

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
                linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)),
                url(${imagesPath}${images[currentIndex]})
            `;

            currentIndex = (currentIndex + 1) % images.length; // التنقل بين الصور
        }

        // تشغيل أول صورة وتبديلها كل 20 ثانية
        changeBackground();
        setInterval(changeBackground, 5000);
    });
</script>



@endsection