@extends('web.layouts.app')
@section('content')
<main>
    <div class="main thank-you-page-template">
        <div class="checkout-top-navigation-bar-wrapper">
            <div class="wrapper">
                <div class="checkout-top-navigation-bar">
                    <h2 class="checkout-title">
                        Thank you!
                    </h2>
                    <h4 class="checkout-sub-title">
                        Your order has been received.
                    </h4>
                </div>
            </div>
        </div>
        <div class="tp-order-details-block-wrapper">
            <div class="wrapper">
                <div class="tp-order-details-block">
                    <div class="cart-header-block">
                        <h2 class="cart-heading">
                            Order details
                        </h2>
                    </div>
                    <ul class="order_details">
                        <li class="order">
                            <h4>Order ID</h4>
                            <strong>63419</strong>
                        </li>
                        <li class="date">
                            <h4>Date:</h4>
                            <strong>February 19, 2018</strong>
                        </li>
                        <li class="method">
                            <h4>Payment Method:</h4>
                            <strong>PayPal</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tp-customer-details-block-wrapper">
            <div class="wrapper">
                <div class="tp-customer-details-block">
                    <div class="cart-header-block">
                        <h2 class="cart-heading">
                            Customer details
                        </h2>
                    </div>
                    <div class="tp-customer-details-info">
                        <div class="cd-contacts">
                            <dl class="customer_details">
                                <h3>Contacts</h3>
                                <dt>Name:</dt>
                                <dd>Michael Nic </dd>
                                <br>
                                <dt>Email:</dt>
                                <dd>nika.free.dev@gmail.com </dd>
                                <br>
                                <dt>Telephone:</dt>
                                <dd>1111111</dd>
                            </dl>
                        </div>
                        <div class="cd-billing-details">
                            <h3>Billing address</h3>
                            <address>
                                <p>
                                    Home
                                    <br>
                                    Західний підземний перехід
                                    <br>
                                    Київ
                                    <br>
                                    місто Київ
                                    <br>
                                    02000
                                    <br>
                                    Ukraine
                                </p>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-billing-details-block-wrapper">
            <div class="wrapper">
                <div class="checkout-billing-details-block">
                    <form class="checkout-billing-details-form" action="" name="checkout-billing-details" method="post">
                        <div class="billing-details-info-wrapper finish-order-step">
                            <div class="cart-review-block-wrapper finish-order-step">
                                <div class="cart-review-block">
                                    <div class="cart-header-block">
                                        <h2 class="cart-heading">
                                            Product details
                                        </h2>
                                    </div>
                                    <table class="shop-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">
                                                Product
                                            </th>
                                            <th class="product-quantity">
                                                Quantity
                                            </th>
                                            <th class="product-subtotal">
                                                Total
                                            </th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr class="cart-subtotal">
                                            <td></td>
                                            <th>
                                                Subtotal:
                                            </th>
                                            <td>
                                                                                        <span class="product-subtotal-amount">
                                                                                            $84.00
                                                                                        </span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td></td>
                                            <th>
                                                Shipping:
                                            </th>
                                            <td>
                                                                                        <span class="product-subtotal-amount">
                                                                                                $17.99 via Flat Rate
                                                                                        </span>
                                            </td>
                                        </tr>
                                        <tr class="order-payment-method">
                                            <td></td>
                                            <th>
                                                Payment method:
                                            </th>
                                            <td>
                                                PayPal
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td></td>
                                            <th>
                                                Total:
                                            </th>
                                            <td>
                                                                                        <span class="product-total-amount">
                                                                                            <strong>
                                                                                                $101.99
                                                                                            </strong>
                                                                                        </span>
                                            </td>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr class="cart-row">
                                            <td class="product-name">
                                                <div class="product-thumbnail">
                                                    <a href="#">
                                                        <img src="{{asset('web/images/product_preview/maxx_icon.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a class="product-title" href="#">
                                                        Shedfat Maxx
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="product-quantity">
                                                1
                                            </td>
                                            <td class="product-subtotal">
                                                                                            <span class="product-subtotal-amount">
                                                                                                $34.00
                                                                                            </span>
                                            </td>
                                        </tr>
                                        <tr class="cart-row">
                                            <td class="product-name">
                                                <div class="product-thumbnail">
                                                    <a href="#">
                                                        <img src="{{asset('web/images/product_preview/12_week_custom_meal_plan_shop_preview.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a class="product-title" href="#">
                                                        12 Week Custom Meal Plan
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="product-quantity">
                                                1
                                            </td>
                                            <td class="product-subtotal">
                                                                                            <span class="product-subtotal-amount">
                                                                                                $50.00
                                                                                            </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="continue-checkout">
                                CONTINUE shopping
                            </a>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection