@extends('admin.layouts.app')

@section('content')
    <challenges :challenges="{{$challenges}}"></challenges>
@endsection