<template>
    <div>
        <billing-block
                :billing="billing"
        ></billing-block>
        <login></login>
        <div class="checkout-billing-details-block-wrapper">
            <div class="wrapper">
                <div class="checkout-billing-details-block">
                    <form class="checkout-billing-details-form" action="" name="checkout-billing-details" method="post">
                        <div class="checkout-title-block">
                            <h3 class="checkout-title">
                                Payment
                            </h3>
                            <p>
                                All transactions are secure and encrypted.
                            </p>
                        </div>
                        <div class="billing-details-info-wrapper">
                            <div class="contacts-block-wrapper">
                                <div id="payment" class="payment-block-wrapper">
                                    <div class="paypal-method payment-method-block">
                                        <div class="paypal-header-block">
                                            <div class="payment-method-title">
                                                <img src="/web/images/checkout/img-paypal.png"/>
                                            </div>
                                            <div class="icons-label-block">
                                                <img src="/web/images/checkout/paypal-icons.png"/>
                                            </div>
                                        </div>
                                        <div class="paypal-content-block">
                                            <p>
                                                Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-review-block-wrapper">
                                <cart-totals
                                        :products="products"
                                        :subTotal="subTotal"
                                        :total="total"
                                        :shipping="shipping"
                                ></cart-totals>
                            </div>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="back-button" @click.prevent="back">
                                Back
                            </a>
                            <a href="#" class="continue-checkout" @click.prevent="next">
                                Continue
                            </a>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">

    import cartTotals from './../components/cart-totals';
    import login from './../components/login';
    import billingBlock from './../components/billing-block';

    export default ({
        data: () => ({}),
        props: {
            orderId: Number,
            billing: Object,
            products: Array,
            subTotal: String,
            total: String,
            shipping: Number
        },
        components: {
            cartTotals,
            login,
            billingBlock
        },
        methods: {
            next() {
                let data = {
                    step: 'fourth',
                    billing: this.billing,
                    orderId: this.orderId
                };
                this.$emit('next', data);
            },
            back() {
                let data = {
                    step: 'second',
                    progress: 2
                };
                this.$emit('back', data);
            }
        }
    })

</script>