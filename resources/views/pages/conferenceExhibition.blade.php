@extends('layout')

@section('title', '| معرض المؤتمر')
@section('stylo')
    <link rel="stylesheet" href="{{ url('asset/css/pages/conferenceExhibition.css') }}">
@endsection

@section('content')

@if ("1" === '2')
<section class="sec1">
    <h2>معرض {{ $ConferenceName }}</h2>
    <div class="content">
    
    </section>
    @else
        <div class="abort">
            <h1>مزال معرض المؤتمر تحت الإنشاء</h1>
        </div>
    @endif

@endsection


@section('scriptyield')

    <script>

    </script>

@endsection