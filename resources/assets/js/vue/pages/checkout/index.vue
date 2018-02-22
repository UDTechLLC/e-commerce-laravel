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
                    <li :class="{active: progress == 1, checked: progress > 1}" data-page="col-1">
                        <div class="icon billing-details"></div>
                        <span>2. Billing Details</span></li>
                    <li :class="{disabled: progress < 2, active: progress == 2, checked: progress > 2 }"
                        data-page="col-2">
                        <div class="icon billing-details shipping-address"></div>
                        <span>3. Shipping Address</span></li>
                    <li :class="{disabled: progress < 3, active: progress == 3, checked: progress > 3 }"
                        data-page="order_review">
                        <div class="icon payment"></div>
                        <span>4. Payment</span></li>
                    <li :class="{disabled: progress < 4, active: progress == 4, checked: progress > 4 }"
                        data-page="checkout-process-final">
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
        <keep-alive>
            <component :is="currentComponent"
                       :products="products"
                       :billing="billing"
                       :countries="countries"
                       :states="states"
                       :selectedBillingCountry="selectedBillingCountry"
                       :selectedShippingCountry="selectedShippingCountry"
                       :subTotal="subTotal"
                       :total="total"
                       :shipping="shipping"
                       @updateCountry="updateCountry"
                       @next="nextStep"
                       @back="backStep"
            ></component>
        </keep-alive>
    </div>
</template>
<script type="text/babel">

    import first from './steps/first';
    import second from './steps/second';
    import third from './steps/third';
    import fourth from './steps/fourth';

    export default ({
        data() {
            let countryDefault = (Vue.localStorage.get('shippingCountry')) ? Vue.localStorage.get('shippingCountry') : "";

            return {
                progress: 1,
                selectedCountry: countryDefault,
                selectedBillingCountry: countryDefault,
                selectedShippingCountry: countryDefault,
                countries: [],
                states: [],
                products: this.$EventBus.products,
                subTotal: "0",
                shipping: 0,
                currentComponent: "first",
                billing: {}
            }
        },
        components: {
            first,
            second,
            third,
            fourth
        },
        computed: {
            total() {
                return Math.ceil((( Number(this.subTotal) + Number(this.shipping) ) * 100) / 100);
            }
        },
        created() {
            this.getProducts();
            console.log(this.$EventBus.products);
            this.getCountries();
        },
        methods: {
            nextStep(value) {
                this.currentComponent = value.step;
                this.billing = value.billing;
                this.progress++;
            },
            backStep(value) {
                this.currentComponent = value.step;
                this.progress--;
            },
            getCountries() {
                axios.get(`/api/countries?country=${this.selectedCountry}`).then(
                        response => {
                            this.countries = response.data.countries;
                            this.selectedCountry = response.data.selected;
                            this.states = response.data.states;
                            this.shipping = response.data.shipping;
                            Vue.localStorage.set('shippingCountry', this.selectedCountry);
                        },
                        error => console.log('error')
                )
            },
            updateCountry(value) {
                console.log('aaa');
                this.selectedCountry = value;
                this.getCountries();
            }
        }
    })

</script>