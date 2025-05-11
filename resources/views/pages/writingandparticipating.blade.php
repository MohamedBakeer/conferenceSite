@extends('layout')

@section('title', '| شروط الكتابة والمشاركة') 
@section('stylo')
  <link rel="stylesheet" href="{{ url('asset/css/pages/writingandparticipating.css') }}">
@endsection

@section('content')


    @if ($lang_dom == 'ar')
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
    @elseif ($lang_dom == 'en')
    <section class="sec1" dir="ltr" id="sec1EN">
        <div class="content">
            <h2>Writing and Participation Guidelines</h2>
            <div class="topdiv">
                    <div class="accordion">
                        
                        <div class="accordion-item">
                            <button class="accordion-button">First: Abstract</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>Focus on linguistic clarity and the title's relevance to the content.</li>
                                    <li>Comprehensiveness of the abstract in conveying the main idea.</li>
                                    <li>Clarity of the adopted methodology.</li>
                                    <li>Expected outcomes of the paper.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Second: Paper Acceptance</button>
                            <div class="accordion-content">
                                <p>Papers falling within the conference themes will be accepted and evaluated by specialists based on the importance of the topic, the level of originality and innovation, and the alignment with the conference's declared objectives.</p>
                            </div>
                        </div>
                        
    
                        <div class="accordion-item">
                            <button class="accordion-button">Third: Dates for Receiving Abstracts and Papers</button>
                            <div class="accordion-content">
                                <ul>
                                    @foreach ( $ImportantDates_en as $li)
                                    <li>{{ $li }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        

                        <div class="accordion-item">
                            <button class="accordion-button">Fourth: Language of the Abstract and Research Paper</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>Papers are accepted in Arabic or English, and each paper must include an abstract in both Arabic and English (200-250 words).</li>
                                    <li>The first page must include the paper title, the author's name, the institution name, and email address. The paper starts with the abstract, followed by keywords, then the main body starting with the introduction and ending with the references list.</li>
                                    <li>For papers written in Arabic, the author must provide a summary of the paper or its results in English to be published alongside the Arabic text. The summary is counted within the paper's total page limit according to the conference publication guidelines.</li>
                                    <li>Each author must ensure the paper is proofread for spelling and linguistic accuracy to ensure proper language and expression.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Fifth: Number of Pages</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>The abstract should not exceed one page (A4).</li>
                                    <li>The total number of pages for the entire paper (including appendices) should not exceed 20 pages, including all drawings, illustrations, tables, and references.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Sixth: Guidelines for Research Manuscript Submission</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>The font for Arabic papers should be "Simplified Arabic," size 14 (non-bold), and the margins should be size 10. Main headings should use the same font, size 16 (Bold), while subheadings should use size 14 (Bold).</li>
                                    <li>The font for English papers should be "Times New Roman," size 12, with headings in size 14 (Bold), and the margins size 10.</li>
                                    <li>Line spacing should be 1.5.</li>
                                    <li>Basic spelling rules must be followed, especially common writing errors such as spacing: no space before punctuation marks (comma, period, exclamation mark, question mark). However, a space should be placed before and after parentheses and quotation marks, ensuring no space inside.</li>
                                    <li>Citations should follow the APA Style.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Seventh: Footnotes</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>All footnotes should be added electronically, not manually.</li>
                                    <li>Footnotes should be listed using the endnotes system, on separate pages from the main text.</li>
                                    <li>Footnote numbers should be inserted using the (Ctrl-Shift-F) shortcut.</li>
                                    <li>Footnote numbers should not be placed inside parentheses, either in the main text or at the end of the paper.</li>
                                    <li>International scientific abbreviations used in each field should be applied.</li>
                                </ul>
                            </div>
                        </div>
                        

                        <div class="accordion-item">
                            <button class="accordion-button">Eighth: Communication and Submission of Papers</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>Abstracts are accepted through the "Submit Abstract" section on the website, or via email at <a href="mailto: {{ $kaydomain }}@leaboz.org.ly">{{ $kaydomain }}@leaboz.org.ly</a>.</li>
                                    <li>Research papers should be submitted through the <a href="https://cmt3.research.microsoft.com/User/Login" target="_blank" rel="noopener noreferrer">Microsoft CMT3 Platform</a> along with the author's CV.</li>
                                    <li>Abstracts will undergo scientific review by specialists in their respective fields, and accepted abstracts will be published in the conference proceedings volume.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Ninth: General Notes</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>Adherence to the latest scientific research methodology guidelines, ensuring the research is original, innovative, and not previously published, with a certificate to this effect provided by the author.</li>
                                    <li>Papers will undergo peer review, and the committee may request modifications deemed necessary for publication. The revised paper should be submitted by the specified deadline, or as agreed with the conference organizing committee.</li>
                                    <li>A participation application form must be submitted along with the paper. The form can be accessed and completed on the conference website.</li>
                                    <li>A brief CV of the author, including personal data, current position, key positions held, published research or scientific achievements, work experience, and contact information, must be attached.</li>
                                    <li>Please refer to the conference announcement on the website for general participation conditions and all other details related to the conference themes, session locations, and hospitality.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Tenth: How to Present Papers</button>
                            <div class="accordion-content">
                                <ul>
                                    <li>Via Oral Presentation.</li>
                                    <ul style="padding-right: 20px; margin: 10px 0px;">
                                        <li>A PowerPoint presentation is required, ensuring clear text and matching background colors.</li>
                                        <li>The presentation duration will be fifteen minutes.</li>
                                        <li>A discussion session will follow each presentation.</li>
                                    </ul>
                                    <li>Required Presentation Specifications:</li>
                                    <ul style="padding-right: 20px; margin: 10px 0px;">
                                        <li>Start with the paper title, the presenter's name, and the institution they are affiliated with.</li>
                                        <li>Divide the content appropriately, such as introduction, main areas, methodology, results, discussion, recommendations.</li>
                                        <li>Simplify the written material, ensuring it conveys useful and focused information.</li>
                                        <li>Shorten titles of figures and tables, omitting unnecessary details.</li>
                                        <li>Ensure clear text and consistent background colors.</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <button class="accordion-button">Note Regarding Posters</button>
                            <div class="accordion-content">
                                <ul style="list-style: circle">
                                    <li>Participants presenting scientific posters are required to follow these guidelines:</li>
                                    <ul style="padding-right: 20px; margin: 5px 0px; list-style: decimal;">
                                        <li>The poster should include the conference title, logo, as well as the researcher's name and affiliation.</li>
                                        <li>The poster should present a summary of the key ideas and content of the research on a single page.</li>
                                        <li>The researcher should choose an appropriate layout and design for the poster, adhering to standard sizes.</li>
                                        <li>Participants must be present at the poster during the display hour to answer attendees' questions.</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                        


                    </div>
            </div>
            <div class="downdiv">
                @if ($Paperwritingtemplate_ar === '0')
                    <a href="#" rel="noopener noreferrer">Paper Writing Template (Arabic)</a>
                @else
                    <a href="{{ url('asset/image/' . $kaydomain . '/Writingandparticipating/Paperwritingtemplate(ar)/' . $Paperwritingtemplate_ar[0] ) }}" rel="noopener noreferrer">Paper Writing Template (Arabic)</a>
                @endif
            
                @if ($pdfwritingtemplate === '0')
                    <a href="#" rel="noopener noreferrer">Download PDF Writing Guidelines</a>
                @else
                    <a href="{{ url('asset/image/' . $kaydomain . '/Writingandparticipating/pdfwritingtemplate/' . $pdfwritingtemplate[0] ) }}" rel="noopener noreferrer">Download PDF Writing Guidelines</a>
                @endif
            
                @if ($Paperwritingtemplate_en === '0')
                    <a href="#" rel="noopener noreferrer">Paper Writing Template (English)</a>
                @else
                    <a href="{{ url(path: 'asset/image/' . $kaydomain . '/Writingandparticipating/Paperwritingtemplate(en)/' . $Paperwritingtemplate_en[0] ) }}" rel="noopener noreferrer">Paper Writing Template (English)</a>
                @endif
            </div>
            

        </div>
    </section>
    @endif

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

        
