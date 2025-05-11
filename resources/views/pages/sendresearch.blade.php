@extends('layout')

@section('title', '| شروط الكتابة والمشاركة')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/Sendresearch.css') }}">
@endsection

@section('content')

        

        <section class="sec1">
            @if ($lang_dom == 'ar')
            <div class="content">
                <div class="buttons">

                <button onclick="showForm(0)">إرشادات التقديم</button>
                <button onclick="showForm(1)">كيفية التقديم عبر CMT3</button>
                <button onclick="showForm(2)">رابط التقديم عبر CMT3</button>

                </div>

                <div class="forms">
                      <!-- محتوى يتم عرضه حسب الزر الذي تم الضغط عليه -->
                    <div class="instructions" style="display: none;">
                        <h2>إرشادات التقديم</h2>
                        <p>يرجى من جميع المشاركين التحقق من إرشادات التقديم التالية لضمان قبول ورقتك البحثية في المؤتمر:</p>
                        <ul>
                            <li><strong>صيغة الورقة:</strong> يجب أن تكون الورقة بصيغة PDF فقط.</li>
                            <li><strong>عدد الصفحات:</strong> يجب أن تكون الورقة بين 4 إلى 8 صفحات.</li>
                            <li><strong>تنسيق الورقة:</strong> يجب استخدام قالب IEEE المرفق ( <a href="{{  url('asset/image/' . $kaydomain . '/CMT3/IEEE/conference-template-a4.docx')  }}">لتحميل القالب، يرجى الضغط هنا</a> ).</li>
                        </ul>

                        <h2>إرشادات المؤلف</h2>
                        <p>للمؤلفين الذين يرغبون في تقديم ورقة بحثية، يرجى اتباع الإرشادات التالية لضمان قبول البحث:</p>
                        <ul>
                            <li><strong>المؤلف الرئيسي:</strong> يجب أن يكون المؤلف الرئيسي هو الشخص الذي سيقدم الورقة البحثية ويجب أن يكون هو المسؤول عن التواصل مع اللجنة.</li>
                            <li><strong>عدد المؤلفين:</strong> يمكن أن يحتوي البحث على أكثر من مؤلف، ولكن يجب أن يتم تحديد المؤلف الرئيسي بوضوح في الورقة.</li>
                            <li><strong>التحقق من الأصالة:</strong> يجب أن تكون الورقة البحثية أصلية ولم يتم نشرها أو تقديمها في مؤتمرات أو مجلات أخرى.</li>
                            <li><strong>الملخص:</strong> يجب على المؤلفين تقديم ملخص يتضمن فكرة البحث الرئيسية وأهدافه.</li>
                            <li><strong>التواصل مع المؤلفين الآخرين:</strong> يجب أن يتواصل المؤلف الرئيسي مع جميع المؤلفين الآخرين قبل تقديم الورقة.</li>
                        </ul>
                    </div>

                    <div class="howToSubmit" style="display: none;">
                        <h2>كيفية التقديم عبر CMT3</h2>
                        @if ( file_exists(public_path( 'asset/image/' . $kaydomain . '/CMT3/Video/cmt3video.mp4' )) )
                            <p>يمكنك مشاهدة الفيديو التوضيحي لكيفية التقديم عبر CMT3 من خلال الرابط أدناه:</p>
                            <video src="{{ url('asset/image/' . $kaydomain . '/CMT3/Video/cmt3video.mp4') }}" type="video/mp4"  width="100%" height="auto" controls ></video>
                            <p>يرجى ملاحظة أن الفيديو قد يحتوي على معلومات إضافية حول كيفية استخدام CMT3، لذا تأكد من مشاهدته بالكامل.</p>
                            <p>إذا كان لديك أي استفسارات أو تحتاج إلى مساعدة إضافية، فلا تتردد في التواصل معنا عبر البريد الإلكتروني.</p>
                            <a href="mailto: {{ $kaydomain }}@leaboz.org.ly">{{ $kaydomain }}@leaboz.org.ly</a>
                        @else
                            <p>في الوقت الحالي، نحن ننتظر الموافقة من CMT3 لكي نقوم بتوفير فيديو توضيحي لكيفية التقديم عبر المنصة. بمجرد الموافقة، سيتم توفير الفيديو الذي يشرح خطوات التقديم بالكامل.</p>
                            <p>يرجى متابعة الموقع للحصول على آخر التحديثات.</p>
                        @endif
                      </div>

                      <!-- رابط التقديم عبر CMT3 -->
                    <div class="cmt3Link" style="display:none;">
                        <h2>رابط التقديم عبر CMT3</h2>
                        <p>اضغط على الرابط أدناه للتقديم عبر CMT3</p>
                        <a href="{{ $CMT3url }}" target="_blank">رابط التقديم عبر CMT3</a>
                    </div>
                </div>

               

            </div>
            @elseif ($lang_dom == 'en')
            <div class="content" dir="ltr">
                <div class="buttons">
            
                    <button onclick="showForm(0)">Submission Guidelines</button>
                    <button onclick="showForm(1)">How to Submit via CMT3</button>
                    <button onclick="showForm(2)">CMT3 Submission Link</button>
            
                </div>
            
                <div class="forms">
                    <!-- Content shown based on selected button -->
                    <div class="instructions" style="display: none;">
                        <h2>Submission Guidelines</h2>
                        <p>All participants are required to check the following submission guidelines to ensure their paper is accepted in the conference:</p>
                        <ul>
                            <li><strong>Paper Format:</strong> The paper must be in PDF format only.</li>
                            <li><strong>Number of Pages:</strong> The paper must be between 4 to 8 pages.</li>
                            <li><strong>Paper Template:</strong> The IEEE template must be used (<a href="{{ url('asset/image/' . $kaydomain . '/CMT3/IEEE/conference-template-a4.docx') }}">Click here to download the template</a>).</li>
                        </ul>
            
                        <h2>Author Guidelines</h2>
                        <p>For authors who wish to submit a research paper, please follow these guidelines to ensure acceptance:</p>
                        <ul>
                            <li><strong>Primary Author:</strong> The primary author should be the one presenting the paper and responsible for communication with the committee.</li>
                            <li><strong>Number of Authors:</strong> A paper may have multiple authors, but the primary author must be clearly indicated in the paper.</li>
                            <li><strong>Originality Check:</strong> The paper must be original and must not have been published or submitted to other conferences or journals.</li>
                            <li><strong>Abstract:</strong> Authors must submit an abstract outlining the main idea and objectives of the research.</li>
                            <li><strong>Communication with Co-authors:</strong> The primary author must communicate with all co-authors before submitting the paper.</li>
                        </ul>
                    </div>
            
                    <div class="howToSubmit" style="display: none;">
                        <h2>How to Submit via CMT3</h2>
                        @if ( file_exists(public_path( 'asset/image/' . $kaydomain . '/CMT3/Video/cmt3video.mp4' )) )
                            <p>You can watch the instructional video on how to submit via CMT3 at the link below:</p>
                            <video src="{{ url('asset/image/' . $kaydomain . '/CMT3/Video/cmt3video.mp4') }}" type="video/mp4" width="100%" height="auto" controls></video>
                            <p>Please note that the video may include additional information on how to use CMT3, so make sure to watch it completely.</p>
                            <p>If you have any questions or need additional help, feel free to contact us via email.</p>
                            <a href="mailto: {{ $kaydomain }}@leaboz.org.ly">{{ $kaydomain }}@leaboz.org.ly</a>
                        @else
                            <p>Currently, we are waiting for CMT3 approval to provide an instructional video on how to submit via the platform. Once approved, the video will be made available with full submission steps.</p>
                            <p>Please follow the website for updates.</p>
                        @endif
                    </div>
            
                    <!-- CMT3 Submission Link -->
                    <div class="cmt3Link" style="display:none;">
                        <h2>CMT3 Submission Link</h2>
                        <p>Click the link below to submit via CMT3</p>
                        <a href="{{ $CMT3url }}" target="_blank">Submit via CMT3</a>
                    </div>
                </div>
            </div>
            
            @endif  
        </section>




@endsection


@section('scriptyield')

    <script>
        
        let arraybtn = document.querySelectorAll('.sec1 > .content > .buttons > button');
        let forms = document.querySelectorAll('.sec1 > .content > .forms > div');
        function showForm(indexBtn) {
            // set all button unHover
            // Hide all forms and 

            for (let index = 0; index < arraybtn.length; index++) {
                console.log(index);
                arraybtn[index].style.backgroundColor = "#444444";
            }

            for (let j = 0; j < forms.length; j++) {
                forms[j].style.display = "none";
                console.log(j);
            }

            arraybtn[indexBtn].style.backgroundColor = "#222222";
            forms[indexBtn].style.display = "flex";
        }

    </script>

@endsection