@extends('admin.layouts.app')

@section('content')
    <challenges-edit :challenge="{{$challenge}}"></challenges-edit>
@endsection