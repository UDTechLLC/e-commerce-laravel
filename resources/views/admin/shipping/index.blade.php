@extends('admin.layouts.app')
@section('content')
    <h3>Shipping</h3>
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Shipping list</h2>
                <div class="nav navbar-right panel_toolbox">
                    <a href="{{ route('admin.shipping.create') }}">
                        <button class="btn btn-sm btn-success btn-block">
                            <i class="fa fa-plus"></i> Create shipping
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
                        <th>Country</th>
                        <th>Cost</th>
                        <th>isFree</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($shippings as $shipping)
                        <tr>
                            <td>
                                {{ $shipping->getKey() }}
                            </td>
                            <td>
                                {{ $shipping->country }}
                            </td>
                            <td>
                                {{ $shipping->cost }}
                            </td>
                            <td>
                                {{ $shipping->isFree ? 'yes' : 'no'}}
                            </td>
                            <td >
                                <a href="{{ route('admin.shipping.edit', $shipping->getKey()) }}"  class="item-edit"><i
                                            class="fa fa-edit"></i></a>

                                <a href="{{ route('admin.shipping.delete', $shipping->getKey()) }}" class="item-delete" onclick="return confirm('Are you sure you want to delete this item?');"><i
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
