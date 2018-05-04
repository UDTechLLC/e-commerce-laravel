@extends('admin.layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    {!! $post->content !!}
    {{ $post->getFirstMedia() }}
@stop

@section('description', $post->meta_description)
@section('keywords', $post->meta_keywords)
