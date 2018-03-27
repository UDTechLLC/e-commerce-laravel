<template>
    <div class="checkout">
        <billing-block
                :billing="billing"
        ></billing-block>
        <!--<login></login>-->
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
                                 <!--   <div class="paypal-method payment-method-block">
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
                                    </div>-->

                                    <div id="dropin-container"></div>

                                </div>
                            </div>
                            <div class="cart-review-block-wrapper">
                                <cart-totals
                                        :shipping="shipping"
                                        :coupon="coupon"
                                ></cart-totals>
                            </div>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="back-button" @click.prevent="back">
                                Back
                            </a>
                            <a href="#" class="continue-checkout" id="submit-button">
                                Pay
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
    import dropin from 'braintree-web-drop-in';

    export default ({
        data: () => ({
            braintree: ""
        }),
        props: {
            orderId: Number,
            billing: Object,
            shipping: String,
            coupon: String,
            token: String
        },
        components: {
            cartTotals,
            login,
            billingBlock
        },
        mounted() {

           // axios.get('/api/pay/braintree/token').then(
             //       response => {
                        //this.token = response.data.token;

                        var button = document.querySelector('#submit-button');

                        dropin.create({
                            authorization: this.token,
                            container: '#dropin-container',
                            card: {
                                overrides: {
                                    fields: {
                                        number: {
                                            placeholder: '1111 1111 1111 1111' // Update the number field placeholder
                                        }
                                    }
                                }
                            },
                            paypal: {
                                flow: 'vault'
                            }
                        }, (createErr, instance) => {
                            button.addEventListener('click', (e) => {
                                e.preventDefault();
                                instance.requestPaymentMethod((requestPaymentMethodErr, payload) => {

                                    let method = "post";
                                    let path = `/api/pay/braintree/${this.orderId}`;
                                    var form = document.createElement("form");
                                    form.setAttribute("method", method);
                                    form.setAttribute("action", path);

                                    var hiddenField = document.createElement("input");
                                    hiddenField.setAttribute("type", "hidden");
                                    hiddenField.setAttribute("name", 'nonce');
                                    hiddenField.setAttribute("value", payload.nonce);

                                    form.appendChild(hiddenField);

                                    document.body.appendChild(form);
                                    form.submit();
                                });
                            });
                        });
                 //   },
                  //      error => console.log('error')

         //   );


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

<style lang="scss">
    /*--------------------
SHARED VARIABLES
--------------------*/
    $red: #E91E63;
    $blue: #3F51B5;
    $grey: #EAE8E9;
    $grey2: #f3f3f3;
    $white: #FFF;

    /*--------------------
    GENERAL
    --------------------*/

    #cardForm {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /*--------------------
    PANEL FORM
    --------------------*/

    .panel {
        background: $white;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .16), 0 0 2px 0 rgba(0, 0, 0, .12);
    }

    .panel__header {
        background: $blue;
        color: $white;
    }

    .panel__header,
    .panel__footer {
        padding: 1em 2em;
    }

    .panel__footer {
        background: $grey2;
    }

    .panel__content {
        padding: 1em 2em;
        overflow: hidden;
    }

    .textfield--float-label {
        width: 100%;
        float: left;
        display: inline-block;
        padding-right: 5px;
    }

    .hosted-field--label {
        transform: translateY(0.4em);
        font-size: 1.125em;
        line-height: 32px;
        transition: all .15s ease-out;
        display: block;
        width: 100%;
        font-weight: 400;
        overflow: hidden;
        margin-bottom: 0.5em;
    &.label-float {
         text-overflow: ellipsis;
         color: #2196F3;
         transition: all .15s ease-out
     }
    &.filled {
     @extend .label-float;
         color: rgba(0, 0, 0, .54);
     }
    &.invalid {
     @extend .label-float;
         color: #F44336;
     }
    }

    span.icon {
        position: relative;
        top: 0.2em;
        margin-right: 0.2em;
    }

    svg {
        fill: #333;
    }

    .hosted-field {
        height: 32px;
        margin-bottom: 1em;
        display: block;
        background-color: transparent;
        color: rgba(0, 0, 0, .87);
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, .26);
        outline: 0;
        width: 100%;
        font-size: 16px;
        padding: 0;
        box-shadow: none;
        border-radius: 0;
        position: relative;
    }

    .pay-button {
        background: #E91E63;
        color: #fff;
        margin: 0 auto;
        border: 0;
        border-radius: 3px;
        padding: 1em 3em;
        font-size: 1em;
        text-transform: uppercase;
        box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 2px rgba(0, 0, 0, .2);
    }


    /*--------------------
    BT HOSTED FIELDS SPECIFIC
    --------------------*/

    .braintree-hosted-fields-focused {
        border-bottom: 2px solid $blue;
        transition: all 200ms ease;
    }

    .braintree-hosted-fields-invalid {
        border-bottom: 2px solid $red;
        transition: all 200ms ease;
    }


    /*---------------------
    Media Queries
    ----------------------*/

    @media (max-width: 600px) {
        html {
            overflow: auto;
        }
        #cardForm {
            height: auto;
            margin: 2em;
            font-size: 13px;
        }
        .panel {
            width: 100%;
        }
        .textfield--float-label {
            width: 100%;
            float: none;
            display: inline-block;
        }
        .pay-button {
            width: 100%;
        }
    }
</style>