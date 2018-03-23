@extends('web.layouts.app')
@section('content')
    <main>
        <div class="main">
            <div class="billing-address-info-block-wrapper">
                <div class="wrapper">
                    <div class="billing-address-info-block" style="background: #FFE8E8; text-align: center;">
                        <div class="cart-header-block">
                            <h2 class="cart-heading" style="font-size: 1.3em; color: #CE4747;">
                                {{ $message }}
                            </h2>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
