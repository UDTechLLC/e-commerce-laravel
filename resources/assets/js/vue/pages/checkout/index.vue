<template>
    <div class="checkout-top-navigation-bar-wrapper">
        <div class="wrapper">
            <div class="checkout-top-navigation-bar">
                <h2 class="checkout-title">
                    Checkout
                </h2>
                <ul class="path-checkout-bar">
                    <li class="checked">
                        <div class="icon shopping-cart"></div>
                        <span>1. Shopping Cart</span></li>
                    <li class="active" data-page="col-1">
                        <div class="icon billing-details"></div>
                        <span>2. Billing Details</span></li>
                    <li class="disabled" data-page="col-2">
                        <div class="icon billing-details shipping-address"></div>
                        <span>3. Shipping Address</span></li>
                    <li class="disabled" data-page="order_review">
                        <div class="icon payment"></div>
                        <span>4. Payment</span></li>
                    <li class="disabled" data-page="checkout-process-final">
                        <div class="icon finish-order"></div>
                        <span>5. Finish Order</span></li>
                </ul>
                <div id="reservation-order" class="reservation-order">
                    <p>Your order is reserved for
                            <span id="timer">
                                    00:28
                                </span>
                        minutes!
                    </p>
                </div>
            </div>
        </div>

        <component :is="currentComponent"
                   :products="products"
                   @next="nextStep"
        ></component>
    </div>
</template>
<script type="text/babel">

    import first from './steps/first';
    import second from './steps/second';

    export default ({
        data: () => ({
            products: [],
            currentComponent: first
        }),
        components: {
            first,
            second
        },
        created() {
            this.getProducts()
        },
        methods: {
            nextStep(componentName) {
                this.currentComponent = componentName
            }
        }
    })

</script>