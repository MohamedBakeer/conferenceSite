@extends('layout')

@section('title', '| الرئيسية') 
@section('stylo')
  <link rel="stylesheet" href="{{ url('asset/css/pages/home.css') }}">
@endsection

@section('content')


  <section class="sec1">
    <div class="content">
      <h1>{{ $ConferenceName }}</h1>
      <p>{{ $ConferenceTo }}</p>
      <button>"{{ $Syndicatetext }}"</button>
    </div>
    <div class="timeStart">
      <span>{{ $ConferenceDate }}</span>
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

    function startCountdown() {
    const targetDate = new Date("2025-3-3").setHours(0, 0, 0, 0);
    const countdownElement = document.getElementById("countdown");

    function updateCountdown() {
        const now = new Date().getTime();
        const timeLeft = targetDate - now;

        if (timeLeft <= 0) {
            countdownElement.innerHTML = "انتهى العد التنازلي";
            clearInterval(interval);
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        countdownElement.innerHTML = `${days} يوم ${hours} ساعة ${minutes} دقيقة ${seconds} ثانية`;
        countdownElement.innerHTML = `${days} يوم ${hours} ساعة ${minutes} دقيقة ${seconds} ثانية`;
    }

    updateCountdown();
    const interval = setInterval(updateCountdown, 1000);
}

document.addEventListener("DOMContentLoaded", startCountdown);

</script>



@endsection