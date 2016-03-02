@extends('layouts.master')

@section('content')

    {!! Former::open(action('Auth\PasswordController@postReset')) !!}

    {!! Former::text('email')->label('Email: ') !!}
    {!! Former::password('password')->label('Password: ') !!}
    {!! Former::password('password_confirmation')->label('Confirm password: ') !!}

    {!! Former::actions(Former::primary_submit('Reset')) !!}

    {!! Former::close() !!}

@endsection