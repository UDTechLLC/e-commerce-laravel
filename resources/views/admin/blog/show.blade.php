@extends('admin.layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    {!! $post->content !!}
    {{ $post->getFirstMedia() }}
@stop
