@extends('layout')

@section('title', '| الأهداف والمحاور') 
@section('stylo')
  <link rel="stylesheet" href="{{ url('asset/css/pages/Objectivesandthemes.css') }}">
@endsection

@section('content')
    
    @if ($lang_dom == 'ar')
    <section class="sec1">
        <div class="right">
            <div class="header">
                <h1>أهداف المؤتمر :</h1>
            </div>
            @if ($objectives->isNotEmpty()) 
                <ul>
                    @foreach ($objectives as $objective)
                        <li>{{ $objective }}</li>
                    @endforeach
                </ul>
            @else
                <p>⚠️ لم تتم إضافة أهداف لهذا المؤتمر بعد.</p>
            @endif
            
        </div>
        <div class="left">
            <div class="header">
                <h1>محاور المؤتمر :</h1>
            </div>
            
            @if ($topics->isNotEmpty()) <!-- تأكد أن هناك محاور قبل العرض -->
                <ul class="topic">
                    @foreach ($topics as $topic)
                        <li>{{ $topic['title'] }}</li> <!-- عرض عنوان المحور -->
            
                        @if (!empty($topic['sub_topics']) && count($topic['sub_topics']) > 0) <!-- تحقق من وجود مواضيع فرعية -->
                            <ul class="subtopic">
                                @foreach ($topic['sub_topics'] as $subTopic)
                                    <li>{{ $subTopic }}</li> <!-- عرض المواضيع الفرعية -->
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            @else
                <p>⚠️ لم تتم إضافة محاور لهذا المؤتمر بعد.</p>
            @endif
                    </div>
    </section>
    @elseif ($lang_dom == 'en')
    <section class="sec1" dir="ltr">
        <div class="right" id="rightEN">
            <div class="header">
                <h1>Conference objectives:</h1>
            </div>
            @if ($objectives_en->isNotEmpty()) 
                <ul>
                    @foreach ($objectives_en as $objective)
                        <li>{{ $objective }}</li>
                    @endforeach
                </ul>
            @else
                <p>⚠️ No goals have been added to this conference yet.</p>
            @endif
            
        </div>
        <div class="left" id="leftEN">
            <div class="header">
                <h1>Conference topics:</h1>
            </div>
            
            @if ($topics->isNotEmpty()) <!-- تأكد أن هناك محاور قبل العرض -->
                <ul class="topic">
                    @foreach ($topics as $topic)
                        <li>{{ $topic['title_en'] }}</li> <!-- عرض عنوان المحور -->
            
                        @if (!empty($topic['sub_topics_en']) && count($topic['sub_topics_en']) > 0) <!-- تحقق من وجود مواضيع فرعية -->
                            <ul class="subtopic">
                                @foreach ($topic['sub_topics_en'] as $subTopic)
                                    <li>{{ $subTopic }}</li> <!-- عرض المواضيع الفرعية -->
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            @else
                <p>⚠️ No topics have been added to this conference yet.</p>
            @endif
        </div>
    </section>
    @endif
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