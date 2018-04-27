@extends('admin.layouts.app')
@section('content')
    <h3>Categories</h3>
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Categories list</h2>
                <div class="nav navbar-right panel_toolbox">
                    <a href="{{ route('admin.categories.create') }}">
                        <button class="btn btn-sm btn-success btn-block">
                            <i class="fa fa-plus"></i> Create Category
                        </button>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped table-bordered bulk_action">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->getKey() }}
                            </td>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                {{ $category->created_at }}
                            </td>
                            <td >
                                <a href="entry.action.edit"  class="item-edit"><i
                                            class="fa fa-edit"></i></a>

                                <a href="{{ route('admin.categories.delete', $category->getKey()) }}" class="item-delete" onclick="return confirm('Are you sure you want to delete this item?');"><i
                                            class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection