@extends('layout')

@section('title', '| منظمي ورعاة المؤتمر')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/organizersandsponsors.css') }}">
@endsection

@section('content')


    <section class="sec1">
        <div class="btn">
            <button onclick="btn(0)">لجان الجهة المنظمة</button>
            <button onclick="btn(1)">الجهات الراعية</button>
        </div>

        <div class="content" style="display: none">

            <div class="organizers" style="display: none">

                @if ($organizers->isNotEmpty())

                <div class="cards">

                    @foreach ($organizers as $organizer)
                        <div class="card">
                            <img src=" {{  url('asset/image/' . $kaydomain . '/organizersandsponsors/organizers/' . $organizer->photo)  }} " alt="شخص 1">
                            <h3>{{$organizer->name}}</h3>
                            <p>{{$organizer->role}}</p>
                            <a href="{{  url('asset/image/' . $kaydomain . '/organizersandsponsors/organizers/' . $organizer->cv_link)  }}">إطلع على السيرة الذاتية</a>
                        </div>
                    @endforeach



                </div>

                @else
                <div class="abort">
                    <h1>لا يوجد الى الان اي منظمين.</h1>
                </div>
                @endif

            </div>

            <div class="sponsors">


                @if ($sponsors->isNotEmpty())
                    {{-- @if (false) --}}
                    <h1>الرعاة الرسميون للمؤتمر : </h1>
                    <div class="pars">
                        <div class="platinumCategory">
                            <h1 style="background-color: #E5E4E2;">الرعاة البلاتينيون</h1>
                            <div style="background-color: #e5e4e283 ;" class="cards">
                                @foreach ($sponsors as $sponsor)
                                    @if ($sponsor->category == 'platinum')
                                        <!-- مثال على راعي بلاتيني -->
                                        <div class="card">
                                            <img src="{{ url('asset/image/' . $kaydomain . '/organizersandsponsors/sponsors/' . $sponsor->logo) }}" alt="091">
                                            <h3>{{ $sponsor->name }}</h3>
                                            <a href="{{ $sponsor->external_link }}" target="_blank">موقع الراعي</a>
                                        </div>
                                    @else
                                        <div class="card" style="background-image: url({{ url('asset/image/logo.png') }}) ; background-position: center; background-size: contain; background-repeat: no-repeat;">
                                            {{-- <img src="{{ url('asset/image/logo.png') }}" alt="091"> --}}
                                            <h3>لا يوجد راعي حالياً</h3>
                                            {{-- <a href="#">موقع الراعي</a> --}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="GoldenCategory">
                            <h1 style="background-color: #FFD700 ;">الرعاة الذهبيون</h1>
                            <div style="background-color: #ffd90081 ;" class="cards">
                                @foreach ($sponsors as $sponsor)
                                    @if ($sponsor->category == 'gold')
                                        <!-- مثال على راعي ذهبي -->
                                        <div class="card">
                                            <img src="{{ url('asset/image/' . $kaydomain . '/organizersandsponsors/sponsors/' . $sponsor->logo) }}" alt="091">
                                            <h3>{{ $sponsor->name }}</h3>
                                            <a href="{{ $sponsor->external_link }}" target="_blank">موقع الراعي</a>
                                        </div>
                                    @else
                                        <div class="card" style="background-image: url({{ url('asset/image/logo.png') }}) ; background-position: center; background-size: contain; background-repeat: no-repeat;">
                                            {{-- <img src="{{ url('asset/image/logo.png') }}" alt="091"> --}}
                                            <h3>لا يوجد راعي حالياً</h3>
                                            {{-- <a href="#">موقع الراعي</a> --}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="silverCategory">
                            <h1 style="background-color: #C0C0C0;">الرعاة الفضيون</h1>
                            <div style="background-color: #c0c0c085 ;" class="cards">
                                
                                @foreach ($sponsors as $sponsor)
                                    @if ($sponsor->category == 'silver')
                                        <!-- مثال على راعي فضي -->
                                        <div class="card">
                                            <img src="{{ url('asset/image/' . $kaydomain . '/organizersandsponsors/sponsors/' . $sponsor->logo) }}" alt="091">
                                            <h3>{{ $sponsor->name }}</h3>
                                            <a href="{{ $sponsor->external_link }}" target="_blank">موقع الراعي</a>
                                        </div>
                                    @else
                                        <div class="card" style="background-image: url({{ url('asset/image/logo.png') }}) ; background-position: center; background-size: contain; background-repeat: no-repeat;">
                                            {{-- <img src="{{ url('asset/image/logo.png') }}" alt="091"> --}}
                                            <h3>لا يوجد راعي حالياً</h3>
                                            {{-- <a href="#">موقع الراعي</a> --}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="bronzeCategory">
                            <h1 style="background-color: #CD7F32 ;">الرعاة البرونزيون</h1>
                            <div style="background-color: #cd803286 ;" class="cards">
                                
                                @foreach ($sponsors as $sponsor)
                                    @if ($sponsor->category == 'bronze')
                                        <!-- مثال على راعي برونزي -->
                                        <div class="card">
                                            <img src="{{ url('asset/image/' . $kaydomain . '/organizersandsponsors/sponsors/' . $sponsor->logo) }}" alt="091">
                                            <h3>{{ $sponsor->name }}</h3>
                                            <a href="{{ $sponsor->external_link }}" target="_blank">موقع الراعي</a>
                                        </div>
                                    @else
                                        <div class="card" style="background-image: url({{ url('asset/image/logo.png') }}) ; background-position: center; background-size: contain; background-repeat: no-repeat;">
                                            {{-- <img src="{{ url('asset/image/logo.png') }}" alt="091"> --}}
                                            <h3>لا يوجد راعي حالياً</h3>
                                            {{-- <a href="#">موقع الراعي</a> --}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="mediaProfessionalsCategory">
                            <h1 style="background-color: #0088CC ;">الرعاة الاعلاميون</h1>
                            <div style="background-color: #0088cc88 ;" class="cards">
                                @foreach ($sponsors as $sponsor)
                                    @if ($sponsor->category == 'media')
                                        <!-- مثال على راعي اعلامي -->
                                        <div class="card">
                                            <img src="{{ url('asset/image/' . $kaydomain . '/organizersandsponsors/sponsors/' . $sponsor->logo) }}" alt="091">
                                            <h3>{{ $sponsor->name }}</h3>
                                            <a href="{{ $sponsor->external_link }}" target="_blank">موقع الراعي</a>
                                        </div>
                                    @else
                                        <div class="card" style="background-image: url({{ url('asset/image/logo.png') }}) ; background-position: center; background-size: contain; background-repeat: no-repeat;">
                                            {{-- <img src="{{ url('asset/image/logo.png') }}" alt="091"> --}}
                                            <h3>لا يوجد راعي حالياً</h3>
                                            {{-- <a href="#">موقع الراعي</a> --}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                    </div>

                @else
                <div class="abort">
                    <h1 >لا يوجد الى الان اي راعي للمؤتمر.</h1>
                </div>
                @endif

            </div>




        </div>

        <div class="abort">
            <h1>أنقر على احد الازرار للعرض </h1>
        </div>
    </section>


@endsection


@section('scriptyield')
    <script>

        function btn(params) {

                for (let index = 0; index < document.querySelectorAll(".sec1 > .btn > button").length; index++) {
                    document.querySelectorAll(".sec1 > .btn > button")[index].style.backgroundColor = "#666666";
                    document.querySelectorAll(".sec1 > .btn > button")[index].style.fontWeight = "400";

                    // document.querySelectorAll(".sec1 > .content > div")[index].style.display = "none";
                }

                let btn = document.querySelectorAll(".sec1 > .btn > button")[params];
                console.log(btn);
                document.querySelector(".sec1 > .abort").style.display = "none";
                document.querySelector(".sec1 > .content").style.display = "flex";
                
                if (params == 0) {
                    document.querySelector(".sec1 > .content > .organizers").style.display = "flex";
                    document.querySelector(".sec1 > .content > .sponsors").style.display = "none";
                } else {
                    document.querySelector(".sec1 > .content > .organizers").style.display = "none";
                    document.querySelector(".sec1 > .content > .sponsors").style.display = "flex";
                }

                if (btn) {
                    btn.style.backgroundColor = "#444444";
                    
                    btn.style.fontWeight = "700";
                }

            }

            document.querySelector(".sec1 > .content > .sponsors > .pars > .platinumCategory").style.opacity = 1;

            document.querySelector(".sec1 > .content > .sponsors > .pars > .GoldenCategory").style.opacity = 0;

            document.querySelector(".sec1 > .content > .sponsors > .pars > .silverCategory").style.opacity = 0;

            document.querySelector(".sec1 > .content > .sponsors > .pars > .bronzeCategory").style.opacity = 0;

            document.querySelector(".sec1 > .content > .sponsors > .pars > .mediaProfessionalsCategory").style.opacity = 0;


            console.log(window.scrollY);
        window.addEventListener("scroll", () => {
            console.log(window.scrollY);
            if (window.scrollY >= 350) {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .GoldenCategory").style.opacity = 1;
                document.querySelector(".sec1 > .content > .sponsors > .pars > .platinumCategory").style.opacity = 0;
            } else {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .GoldenCategory").style.opacity = 0;
                document.querySelector(".sec1 > .content > .sponsors > .pars > .platinumCategory").style.opacity = 1;
            }

            if (window.scrollY >= 1050) {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .silverCategory").style.opacity = 1;
                document.querySelector(".sec1 > .content > .sponsors > .pars > .GoldenCategory").style.opacity = 0;
            } else {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .silverCategory").style.opacity = 0;
            }

            if (window.scrollY >= 1550) {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .bronzeCategory").style.opacity = 1;
                document.querySelector(".sec1 > .content > .sponsors > .pars > .silverCategory").style.opacity = 0;
            } else {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .bronzeCategory").style.opacity = 0;
            }

            if (window.scrollY >= 2150) {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .mediaProfessionalsCategory").style.opacity = 1;
                document.querySelector(".sec1 > .content > .sponsors > .pars > .bronzeCategory").style.opacity = 0;
            } else {
                document.querySelector(".sec1 > .content > .sponsors > .pars > .mediaProfessionalsCategory").style.opacity = 0;
            }
            


        });



    </script>
@endsection