@extends('layouts.master')

@section('content')

    <style>
        .title {
            font-size: 96px;
        }
    </style>
    <div class="title">Laravel 5</div>

    <textarea class="tinymce">Hello world</textarea>

@endsection

@section('before-scripts')

    <script type="text/javascript" src="/tinymce/tinymce.js"></script>

@endsection