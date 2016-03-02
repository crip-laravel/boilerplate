@extends('layouts.master')

@section('content')

    {!! Former::open(action('Auth\PasswordController@postEmail')) !!}

    {!! Former::text('email')->label('Email: ') !!}

    {!! Former::actions(Former::primary_submit('Reset')) !!}

    {!! Former::close() !!}

@endsection