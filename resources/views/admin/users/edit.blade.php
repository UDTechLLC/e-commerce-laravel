@extends('admin.layouts.app')

@section('content')
    <users-edit :user="{{$user}}"></users-edit>
@endsection