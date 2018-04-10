@extends('admin.layouts.app')

@section('content')
    <h2>Timer</h2>
        <timer timer-props="{{$timer}}"></timer>
@endsection