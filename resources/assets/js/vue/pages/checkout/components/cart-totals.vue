<template>
    <div class="cart-review-block">
        <div class="cart-header-block">
            <h2 class="cart-heading">
                Cart totals
            </h2>
        </div>
        <table class="shop-table">
            <thead>
            <tr>
                <th class="product-name">
                    Product
                </th>
                <th class="product-subtotal">
                    Total
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="cart-row" v-for="product in products">
                <td class="product-name">
                    <div class="product-thumbnail">
                        <a href="#">
                            <img :src="product.image"/>
                        </a>
                    </div>
                    <div class="product-info">
                        <a class="product-title" href="#">
                            {{ product.title }} <span>x {{ product.count }}</span>
                        </a>
                    </div>
                </td>
                <td class="product-subtotal">
                    <span v-if="product.discount_amount != '0.00'">
                        <del>${{product.total_sum}}</del>
                        <span class="product-subtotal-amount"> ${{ product.total_sum_with_discount }} </span>
                    </span>
                     <span v-else class="product-amount">
                          ${{ product.total_sum_with_discount }}
                     </span>
                </td>

            </tr>

            </tbody>
            <tfoot>
            <tr class="cart-subtotal">
                <th>
                    Subtotal
                </th>
                <td>
                        <span class="product-subtotal-amount">
                            ${{ subTotal }}
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
                </td>
            </tr>
            <tr class="shipping" v-if="isShipping">
                <th>
                    Shipping
                </th>
                <td>
                        <span class="product-subtotal-amount">
                            Flat rate: ${{ shipping }}
                        </span>
                </td>
            </tr>
            <tr class="order-total">
                <th>
                    Total
                </th>
                <td>
                        <span class="product-total-amount">
                            <strong>
                                ${{ total }}
                            </strong>
                        </span>
                </td>
            </tr>
            <tr class="recurring-totals" v-if="isSubscribe">
                <th colspan="2">Recurring Totals</th>
            </tr>
            <tr class="cart-subtotal recurring-total" v-if="isSubscribe">
                <th rowspan="1">Subtotal</th>
                <td data-title="Subtotal">
                    <span>&#036;</span><span>{{ subscribeInfo.total }}</span></td>
            </tr>

            <tr class="shipping recurring-total 2018_06_15_monthly" v-if="isSubscribe">
                <th>Shipping via Flat Rate</th>
                <td data-title="Shipping via Flat Rate">
                    <span>&#036;</span><span>{{ shipping }}</span>																											</td>
            </tr>

            <tr class="order-total recurring-total" v-if="isSubscribe">
                <th rowspan="1">Recurring Total</th>
                <td data-title="Recurring Total">
                    <strong>
                        <span>&#036;</span><span>{{ subscribeTotal }}</span>
                    </strong>
                    <div class="first-payment-date">
                        <small>First renewal: {{ subscribeInfo.nextPayment }}</small>
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</template>
<script type="text/babel">
    import {mapGetters} from 'vuex'

    export default ({
        props: {
            shipping: String
        },
        computed: {
            ...mapGetters([
                'products',
                'subTotal',
                'discount',
                'isShipping',
                'isSubscribe',
                'subscribeInfo',
                'coupon'
            ]),
            total() {
                return (Number(this.subTotal) + Number(this.shipping) - Number(this.discount)).toFixed(2);
            },
            subscribeTotal() {
                return (Number(this.subscribeInfo.total) + Number(this.shipping)).toFixed(2);
            }
        }
    })

</script>