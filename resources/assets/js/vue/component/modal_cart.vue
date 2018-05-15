<template>
    <div>
        <div class="sideCartModal__bg"></div>
        <div id="sideCartModal" class="side-cart-screen-block modal right">
            <div class="modal-dialog">
                <div class="side-cart-block-wrapper modal-content">
                    <div class="side-cart-block">
                        <span class="close-cart close" data-dismiss="modal" aria-label="Close"></span>
                        <div class="cart-products-wrapper">
                            <modal-cart-product v-for="product in products" :key="product.id"
                                :product="product"
                            ></modal-cart-product>
                        </div>
                        <div class="cart-button-area-wrapper">
                            <div class="cart-coupon-block-wrapper">
                                <h4 class="cart-coupon-title">
                                    Have A Promotional Code?
                                </h4>
                                <div class="cart-coupon-block">
                                    <form class="cart-coupon-form">
                                        <input class="cart-coupon-field" :class="{'coupon-input-error': errorCoupon}"
                                               type="text" @input="updateCoupon" :value="coupon"
                                               placeholder="Coupon code"/>
                                        <input class="cart-coupon-submit" type="submit" @click.prevent="submitCoupon"
                                               value="Apply coupon"/>
                                    </form>
                                    <div class="wrapper coupon-error" v-if="errorCoupon">
                                        Coupon "{{ coupon }}" does not exist!
                                    </div>
                                </div>
                            </div>
                            <div class="cart-sub-totals-block-wrapper">
                                <div class="cart-sub-totals-block">
											<span class="sub-total-label">
												Subtotal:
											</span>
                                    <span class="sub-total-amount">
												${{ subTotal }}
								</span>
                                </div>
                                <a href="/cart" class="view-cart-link">
                                    View cart
                                </a>
                            </div>
                            <div class="cart-sub-totals-block-wrapper" v-if="discount != '0.00'">
                                <div class="cart-sub-totals-block">
								<span class="sub-total-label">
									Coupon: {{ coupon }}:
								</span>
								<span class="sub-total-amount">
									-${{ discount }}
									<a href="#" class="remove_link" @click.prevent="deleteCoupon">
										[Remove]
									</a>
								</span>
                                </div>
                            </div>
                            <div class="cart-sub-totals-block-wrapper" v-if="isShipping">
                                <div class="cart-sub-totals-block">
								<span class="sub-total-label">
									Shipping
								</span>
								<span class="sub-total-text">
									Flate rate: ${{ shipping }}
								</span>
                                </div>
                            </div>
                            <div class="cart-sub-totals-block-wrapper">
                                <div class="cart-sub-totals-block">
								<span class="sub-total-label">
									Total:
								</span>
								<span class="sub-total-amount">
									${{ total }}
								</span>
                                </div>
                            </div>
                            <div class="cart-button-area">
                                <div class="cart-button checkout-button-wrapper">
                                    <a href="/checkout" class="checkout-button">
                                        Checkout
                                    </a>
                                </div>
                                <div class="cart-button keep-shoping-button-wrapper">
                                    <a href="/shop" class="keep-shoping-button">
                                        Keep Shoping
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="side-cart-footer-wrapper">
                            <p class="secure-shoping-wrapper">
                            <span class="label">
                                SECURE SHOPPING:
                            </span>
                                100% INDUSTRY STANDARD SSL
                            </p>
                            <!--                           <p class="subscribe-save-wrapper">
                                                       <span class="label">
                                                           SUBSCRIBE AND SAVE 15%:
                                                       </span>
                                                           <a id="subsSaveMoreInf" href="#" class="subs-save-more-info">
                                                               MORE INFO
                                                           </a>
                                                       </p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import {mapGetters} from 'vuex'
    import modalCartProduct from './modal-cart-product'

    export default ({
        data: () => ({
            shipping: 0,
            errorCoupon: false,
            selectedCountry: (Vue.localStorage.get('shippingCountryName')) ? Vue.localStorage.get('shippingCountryName') : ""
        }),
        components: {
            modalCartProduct
        },
        computed: {
            ...mapGetters([
                'products',
                'subTotal',
                'countItems',
                'isShipping',
                'discount',
                'coupon'
            ]),
            total() {
                return (Number(this.subTotal) + Number(this.shipping) - Number(this.discount)).toFixed(2);
            },
        },
        updated() {
            if (this.isShipping && this.shipping == 0) this.getShipping()
        },
        methods: {
            submitCoupon() {

                let url = `/api/carts/coupons`;
                let data = {
                    hash: Vue.localStorage.get('hash'),
                    code: this.coupon
                };

                axios.post(url, data).then(
                        response => {
                            // this.$EventBus.$emit('updateProduct', response);
                            this.$store.commit('updateState', response);
                            this.errorCoupon = false;
                        },
                        error => this.errorCoupon = true
                )
            },
            deleteCoupon() {
                let url = `/api/carts/coupons/remove?hash=${Vue.localStorage.get('hash')}&code=${this.coupon}`;

                axios.delete(url).then(
                        response => this.$store.commit('updateState', response),
                        error => console.log('error')
                )
            },
            updateCoupon (e) {
                this.$store.commit('updateCoupon', e.target.value)
            },
            getShipping() {
                axios.get(`/api/countries?country=${this.selectedCountry}`).then(
                        response => {
                            //this.countries = response.data.countries;
                            this.selectedCountry = response.data.selected;
                            // this.states = response.data.states;
                            this.shipping = response.data.shipping;
                        },
                        error => console.log('error')
                )
            }
        }
    })
</script>
<style scoped>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }

    .coupon-error {
        color: red;
    }

    .coupon-input-error {
        border: 1px solid red !important;
    }
</style>
