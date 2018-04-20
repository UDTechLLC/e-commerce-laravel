@extends('email.layout')

@section('content')
    <p>Name : {{ $name }}</p>
    <p>Email : {{ $email }}</p>
    <p>Message : {{ $massage }}</p>
    @endsection