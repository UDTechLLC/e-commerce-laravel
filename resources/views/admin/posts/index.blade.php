@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Posts </h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="{{ route('admin.posts.create') }}">
                            <button class="btn btn-sm btn-success btn-block">
                                <i class="fa fa-plus"></i> Create post
                            </button>
                        </a>
                        </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ asset($post->getFirstMediaUrl('preview')) }}" alt="image"/>
                                        <div class="mask">
                                            <p>Action</p>
                                            <div class="tools tools-bottom">
                                                <a href="{{ route('admin.posts.edit', $post->slug) }}"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('admin.posts.delete', $post->slug) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>{{ $post->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection