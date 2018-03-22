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
                        data-page="col-2" v-if="isShipping">
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
                <!--<div id="reservation-order" class="reservation-order">-->
                <!--<p>Your order is reserved for-->
                <!--<span id="timer">-->
                <!--00:28-->
                <!--</span>-->
                <!--minutes!-->
                <!--</p>-->
                <!--</div>-->
            </div>
        </div>

        <!--  <keep-alive>
              <component :is="currentComponent"
                         :userAuth="userAuth"
                         :orderId="orderId"
                         :billing="billing"
                         :countries="countries"
                         :states="states"
                         :shipping="shipping"
                         :isSubscribe="isSubscribe"
                         :coupon="coupon"
                         :token="token"
                         @updateCountry="getCountries"
                         @next="nextStep"
                         @back="backStep"
                         @editBilling="editBilling"
              ></component>

          </keep-alive>-->
        <transition name="component-fade" mode="out-in">
            <first v-show="currentComponent == 'first'"
                   :userAuth="userAuth"
                   :countries="countries"
                   :shipping="shipping"
                   :isSubscribe="isSubscribe"
                   :coupon="coupon"
                   @updateCountry="getCountries"
                   @next="nextStep"
            ></first>
        </transition>

        <transition name="component-fade" mode="out-in">
            <second v-show="currentComponent == 'second'"
                    :userAuth="userAuth"
                    :orderId="orderId"
                    :billing="billing"
                    :countries="countries"
                    :shipping="shipping"
                    :coupon="coupon"
                    @updateCountry="getCountries"
                    @next="nextStep"
                    @back="backStep"
                    @editBilling="editBilling"
            ></second>
        </transition>

        <transition name="component-fade" mode="out-in">
            <third v-show="currentComponent == 'third'"
                   :orderId="orderId"
                   :billing="billing"
                   :shipping="shipping"
                   :coupon="coupon"
                   :token="token"
                   @next="nextStep"
                   @back="backStep"
                   @editBilling="editBilling"
            ></third>
        </transition>

    </div>
</template>
<script type="text/babel">

    import first from './steps/first';
    import second from './steps/second';
    import third from './steps/third';
    import fourth from './steps/fourth';
    import {mapGetters} from 'vuex';

    export default ({
        data() {
            return {
                userAuth: false,
                orderId: 0,
                progress: 1,
                countries: [],
                states: [],
                shipping: 0,
                coupon: "",
                currentComponent: "first",
                billing: {}
        }
        },
        props: {
            userAuthProps: String,
            token: String
        },
        components: {
            first,
            second,
            third,
            fourth
        },
        computed: {
            ...mapGetters([
                'isShipping',
                'cartId',
                'isSubscribe'
            ])
        },

        created() {
            this.userAuth = this.userAuthProps;
            //this.getProducts();
            setTimeout(this.getCountries, 500);
            this.$EventBus.$on('login', this.login);
        },
        methods: {
            login(value) {
                this.userAuth = '1';
            },
            nextStep(value) {
                this.currentComponent = !this.isShipping && value.step === 'second' ? 'third' : value.step;
                this.billing = value.billing;
                this.orderId = value.orderId;
                this.progress = !this.isShipping && value.step === 'second' ? this.progress + 2 : this.progress + 1;
            },
            backStep(value) {
                this.currentComponent = !this.isShipping && value.step === 'second' ? 'first' : value.step;
                this.progress = !this.isShipping && value.step === 'second' ? this.progress - 2 : this.progress - 1;
            },
            getCountries() {
                this.countries = require("./components/countries.js");
                if (this.isShipping) {
                    let selectedCountry = (Vue.localStorage.get('shippingCountryName')) ? Vue.localStorage.get('shippingCountryName') : "";
                    axios.get(`/api/countries?country=${selectedCountry}`).then(
                            response => {
                                // this.shipping = this.isShipping ? response.data.shipping : 0;
                                this.shipping = response.data.shipping;
                            },
                            error => console.log('error')
                    )
                }
            },
            editBilling() {
                this.currentComponent = 'first';
                this.progress = 1;
            }
        }
    })

</script>
<style>
    .component-fade-enter-active, .component-fade-leave-active {
        transition: opacity .3s ease;
    }

    .component-fade-enter, .component-fade-leave-to
        /* .component-fade-leave-active до версии 2.1.8 */
    {
        opacity: 0;
    }
</style>
