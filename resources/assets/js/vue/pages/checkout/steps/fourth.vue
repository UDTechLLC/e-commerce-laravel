<template>
    <div class="checkout checkout-final">
        <billing-block
                :billing="billing"
        ></billing-block>
        <!--<login></login>-->
        <div class="billing-address-info-block-wrapper">
            <div class="wrapper">
                <div class="billing-address-info-block billing-address-edit-block">
                    <div class="cart-header-block">
                        <h2 class="cart-heading">
                            Payment
                        </h2>
                        <!--<a class="edit-block-link" href="#" @click.prevent="back">-->
                            <!--Edit-->
                        <!--</a>-->
                        <div class="clear"></div>
                    </div>
                    <div class="billing-user-info-block">
                        <p>
                            PayPal
                        </p>
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
                                <cart-totals
                                        :shipping="shipping"
                                ></cart-totals>
                            </div>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="back-button" @click.prevent="back">
                                Back
                            </a>
                            <a :href="'/api/pay/'+orderId" class="continue-checkout">
                                Proceed to PayPal
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

        props: {
            orderId: Number,
            billing: Object,
            shipping: Number
        },
        components: {
            cartTotals,
            login,
            billingBlock
        },
        methods: {
            back() {
                let data = {
                    step: 'third',
                    progress: 3,
                };
                this.$emit('back', data);
            }
        }
    })

</script>