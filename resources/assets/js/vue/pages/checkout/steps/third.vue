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

                                    <!--dsads-->
                                    <form id="cardForm">
                                        <div class="panel">
                                            <header class="panel__header">
                                                <h1>Card Payment</h1>
                                            </header>
                                            <div class="panel__content">
                                                <div class="textfield--float-label">
                                                    <!-- Begin hosted fields section -->
                                                    <label class="hosted-field--label" for="card-number"><span class="icon">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg></span> Card Number
                                                    </label>
                                                    <div id="card-number" class="hosted-field"></div>
                                                    <!-- End hosted fields section -->
                                                </div>
                                                <div class="textfield--float-label">
                                                    <!-- Begin hosted fields section -->
                                                    <label class="hosted-field--label" for="expiration-date">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
         </span>
                                                        Expiration Date</label>
                                                    <div id="expiration-date" class="hosted-field"></div>
                                                    <!-- End hosted fields section -->
                                                </div>
                                                <div class="textfield--float-label">
                                                    <!-- Begin hosted fields section -->
                                                    <label class="hosted-field--label" for="cvv">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
            </span>
                                                        CVV</label>
                                                    <div id="cvv" class="hosted-field"></div>
                                                    <!-- End hosted fields section -->
                                                </div>

                                            </div>
                                            <footer class="panel__footer">
                                                <button class="pay-button">Pay</button>
                                            </footer>
                                        </div>
                                    </form>
                                    <!--endass-->


                                </div>
                            </div>
                            <div class="cart-review-block-wrapper">
                                <cart-totals
                                        :products="products"
                                        :subTotal="subTotal"
                                        :total="total"
                                        :shipping="shipping"
                                        :isShipping="isShipping"
                                        :discount="discount"
                                        :coupon="coupon"
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
        data: () => ({
            token: ""
        }),
        props: {
            orderId: Number,
            billing: Object,
            products: Array,
            subTotal: String,
            total: String,
            shipping: Number,
            isShipping: Boolean,
            discount: String,
            coupon: String
        },
        components: {
            cartTotals,
            login,
            billingBlock
        },
        created() {

            axios.get('/api/pay/braintree/token').then(
                    response => {
                        this.token = response.data.token;

                        braintree.client.create({
                            authorization: this.token
                        }, (err, clientInstance) => {
                            if (err) {
                                console.error(err);
                                return;
                            }

                            braintree.hostedFields.create({
                                client: clientInstance,
                                styles: {
                                    'input': {
                                        'font-size': '16px',
                                        'font-family': 'roboto, verdana, sans-serif',
                                        'font-weight': 'lighter',
                                        'color': 'black'
                                    },
                                    ':focus': {
                                        'color': 'black'
                                    },
                                    '.valid': {
                                        'color': 'black'
                                    },
                                    '.invalid': {
                                        'color': 'black'
                                    }
                                },
                                fields: {
                                    number: {
                                        selector: '#card-number',
                                        placeholder: '1111 1111 1111 1111'
                                    },
                                    cvv: {
                                        selector: '#cvv',
                                        placeholder: '111'
                                    },
                                    expirationDate: {
                                        selector: '#expiration-date',
                                        placeholder: 'MM/YY'
                                    }
                                }
                            }, (err, hostedFieldsInstance) => {
                                if (err) {
                                    console.error(err);
                                    return;
                                }

                                function findLabel(field) {
                                    return $('.hosted-field--label[for="' + field.container.id + '"]');
                                }

                                hostedFieldsInstance.on('focus', function (event) {
                                    var field = event.fields[event.emittedBy];

                                    findLabel(field).addClass('label-float').removeClass('filled');
                                });

                                // Emulates floating label pattern
                                hostedFieldsInstance.on('blur', function (event) {
                                    var field = event.fields[event.emittedBy];
                                    var label = findLabel(field);

                                    if (field.isEmpty) {
                                        label.removeClass('label-float');
                                    } else if (field.isValid) {
                                        label.addClass('filled');
                                    } else {
                                        label.addClass('invalid');
                                    }
                                });

                                hostedFieldsInstance.on('empty', function (event) {
                                    var field = event.fields[event.emittedBy];

                                    findLabel(field).removeClass('filled').removeClass('invalid');
                                });

                                hostedFieldsInstance.on('validityChange', function (event) {
                                    var field = event.fields[event.emittedBy];
                                    var label = findLabel(field);

                                    if (field.isPotentiallyValid) {
                                        label.removeClass('invalid');
                                    } else {
                                        label.addClass('invalid');
                                    }
                                });

                                $('#cardForm').submit( (event) => {
                                    event.preventDefault();

                                    hostedFieldsInstance.tokenize( (err, payload) => {
                                        if (err) {
                                            console.error(err);
                                            return;
                                        }

                                        // This is where you would submit payload.nonce to your server
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
                        });
                    },
                        error => console.log('error')

            );


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