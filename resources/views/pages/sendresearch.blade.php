@extends('layout')

@section('title', '| شروط الكتابة والمشاركة')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/Sendresearch.css') }}">
@endsection

@section('content')

    @if ($Receivingpapers === 'active')
    <section class="sec1">
        <div class="content">
            <div class="buttons">
                <button onclick="showForm('abstractForm')">إرسال الملخص</button>
                <button onclick="showForm('paperForm')">إرسال ورقة البحث</button>
                <button onclick="showForm('cmt3')">التسجيل في CMT3</button>
            </div>
            <div class="forms">
                <div class="defult">
                    <h1>الرجاء إختيار أحد الخيارات </h1>
                </div>

                <div class="cmt3">
                    <h2>الرجاء إتباع الخطوات في الفيديو</h2>
                    <video src="{{ url('asset/video/CMT3/HowTOLogin.mp4') }}" controls></video>
                    <a href="https://cmt3.research.microsoft.com/User/Login">رابط المنصة</a>
                </div>

                <form action="{{ route('Sendresearch.Summary' , ['subdomain' => request()->route('subdomain')]) }}" method="post" class="abstractForm" enctype="multipart/form-data">
                    @csrf
                    <h2>يرجى تعبئة نموذج الملخص كاملاً</h2>
                    <div class="feilds">
                        <div class="feild">

                            <div>
                                <input type="text" name="engineer_name" required placeholder="الاسم بالكامل : " id="">
                            </div>

                            <div>
                                <input type="text" name="engineer_email" required placeholder="البريد الإلكتروني : " id="">
                            </div>

                            <div>
                                <input type="text" name="phone_number" required placeholder="رقم الهاتف : " id="">
                            </div>

                            <div>
                                <input type="text" name="university" required placeholder="المؤسسة/الجامعة : " id="">
                            </div>

                            <div>
                                <input type="text" name="research_title" required placeholder="عنوان البحث : " id="">
                            </div>

                            <div>
                                <!-- عنصر الـ input الأصلي (مخفي) -->
                                <input type="file" id="fileInput" name="research_file" class="custom-file-input">

                                <!-- زر مخصص لاختيار الملف -->
                                <label for="fileInput" class="custom-file-label">📂 اختر ملف</label>

                                <!-- لعرض اسم الملف المختار -->
                                <span class="file-name">لم يتم اختيار ملف</span>
                            </div>

                        </div>
                        <div class="btn">
                            <input type="submit" value="إرسال">
                        </div>
                    </div>
                </form>


                <form action="{{ route('Sendresearch.Thepaper' , ['subdomain' => request()->route('subdomain')]) }}" method="post" class="paperForm" enctype="multipart/form-data">
                    @csrf
                    <h2>يرجى تعبئة نموذج الورقة كاملاً</h2>
                    <div class="feilds">
                        <div class="feild">

                            <div>
                                <input type="text" name="engineer_name" required placeholder="الاسم بالكامل : " id="">
                            </div>

                            <div>
                                <input type="text" name="engineer_email" required placeholder="البريد الإلكتروني : " id="">
                            </div>

                            <div>
                                <input type="text" name="phone_number" required placeholder="رقم الهاتف : " id="">
                            </div>

                            <div>
                                <input type="text" name="university" required placeholder="المؤسسة/الجامعة : " id="">
                            </div>

                            <div>
                                <input type="text" name="research_title" required placeholder="عنوان البحث : " id="">
                            </div>

                            <div>
                                <!-- عنصر الـ input الأصلي (مخفي) -->
                                <input type="file" id="fileInputg" name="research_file" class="custom-file-input">

                                <!-- زر مخصص لاختيار الملف -->
                                <label for="fileInputg" class="custom-file-label">📂 اختر ملف</label>

                                <!-- لعرض اسم الملف المختار -->
                                <span class="file-nameg">لم يتم اختيار ملف</span>
                            </div>

                        </div>
                        <div class="btn">
                            <input type="submit" value="إرسال">
                        </div>
                    </div>
                </form>                


            </div>
        </div>
    </section>
    @else
        <div class="abort">
            <h1>لم نقم بإستلام الورقات البحثية بعد</h1>
        </div>
    @endif

    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif


@endsection


@section('scriptyield')

    <script>


        // عند اختيار ملف، يتم تحديث اسم الملف المعروض
        document.getElementById("fileInput").addEventListener("change", function () {
            let fileName = this.files.length > 0 ? this.files[0].name : "لم يتم اختيار ملف";
            document.querySelector(".file-name").textContent = fileName;
        });

        document.getElementById("fileInputg").addEventListener("change", function () {
            let fileName = this.files.length > 0 ? this.files[0].name : "لم يتم اختيار ملف";
            document.querySelector(".file-nameg").textContent = fileName;
        });


        function showForm(params) {
            document.querySelector('.sec1 > .content > .forms').style.height = "auto";
            document.querySelector('.sec1 > .content > .forms > .defult').style.display = 'none';
            document.querySelector('.sec1 > .content > .forms > .cmt3').style.display = 'none';
            document.querySelector('.sec1 > .content > .forms > .abstractForm').style.display = 'none';
            document.querySelector('.sec1 > .content > .forms > .paperForm').style.display = 'none';
            document.querySelector('.sec1 > .content > .forms > .paperForm').style.display = 'none';

            document.querySelector(`.sec1 > .content > .forms > .${params}`).style.display = 'flex';
        }

    </script>

@endsection