@extends('layout')

@section('title', '| الرئيسية') 
@section('stylo')
  <link rel="stylesheet" href="{{ url('asset/css/pages/home.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
    <div class="countdown">
          <div class="time-box">
              <span id="seconds" class="time">00</span>
              <span class="label">ثانية</span>
          </div>
          <div class="time-box">
              <span id="minutes" class="time">00</span>
              <span class="label">دقيقة</span>
          </div>
          <div class="time-box">
              <span id="hours" class="time">00</span>
              <span class="label">ساعة</span>
          </div>
          <div class="time-box">
              <span id="days" class="time">00</span>
              <span class="label">ايام</span>
          </div>
      </div>
  </section>
  <section class="sec3">
    <div class="content">
      <h2>المقدمة</h2>
      <p>{!! $ConferenceIntroduction !!}</p>
    </div>
    <div class="imgLogo"><img src="{{ url('asset/image/logo.png') }}" alt=""></div>
  </section>
  <section class="sec4">
    <div class="continer">
      <div class="top">
        <div class="Organizing">
          <h3>تنظيم نقابة المهن الهندسية بالزاوية</h3>
          <p>{{ $PartnersConference }}</p>
        </div>
        <div class="photoFacebook">
          <div class="continer">
            @if ($Conferenceimages == '0')
              <img src="{{ url('asset/image/Noneimage.png') }}" alt="comming soon">
            @else
              <img src="{{ url('asset/image/'.$kaydomain.'/Conferenceimg/'.$Conferenceimages[0]) }}" alt="comming soon">
              <!-- <div class="navigation">
                <i class="fa-solid fa-chevron-right"></i>
                <i class="fa-solid fa-chevron-left"></i>
              </div> -->
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sec5">
  <div class="slider">
    <div class="slider-track">
      
    @if($Sponserimages == "0")         
        @for ($i = 0; $i <= 50; $i++)
        <img src="{{ url('asset/image/logo.png') }}" alt="Logo">
        @endfor
    @else
    @for ($i = 0; $i <= 50; $i++)
        @foreach ($Sponserimages as $img)
            <img src="{{ url('asset/image/'.$kaydomain.'/staticSponsors//'.$img) }}" alt="Logo">
        @endforeach   
        @endfor
    @endif

    </div>
  </div>
  </section>
  <section class="sec6">
    <div class="content">
      <h2>⌛ مواعيد مهمة : </h2>
      <ul>
        @foreach ( $ImportantDates as $li)
        <li>{{ $li }}</li>
        @endforeach
      </ul>
    </div>
  </section>

  <section class="sec7">
    <div class="continer">
      <div class="right">
        <h2>مطوية {{ $ConferenceName }}</h2>
        <div class="Thebrochure">
          @if ($Thebrochureimages == '0')
            <img src="{{ url('asset/image/Noneimage.png') }}" alt="comming soon">
          @else
          <img onclick="arrowChangeimg()" src="{{ url('asset/image/'.$kaydomain.'/Thebrochure/'.$Thebrochureimages[0]) }}" alt="comming soon">
          {{-- <div class="navigation">
            <i onclick="arrowChangeimg()" class="fa-solid fa-chevron-right"></i>
            <i onclick="arrowChangeimg()" class="fa-solid fa-chevron-left"></i>
          </div> --}}
        @endif

        </div>
      </div>
      <div class="left">
        <h2>للمشاركة</h2>
        <p>الإطلاع على شروط الكتابة والمشاركة</p>
        <a href="{{ route('writingandparticipating', ['subdomain' => request()->route('subdomain')]) }}" target="_blank" rel="noopener noreferrer">اضغط هنا</a>
      </div>
    </div>
  </section>
@endsection


@section('scriptyield')
<script>
  
    // let spanElement = document.querySelector(".timeStart > span");
// let year = spanElement.textContent.split('-')[0]; // استخراج السنة
// spanElement.innerHTML = `<span style="color:#fff; background-color: red; margin:0px 5px; padding:0px 20px; border-radius: 10px;">${year}</span>-` + spanElement.textContent.split('-').slice(1).join('-');

    document.addEventListener("DOMContentLoaded", function () {
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
                linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)),
                url(${imagesPath}${images[currentIndex]})
            `;
            currentIndex = (currentIndex + 1) % images.length; // التنقل بين الصور
        }
        // تشغيل أول صورة وتبديلها كل 20 ثانية
        changeBackground();
        setInterval(changeBackground, 5000);


        let imagesConference = [];
        let imagesPathConference = "{{ url('asset/image/'.$kaydomain.'/Conferenceimg') }}"+'/'; // المسار الأساسي
        // تمرير الصور من Laravel إلى JavaScript
        @foreach ( $Conferenceimages as $img )
        imagesConference.push("{{ $img }}");
        @endforeach 

        console.log("Loaded images:", imagesConference); // مراجعة الصور في وحدة التحكم
        let currentIndex1 = 0;
        function changeImagesConference() {
          document.querySelector(".photoFacebook > .continer > img").src = imagesPathConference + imagesConference[currentIndex1];
          currentIndex1 = (currentIndex1 + 1) % imagesConference.length; // التنقل بين الصور
        }

        changeImagesConference();
        setInterval(changeImagesConference, 5000);
    });

    let Thebrochureimages = [];
        let ThebrochureimagesPath = "{{ url('asset/image/'.$kaydomain.'/Thebrochure') }}"+'/'; // المسار الأساسي
        // تمرير الصور من Laravel إلى JavaScript
        @foreach ( $Thebrochureimages as $img )
        Thebrochureimages.push("{{ $img }}");
        @endforeach 

        console.log("Loaded images:", Thebrochureimages , Thebrochureimages.length); // مراجعة الصور في وحدة التحكم

        let currentimg = -1;
        function arrowChangeimg() {
          if(currentimg == Thebrochureimages.length-1){
            currentimg = -1;
          }
          currentimg++;
          document.querySelector(".sec7 > .continer > .right > .Thebrochure > img").src = ThebrochureimagesPath + Thebrochureimages[currentimg];
        }
        arrowChangeimg();
    
    function startCountdown() {
    const targetDate = new Date("{{ $ConferenceDate }}").setHours(0, 0, 0, 0);
    // const countdownElement = document.getElementById("countdown");
    const days = document.querySelector(".sec2 > .countdown > .time-box > #days");
    const hours = document.querySelector(".sec2 > .countdown > .time-box > #hours");
    const minutes = document.querySelector(".sec2 > .countdown > .time-box > #minutes");
    const seconds = document.querySelector(".sec2 > .countdown > .time-box > #seconds");

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

        // countdownElement.innerHTML = `${days} يوم ${hours} ساعة ${minutes} دقيقة ${seconds} ثانية`;
        // countdownElement.innerHTML = `${days} يوم ${hours} ساعة ${minutes} دقيقة ${seconds} ثانية`;
        document.querySelector(".sec2 > .countdown > .time-box > #days").innerHTML = `${days}`;
        document.querySelector(".sec2 > .countdown > .time-box > #hours").innerHTML = `${hours}`;
        document.querySelector(".sec2 > .countdown > .time-box > #minutes").innerHTML = `${minutes}`;
        document.querySelector(".sec2 > .countdown > .time-box > #seconds").innerHTML = `${seconds}`;
    }

    updateCountdown();
    const interval = setInterval(updateCountdown, 1000);
}

document.addEventListener("DOMContentLoaded", startCountdown);

</script>
@endsection