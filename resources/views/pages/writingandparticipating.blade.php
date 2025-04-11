@extends('layout')

@section('title', '| شروط الكتابة والمشاركة') 
@section('stylo')
  <link rel="stylesheet" href="{{ url('asset/css/pages/writingandparticipating.css') }}">
@endsection

@section('content')

    <section class="sec1">
        <div class="content">
            <h2>شروط الكتابة والمشاركة</h2>
            <div class="topdiv">
                    <div class="accordion">
                        
                        <div class="accordion-item">
                            <button class="accordion-button">أولاً: الملخص</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>التركيز على الصيغة اللغوية ودلالة العنوان على المضمون.</li>
                                    <li>شمولية الملخص لفكرة الموضوع.</li>
                                    <li>وضوح المنهجية المتبعة.</li>
                                    <li>النتائج المرجوة للورقة.</li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="accordion-item">
                            <button class="accordion-button">ثانياً: قبول البحوث</button>
                            <div class="accordion-content">
                                <p>تُقبل البحوث التى تقع فى مجال محاور المؤتمر المختلفة، ويتم تقييمها من قبل المتخصصين من حيث مدى أهمية الموضوع ومن حيث التجديد والابتكار وانتمائه إلى مجال المؤتمر وأهدافه المُعلنة.</p>
                            </div>
                        </div>
    
                        <div class="accordion-item">
                            <button class="accordion-button">ثالثاً: مواعيد تلقي الملخصات والأبحاث</button>
                            <div class="accordion-content">
                                <ul>
                                    @foreach ( $ImportantDates as $li)
                                    <li>{{ $li }}</li>
                                    @endforeach
                                  </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">رابعاً: لغـة الملخص والبحث</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>تُقبل البحوث باللغة العربية أو الإنجليزية ويكون للبحث ملخص باللغتين العربية والإنجليزية (200- 250 كلمة).</li>
                                    <li>يجب أن تشتمل الصفحة الأولى على عنوان البحث، واسم الباحث، واسم المؤسسة ، والبريد الالكتروني. ويبدأ البحث بالملخص، ثم يليه الكلمات المفتاحية، ثم بقية البحث مبتدئاً بالمقدمة، ومنتهياً بقائمة المراجع.</li>
                                    <li>بالنسبة للأبحاث المكتوبة باللغة العربية، يقدم الباحث موجزاً للبحث أو نتائجه باللغة الإنجليزية لنشره مع المتن العربي، على أن يُحتَسب ضمن أوراق البحث وفقاً للحد الأقصى لعدد الصفحات المسموح بها في قواعد النشر بهذا المؤتمر.</li>
                                    <li>على كل باحث الالتزام بالتدقيق الإملائي واللغوي لبحثه، حرصاً على سلامة اللغة ودقة التعبير.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">خامساً: عدد الصفحات</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>لا يزيد حجم الملخص عن صفحة واحدة  (A4)</li>
                                    <li>لا يزيد عدد أوراق البحث كاملاً (بملحقاته) عن 20 صفحة للبحث الواحد شاملة جميع الرسومات، والأشكال التوضيحية، والجداول، وقائمة المراجع.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">سادساً: قواعد تقديم مخطوط البحث</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>الفونت المستخدم في الأبحاث العربية (Simplified Arabic)، وبحجم (14غير بارز)، والهوامش بحجم (10)، أما العناوين الرئيسية فتكون بنفس الفونت بحجم (16(Bold، والعناوين الفرعية بحجم (14Bold ).</li>
                                    <li>الفونت المستخدم في الأبحاث الانجليزية من نوع (Times New Roman)، حجم (12)، والعناوين حجم (14Bold)، والهوامش حجم (10) .</li>
                                    <li>تترك مسافة (1.5) بين السطور.</li>
                                    <li>مراعاة القواعد الإملائية الأساسية التي تكون موضعاً للأخطاء الشائعة في الكتابة، ومنها: المسافات، حيث لا توضع مسافة قبل أية علامة من علامات الترقيم (الفاصلة، والنقطة، وعلامات التعجب والاستفهام). أما الأقواس وعلامات التنصيص فلابد من مسافة قبلها، وأخرى بعدها، على ألا تتضمن داخلها مسافة بينها وبين ما تتضمنه.</li>
                                    <li>يتم التوثيق وفقا لنظام  APA Style. </li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">سابعاً: الحواشي السفلية (Footnotes)</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>يتم إدراج كافة الحواشي إلكترونياً لا يدوياً.</li>
                                    <li>تدرج الحواشي كلها بنظام الحواشي الختامية (endnotes) وذلك في صفحات مستقلة عن متن البحث.</li>
                                    <li>يتم إدراج أرقام الحواشي بالضغط على الأزرار (Ctr- Shift- F).</li>
                                    <li>لا توضع أرقام الحواشي بين أقواس، سواء بالمتن، أو ضمن موقعها بنهاية البحث.</li>
                                    <li>يُعمل بالاختصارات الدولية العلمية المستخدمة فى كل تخصص.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">ثامناً: وسائل التواصل وتسليم الأبحاث</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>يتم استقبال الملخصات من خلال خانة "إرسال الملخصات" على الموقع الإلكتروني، أو عبر البريد الإلكتروني <a href="mailto: {{ $kaydomain }}@leaboz.org.ly">{{ $kaydomain }}@leaboz.org.ly</a>.</li>
                                    <li>تقدم الورقات البحثية عن طريق  <a href="https://cmt3.research.microsoft.com/User/Login" target="_blank" rel="noopener noreferrer">منصة مايكروسوفت CMT3</a> مرفقة مع السيرة الذاتية للمؤلف</li>
                                    <li>تخضع الملخصات للتحكيم العلمي من قبل متخصصين في مجالاتها، وسيُنشر المقبول منها بمجلد وقائع المؤتمر.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">تاسعاً: ملاحظات عامة</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>الالتزام بأحدث قواعد المنهج العلمي في كتابة الأبحاث وحواشيها، مع اتسام الأبحاث بالأصالة والتجديد، وألا يكون قد سبق نشرها، ويقدم الباحث إفادة بذلك.</li>
                                    <li>تخضع الأبحاث للتحكيم، ويمكن أن تطلب اللجنة من الباحث إجراء أية تعديلات تراها ضرورية للنشر، على أن يتم تقديمها في المواعيد التي تحددها اللجنة، أو بالاتفاق مع اللجنة المشرفة والمنظمة للمؤتمر.</li>
                                    <li>يقدم مع البحث استمارة طلب المشاركة، ويمكن الاطلاع عليها بموقع المؤتمر وملء بياناتها بدقة.</li>
                                    <li>ترفق سيرة ذاتية مختصرة عن الباحث، متضمنة البيانات الشخصية، والوظيفة الحالية، وأهم المواقع التي شغلها، والأبحاث أو المنجزات العلمية، والخبرات العملية، ووسائل الاتصال والتواصل .</li>
                                    <li>يرجى الرجوع إلى إعلان المؤتمر على الموقع للتعرف على الشروط العامة للمشاركة، وكافة التفاصيل الأخرى بشأن محاور المؤتمر، ومقار  الجلسات والضيافة. </li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">عاشراً : كيفية عرض الأبحاث </button>
                            <div class="accordion-content">
                                <ul>
                                    <li>عن طريق الإلقاء .( Oral Presentation )</li>
                                    <ul style="padding-right: 20px; margin: 10px 0px;">
                                        <li>تقديم عرض (Power point) ويشترط أن يكون الخط واضحاً وألوان الخلفيات متناسقة.</li>
                                        <li>مدة العرض ستكون خمسة عشر دقيقة.</li>
                                        <li>سيكون هناك حلقة نقاش نهاية كل جلسة.</li>
                                    </ul>
                                    <li>المواصفات المطلوبة في العرض التقديمي:</li>
                                    <ul style="padding-right: 20px ; margin: 10px 0px;">
                                        <li>استهلاله بعنوان البحث، واسم المشارك، والمؤسسة التي ينتسب إليها.</li>
                                        <li>تقسم محتويات البحث بشكل مناسب مثل: المقدمة، المجالات الرئيسة، المنهجية، النتائج، المناقشة، التوصيات.</li>
                                        <li>تختصر المادة العلمية المكتوبة فيه بحيث تقدم معلومات مفيدة، ومركزة.</li>
                                        <li>اختصار عناوين الأشكال والجداول وان لا تتضمن تفصيلات غير ضرورية.</li>
                                        <li>وضوح الكتابة عليها وأن تكون ألوان الخلفيات متناسقة.</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button">ملاحظة بخصوص الملصقات (POSTERS)</button>
                            <div class="accordion-content">
                                <ul style="list-style: circle">
                                    <li>يطلب من المشاركون المكلفون بتقديم ملصقات علمية (scientific  posters) الالتزام بالنقاط التالية:</li>
                                    <ul style="padding-right: 20px; margin: 5px 0px; list-style: decimal;">
                                        <li>احتواء الملصق على عنوان وشعار المؤتمر الى جانب اسم الباحث وجهة عمله.</li>
                                        <li>ان يتم عرض ملخص لأهم أفكار ومحتوى البحث في ملصق واحد.</li>
                                        <li>أن يختار الباحث الشكل والتصميم المناسب لعرض الملصق حسب الأحجام المتعارف عليها.</li>
                                        <li>الالتزام بالتواجد بالمكان ساعة العرض وذلك للإجابة على أسئلة الحضور.</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>


                    </div>
            </div>
            <div class="downdiv">
                @if ($Paperwritingtemplate_ar === '0')
                    <a href="#" rel="noopener noreferrer">قالب كتابة الورقة (عربي)</a>
                @else
                    <a href="{{ url('asset/image/' . $kaydomain . '/Writingandparticipating/Paperwritingtemplate(ar)/' . $Paperwritingtemplate_ar[0] ) }}" rel="noopener noreferrer">قالب كتابة الورقة (عربي)</a>
                @endif

                @if ($pdfwritingtemplate === '0')
                <a href="#" rel="noopener noreferrer">تحميل شروط الكتاب PDF</a>
                @else
                <a href="{{ url('asset/image/' . $kaydomain . '/Writingandparticipating/pdfwritingtemplate/' . $pdfwritingtemplate[0] ) }}" rel="noopener noreferrer">تحميل شروط الكتاب PDF</a>
                @endif

                @if ($Paperwritingtemplate_en === '0')
                <a href="#" rel="noopener noreferrer">قالب كتابة الورقة (english)</a>
                @else
                <a href="{{ url(path: 'asset/image/' . $kaydomain . '/Writingandparticipating/Paperwritingtemplate(en)/' . $Paperwritingtemplate_en[0] ) }}" rel="noopener noreferrer">قالب كتابة الورقة (english)</a>
                @endif
                
            </div>
        </div>
    </section>

@endsection


@section('scriptyield')

    <script>

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".accordion-button");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            // إغلاق أي عنصر مفتوح آخر
            buttons.forEach(btn => {
                if (btn !== button) {
                    btn.classList.remove("active");
                    btn.nextElementSibling.style.display = "none";
                }
            });

            // فتح أو إغلاق العنصر الحالي
            this.classList.toggle("active");
            let content = this.nextElementSibling;
            content.style.display = content.style.display === "block" ? "none" : "block";
        });
    });
});


    </script>

@endsection

        
