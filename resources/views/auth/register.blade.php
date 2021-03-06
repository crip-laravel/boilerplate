@extends('layouts.master')

@section('content')

    {!!Former::open(action('Auth\AuthController@postRegister'))!!}

    {!! Former::text('name')->label('Name: ') !!}
    {!! Former::text('email')->label('Email: ') !!}
    {!! Former::password('password')->label('Password: ') !!}
    {!! Former::password('password_confirmation')->label('Confirm password') !!}

    {!! Former::actions(Former::primary_submit('Register')) !!}

    {!!Former::close()!!}

@endsection