@extends('web.layouts.app')
@section('title')
    Shopping Cart -@parent
@endsection
@section('style')
    @parent
    <!--Start of Zendesk Chat Script-->
    <script type="text/javascript" src="{{asset('web/js/chat.js')}}"></script>
    <!--End of Zendesk Chat Script-->
@endsection
@section('content')

<div class="main">
    <cart></cart>
</div>

@endsection
