@extends('admin.layouts.app')
@section('content')
    <h3>Home page</h3>
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Banners list</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped table-bordered bulk_action">
                    <thead>
                    <tr>
                        <th>Banner</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td>
                                Banner {{ $banner->getKey() }}
                            </td>
                            <td>
                                <img src="{{asset($banner->desktopImage)}}" width="100px" alt="">
                            </td>
                            <td>
                                {{ $banner->updated_at }}
                            </td>
                            <td >
                               <a href="{{ route('admin.cms.homepage.edit', $banner->getKey()) }}"  class="item-edit"><i
                                            class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection