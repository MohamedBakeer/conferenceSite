<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ConferenceName }} @yield('title') </title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
      integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ url('asset/css/style.css')}}">
    <link rel="shortcut icon" href="{{ url('asset/image/' . $kaydomain . '//logo/' . $logoimages[0] ) }}" type="image/png">
    @yield('stylo')
</head>
<body dir="rtl">
    <header>
        <div class="logo">
            <img src="{{ url('asset/image/' . $kaydomain . '//logo/' . $logoimages[0] ) }}" alt="logo">
        </div>
        <nav>
            <ul>
                <a href="{{ route('homePage', ['subdomain' => request()->route('subdomain')]) }}">الرئيسية</a>
                <a href="{{ route('Objectivesandthemes', ['subdomain' => request()->route('subdomain')]) }}">الأهداف والمحاور</a>

                <a href="#">شروط الكتابة والمشاركة</a>
                <a href="#">الورقات البحثية</a>
                <a href="#">ارسال البحوث</a>
                <a href="#">منظمي ورعاة المؤتمر</a>
                <a href="#">معرض المؤتمر</a>
                <a href="#">اتصل بنا</a>
            </ul>
        </nav>
        <button onclick="menuBar()">
        <i class="fa-solid fa-caret-down"></i>
        </button>
    </header>
    <div class="Divition" id="Divition">@yield('content')</div>
    <footer>
        <div class="top">
            <a href="{{$facebookurl}}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://wa.me/{{ $whatsAppurl }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="tel:+{{ $phoneNUMBER }}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-phone"></i></a>
        </div>
        <p>Created By <a href="https://www.facebook.com/mohamed.bakeer.1884" target="_blank">MNB</a> | © 2019-<span>2022</span> All rights reserved</p>    
    </footer>

    <script>
        // reload year to 2019 - 20**
        let year = new Date().getFullYear();
        document.querySelector("footer > p > span").innerHTML = year;

        function menuBar() {
            
            if (document.querySelector("header > button").innerHTML === '<i class="fa-solid fa-xmark"></i>') {
                document.querySelector("header > button").innerHTML = '<i class="fa-solid fa-caret-down"></i>';
                // document.querySelector("header > nav > ul").style.left = "200vh";
                document.querySelector("header > nav > ul").style.display = 'none';
                document.querySelector(".Divition").style.filter = 'blur(0px)';
            } else {
                document.querySelector("header > button").innerHTML = '<i class="fa-solid fa-xmark"></i>';
                // document.querySelector("header > nav > ul").style.left = "0vh";
                document.querySelector("header > nav > ul").style.display = 'flex';
                document.querySelector(".Divition").style.filter = 'blur(100px)';
            }
            //document.querySelector("header > button > i").style.transform = "rotate(0deg)";
      }
      window.addEventListener("scroll", () => {
        //console.log(window.scrollY);
        if (window.scrollY >= 1) {
          document.querySelector("header").style.opacity = 0;
          document.querySelector("header").style.zIndex = -10;
        } else {
          document.querySelector("header").style.opacity = 1;
          document.querySelector("header").style.zIndex = 1000;
        }
      });
    </script>

     <!-- scriptyield --> 
    @yield('scriptyield')
</body>

</html>
