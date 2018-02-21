@extends('web.layouts.app')
@section('content')
   <checkout></checkout>
@endsection
@section('scripts')
   @parent
   <script src="{{ asset('web/js/select2.min.js') }}"></script>
@endsection