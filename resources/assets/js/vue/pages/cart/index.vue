<template>
    <div>

        <div class="cart-block-wrapper" v-if="countItems > 0">
            <div class="wrapper">
                <form class="cart-form" action="" method="post">
                    <div class="cart-block">
                        <div class="cart-header-block">
                            <h2 class="cart-heading">
                                You Have {{countItems}}
                                <span v-if="countItems == 1">Item</span>
                                <span v-else>Items</span> In Your Cart
                            </h2>
                        </div>
                        <product-list
                                :products="products"
                        ></product-list>
                        <mobile-products-list
                                :products="products"
                        ></mobile-products-list>
                    </div>
                </form>
            </div>
            <div class="cart-bottom-block-wrapper">
                <div class="wrapper">
                    <div class="cart-bottom-block">
                        <shipping
                                v-if="isShipping"
                        ></shipping>

                        <div class="promotional-code-block-wrapper">
                            <div class="cart-header-block">
                                <h2 class="cart-heading">
                                    Have A Promotional Code?
                                </h2>
                            </div>
                            <div class="promotional-code-form-wrapper">
                                <form class="promotional-code-form" action="" name="" method="post">
                                    <div class="promotional-code-form-block">
                                        <input name="coupon_code" class="cart-form-field" :value="coupon"
                                               placeholder="Coupon code"
                                               type="text" @input="updateCoupon"/>
                                        <input class="cart-submit-field promo-code-button" name="apply_coupon"
                                               value="Apply Coupon" type="submit" @click.prevent="submitCoupon"/>
                                    </div>
                                </form>
                                <div class="wrapper coupon-error" v-if="errorCoupon">
                                    Coupon "{{ coupon }}" does not exist!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-bottom-block cart-totals-wrapper">
                        <div class="cart-header-block">
                            <h2 class="cart-heading">
                                Cart totals
                            </h2>
                        </div>
                        <table class="shop-table">
                            <tbody>
                            <tr class="cart-subtotal">
                                <th>
                                    Subtotal
                                </th>
                                <td class="product-subtotal">
                                            <span class="product-subtotal-amount">
                                                ${{ animatedSubTotal }}
                                            </span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal" v-if="discount != '0.00'">
                                <th>
                                    Coupon: {{ coupon }}
                                </th>
                                <td class="product-subtotal">
                                            <span class="product-subtotal-amount">
                                                -${{discount}}
                                            </span>
                                    <a href="#" @click.prevent="deleteCoupon"> [Remove] </a>
                                </td>
                            </tr>

                            <tr class="shipping" v-if="isShipping">
                                <th>
                                    Shipping
                                </th>
                                <td class="">
                                    Flat rate:
                                            <span class="product-flat-rate">
                                                ${{ animatedShipping }}
                                            </span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td class="product-total">
                                            <span class="product-total-amount">
                                                <strong>
                                                    ${{ animatedTotal }}
                                                </strong>
                                            </span>
                                </td>
                            </tr>
                            <tr class="order-total" v-if="isSubscribe">
                                <th>Recurring Totals</th>
                                <td class="product-total">

                                </td>
                            </tr>
                            <tr class="order-total" v-if="isSubscribe">
                                <th>
                                    Subtotal
                                </th>
                                <td class="product-subtotal">
                                    <span class="product-subtotal-amount">
                                        ${{ subscribeInfo.total }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="order-total" v-if="isSubscribe">
                                <th>
                                    Shipping via Flat Rate
                                </th>
                                <td class="product-subtotal">
                                    <span class="product-subtotal-amount">
                                        ${{ animatedShipping }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="order-total" v-if="isSubscribe">
                                <th>
                                    Recurring Total
                                </th>
                                <td class="product-subtotal">
                                    <span class="product-subtotal-amount">
                                        ${{ subscribeTotal }}
                                    </span>
                                    <span class="first-renewal">
                                        First renewal: {{ subscribeInfo.nextPayment }}
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="proceed-to-checkout-button-wrapper">
                            <a class="proceed-to-checkout" href="/checkout">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <empty-cart v-else></empty-cart>
    </div>
</template>
<script type="text/babel">

    import productList from './component/product-list';
    import mobileProductsList from './component/mobile-products-list';
    import shipping from './component/shipping';
    import emptyCart from './component/empty-cart';
    import {mapGetters} from 'vuex'

    export default ({
        data: () => ({
            errorCoupon: false,
            shipping: 0,
            animatedTotal: 0,
            animatedSubTotal: 0,
            animatedShipping: 0
        }),
        components: {
            productList,
            shipping,
            emptyCart,
            mobileProductsList
        },

        computed: {
            ...mapGetters([
                'products',
                'subTotal',
                'countItems',
                'isShipping',
                'isSubscribe',
                'subscribeInfo',
                'discount',
                'coupon'
            ]),
            total() {
                if (!this.isShipping) this.shipping = 0;

                return (Number(this.subTotal) + Number(this.shipping) - Number(this.discount)).toFixed(2);
            },
            subscribeTotal() {
                return (Number(this.subscribeInfo.total) + Number(this.shipping)).toFixed(2);
            }
        },
        watch: {
            total(newValue, oldValue) {
                this.animateSum(newValue, oldValue, 'animatedTotal')
            },
            subTotal(newValue, oldValue) {
                this.animateSum(newValue, oldValue, 'animatedSubTotal')
            },
            shipping(newValue, oldValue) {
                this.animateSum(newValue, oldValue, 'animatedShipping')
            }
        },
        created() {
            //this.getProducts();
            //this.$EventBus.$on('updateProduct', this.updateProducts);
            this.$EventBus.$on('updateShipping', this.updateShipping);
        },
        methods: {
            updateShipping(value) {
                this.shipping = value;
            },
            animateSum(newValue, oldValue, Variable) {
                var vm = this;

                function animate() {
                    if (TWEEN.update()) {
                        requestAnimationFrame(animate)
                    }
                }

                new TWEEN.Tween({tweeningNumber: oldValue})
                        .easing(TWEEN.Easing.Quadratic.Out)
                        .to({tweeningNumber: newValue}, 500)
                        .onUpdate(function () {
                            vm[Variable] = this.tweeningNumber.toFixed(2)
                        })
                        .start();

                animate()
            },
            submitCoupon() {
                let url = `api/carts/coupons`;
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
                let url = `api/carts/coupons/remove?hash=${Vue.localStorage.get('hash')}&code=${this.coupon}`;

                axios.delete(url).then(
                        response => this.$store.commit('updateState', response),
                        error => console.log('error')
                )
            },
            updateCoupon (e) {
                this.$store.commit('updateCoupon', e.target.value)
            }
        }
    })

</script>

<style scoped lang="scss">
    .coupon-error {
        text-align: center;
        color: #D45D5D;
        padding: 15px;
    }
    .first-renewal {
        display: block;
        font-size: 14px;
    }
</style>