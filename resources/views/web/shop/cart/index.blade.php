@extends('web.layouts.app')
@section('title')
    Shopping Cart -@parent
@endsection
@section('content')
<div class="main">
    <cart></cart>

</div>

@endsection
@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/tween.js@16.3.4"></script>
    @endsection