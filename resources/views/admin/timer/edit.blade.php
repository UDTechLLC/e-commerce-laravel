@extends('admin.layouts.app')

@section('content')
    <h2>Countdown Clock</h2>
        <timer timer-props="{{$timer}}"></timer>
@endsection