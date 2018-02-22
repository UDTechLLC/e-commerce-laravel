<template>
    <div>
        <login></login>
        <div class="billing-address-info-block-wrapper">
            <div class="wrapper">
                <div class="billing-address-info-block billing-address-edit-block">
                    <div class="cart-header-block">
                        <h2 class="cart-heading">
                            Payment
                        </h2>
                        <a class="edit-block-link" href="#">
                            Edit
                        </a>
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
                                        :products="products"
                                        :subTotal="subTotal"
                                        :total="total"
                                        :shipping="shipping"
                                ></cart-totals>
                            </div>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="back-button">
                                Back
                            </a>
                            <a href="#" class="continue-checkout">
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

    export default ({
        data: () => ({
        }),
        props: {
            products: Array,
            subTotal: String,
            total: Number,
            shipping: Number,
            countries: Array,
            states: Array,
            selectedBillingCountry: String,
        },
        components: {
            cartTotals,
            login
        },
        methods: {

            next() {
                // this.$validator.validateAll().then((result) => {
                //   if (result) {
                let data = {
                    step: 'second'
                };
                this.$emit('next', data);
                return;
                //   }
                // });
            }
        }
    })

</script>