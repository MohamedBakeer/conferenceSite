@extends('layout')

@section('title', '| شروط الكتابة والمشاركة')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/researchpapers.css') }}">
@endsection

@section('content')


    @if ($lang_dom == 'ar')
    @if ($isResearchApproved > 0)
    <section class="sec1">

        <div class="content">
            <form method="GET" action="{{ url()->current() }}">
                <input type="text" name="search" placeholder="عنوان الورقة البحثية" value="{{ request('search') }}">
                <button type="submit">بحث 🔎</button>
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>عنوان الورقة</th>
                            <th>رابط التحميل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($papers as $paper)
                            <tr>
                                <td>{{ $paper->research_title }}</td>
                                @if ($paper->type_of_paper == 'file')
                                    <td><a  href="{{ url('asset/image/' . $kaydomain . '/Sendresearch/Thepaper/' . $paper->file_path_name) }}" target="_blank" download>🔗</a></td>

                                @elseif($paper->type_of_paper == 'link')
                                    <td><a href="{{ $paper->file_path_name }}" target="_blank">🔗</a></td>
                                @endif

                            </tr>
                        @endforeach
                        {{-- @for ($i = 0 ; $i < 100 ; $i ++) <tr>
                            <td>ورقة بحث رقم {{ $i + 1 }}</td>
                            <td><a href="#">تحميل</a></td>
                            </tr>
                            @endfor --}}
                    </tbody>
                </table>
            </div>

            {{-- ✅ إضافة Pagination --}}
            <div class="pagination">
                {{ $papers->links() }}
            </div>
        </div>
    </section>
@else
    <div class="abort">
        <h1>لا توجد ورقات بحثية إلى هذه اللحظة</h1>
    </div>
@endif
    @elseif ($lang_dom == 'en')
    @if ($isResearchApproved > 0)
    <section class="sec1" dir="ltr">

        <div class="content">
            <form method="GET" action="{{ url()->current() }}">
                <input type="text" name="search" placeholder="Research paper title :" value="{{ request('search') }}">
                <button type="submit">Search 🔎</button>
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Paper title</th>
                            <th>Download link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($papers as $paper)
                            <tr>
                                <td>{{ $paper->research_title }}</td>
                                @if ($paper->type_of_paper == 'file')
                                    <td><a  href="{{ url('asset/image/' . $kaydomain . '/Sendresearch/Thepaper/' . $paper->file_path_name) }}" target="_blank" download>🔗</a></td>

                                @elseif($paper->type_of_paper == 'link')
                                    <td><a href="{{ $paper->file_path_name }}" target="_blank">🔗</a></td>
                                @endif

                            </tr>
                        @endforeach
                        {{-- @for ($i = 0 ; $i < 100 ; $i ++) <tr>
                            <td>ورقة بحث رقم {{ $i + 1 }}</td>
                            <td><a href="#">تحميل</a></td>
                            </tr>
                            @endfor --}}
                    </tbody>
                </table>
            </div>

            {{-- ✅ إضافة Pagination --}}
            <div class="pagination">
                {{ $papers->links() }}
            </div>
        </div>
    </section>
@else
    <div class="abort">
        <h1>There are no research papers yet.</h1>
    </div>
@endif
    @endif
    

@endsection


@section('scriptyield')

    <script>

    </script>

@endsection