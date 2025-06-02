<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="مؤتمرات الزاوية الهندسية والتقنية">
    <meta name="keywords" content="مؤتمر الزاوية الدولي للعلوم الهندسية والتقنية, الزاوية, ليبيا, علوم هندسية, تقنية">
    <meta name="author" content="Mohamed Nouri Bakeer">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Arabic">
    <meta name="copyright" content="Mohamed Nouri Bakeer">
    <meta name="author" content="Mohamed Nouri Bakeer">

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

    @if ($lang_dom == 'ar')
        <a class="switchLang" href="{{ route('switch-cookie', ['subdomain' => request()->route('subdomain')]) }}"><span> English <- </span> <i class="fa-solid fa-globe"></i> </a>
    @elseif ($lang_dom == 'en')
    <a class="switchLang" href="{{ route('switch-cookie', ['subdomain' => request()->route('subdomain')]) }}"><span> Arabic <- </span> <i class="fa-solid fa-globe"></i> </a>
    @endif
    
        @if ($lang_dom == 'ar')
        <header dir="rtl">
        @elseif ($lang_dom == 'en')
        <header dir="ltr">
        @endif
        <div class="logo">
            <img src="{{ url('asset/image/' . $kaydomain . '//logo/' . $logoimages[0] ) }}" alt="logo">
        </div>
        <nav>
            @if ($lang_dom == 'ar')
                <ul>
                    <a href="{{ route('homePage', ['subdomain' => request()->route('subdomain')]) }}">الرئيسية</a>
                    <a href="{{ route('Objectivesandthemes', ['subdomain' => request()->route('subdomain')]) }}">الأهداف والمحاور</a>
                    <a href="{{ route('writingandparticipating', ['subdomain' => request()->route('subdomain')]) }}">شروط الكتابة والمشاركة</a>

                    @if ($isResearchApproved > 0)
                        <a href="{{ route('researchpapers', ['subdomain' => request()->route('subdomain')]) }}">الورقات البحثية</a>
                    @endif
        
                    @if ($Receivingpapers === 'active')
                        <a href="{{ route('Sendresearch', ['subdomain' => request()->route('subdomain')]) }}">ارسال البحوث</a>
                    @endif

                    <a href="{{ route('organizersandsponsors', ['subdomain' => request()->route('subdomain')]) }}" >منظمي ورعاة المؤتمر</a>

                    @if ($exhibitionincludes_count > 0 || $exhibitionobjectives_count > 0)
                        <a href="{{ route('conferenceExhibition', ['subdomain' => request()->route('subdomain')]) }}" >معرض المؤتمر</a>
                    @endif


                    <a href="{{ route('contactus', ['subdomain' => request()->route('subdomain')]) }}" >اتصل بنا</a>
                    
                </ul>
            @elseif ($lang_dom == 'en')
            <ul>
                <a href="{{ route('homePage', ['subdomain' => request()->route('subdomain')]) }}">Home</a>
                <a href="{{ route('Objectivesandthemes', ['subdomain' => request()->route('subdomain')]) }}">Objectives and themes</a>
                <a href="{{ route('writingandparticipating', ['subdomain' => request()->route('subdomain')]) }}">Writing and Participation Guidelines</a>

                @if ($isResearchApproved > 0)
                <a href="{{ route('researchpapers', ['subdomain' => request()->route('subdomain')]) }}">Research Papers</a>
                @endif
                
                @if ($Receivingpapers === 'active')
                    <a href="{{ route('Sendresearch', ['subdomain' => request()->route('subdomain')]) }}">Paper Submission</a>
                @endif

                <a href="{{ route('organizersandsponsors', ['subdomain' => request()->route('subdomain')]) }}" >Organizers and Sponsors</a>

                    @if ($exhibitionincludes_count > 0 || $exhibitionobjectives_count > 0)
                        <a href="{{ route('conferenceExhibition', ['subdomain' => request()->route('subdomain')]) }}" >Conference Exhibition</a>
                    @endif
                    

                <a href="{{ route('contactus', ['subdomain' => request()->route('subdomain')]) }}" >Contact Us</a>
                
            </ul>
            @endif
        </nav>
        <button onclick="menuBar()">
            <i class="fa-solid fa-caret-down"></i>
        </button>
    </header>
    <div class="Divition" id="Divition">@yield('content')</div>
    <footer>
        <div class="top">
            <a href="{{$facebookurl}}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://wa.me/218{{ $whatsAppurl }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="tel:+218{{ $phoneNUMBER }}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-phone"></i></a>
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
          document.querySelector(".switchLang").style.opacity = 0;
          document.querySelector(".switchLang").style.zIndex = -10;
        } else {
          document.querySelector("header").style.opacity = 1;
          document.querySelector("header").style.zIndex = 1000;
          document.querySelector(".switchLang").style.opacity = 1;
          document.querySelector(".switchLang").style.zIndex = 2000;
        }
      });


    </script>


    

     <!-- scriptyield --> 
    @yield('scriptyield')
</body>

</html>
