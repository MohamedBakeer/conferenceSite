@extends('layout')

@section('title', '| شروط الكتابة والمشاركة')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/contactus.css') }}">
@endsection

@section('content')

        @if ($Committeemembers->isNotEmpty())

            <section class="sec0">

                @foreach ($Committeemembers as $member)

                    <div class="card">
                        <i class="fa-solid fa-user-tie"></i>
                        <h1>{{ $member->member_attribute }}</h1>
                        <p>{{ $member->member_name }}</p>
                        <li><i class="fa-solid fa-circle-dot"></i> <span>{{ $member->member_role }}</span></li>
                        <li><i class="fa-solid fa-circle-dot"></i> <span>عضو نقابة المهن الهندسية بالزاوية</span></li>
                        <li><i class="fa-solid fa-link"></i> <span>{{ $member->member_email }}</span></li>
                        <li><i class="fa-solid fa-link"></i> <span> {{ $kaydomain }}@leaboz.org.ly </span></li>
                    </div>

                @endforeach

            </section>

        @endif


    <section class="sec1">
        <h2>معلومات التواصل</h2>
        <div class="content">
            <div class="contact-info">

                <p><strong>📍 العنوان: </strong> الزاوية، ليبيا</p>
                <p><strong>📞 الهاتف: </strong> <a dir="ltr" href="tel:+218{{ $phoneNUMBER }}">+218 {{ $phoneNUMBER }} </a></p>
                <p><strong>📞 فاكس: </strong >  <a dir="ltr" href="tel:{{ $faxNUMBER }}">{{ $faxNUMBER }}</a> </p>
                <p><strong>📧 البريد الإلكتروني: </strong> <a href="mailto:Info@leaboz.org.ly"> Info@leaboz.org.ly</a></p>
                <p><strong>🔗 فيسبوك: </strong> <a href="{{$facebookurl}}">facebook.com/z.e.s.c</a></p>

            </div>

            <div class="map-container">
                <iframe width="100%" height="100%" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=%D9%86%D9%82%D8%A7%D8%A8%D8%A9%20%D8%A7%D9%84%D9%85%D9%87%D9%86%20%D8%A7%D9%84%D9%87%D9%86%D8%AF%D8%B3%D9%8A%D8%A9%20%D9%81%D8%B1%D8%B9%20%D8%A7%D9%84%D8%B2%D8%A7%D9%88%D9%8A%D8%A9&t=k&z=17&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
            </div>  
        </section>

@endsection


@section('scriptyield')

    <script>

    </script>

@endsection