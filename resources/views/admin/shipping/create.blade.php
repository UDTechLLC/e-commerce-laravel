@extends('admin.layouts.app')
@section('content')
    <h2>Shipping create</h2>

    <div class="container">
        <form id="demo-form2" action="{{ route('admin.shipping.store') }}" class="form-horizontal form-label-left" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country<span
                            class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="country" name="country"
                           class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Cost<span
                            class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="cost" name="cost"
                           class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="free">Free shipping<span
                            class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" id="free" name="isFree" value="1"
                           class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success btn-lg">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
