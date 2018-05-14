@extends('admin.layouts.app')
@section('content')
    <cms-homepage-edit :banner-props="{{ $banner }}"></cms-homepage-edit>
@endsection