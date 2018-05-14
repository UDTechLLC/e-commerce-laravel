@extends('admin.layouts.app')
@section('content')
    <h2>Shipping edit</h2>

    <div class="container">
        <form id="demo-form2" action="{{ route('admin.shipping.update', $shipping->getKey()) }}" class="form-horizontal form-label-left" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <h3 class="text-center">Country {{ $shipping->country }}</h3>
            <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Cost<span
                            class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="cost" name="cost" value="{{ old('cost', $shipping->cost) }}"
                           class="form-control col-md-7 col-xs-12">
                </div>
                @if ($errors->has('cost'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cost') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="free">Free shipping<span
                            class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" id="free" name="isFree" value="1" @if($shipping->isFree) checked @endif />
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
