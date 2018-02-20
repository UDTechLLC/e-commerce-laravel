<template>
    <div>
        <div class="cart-block-wrapper">
            <div class="wrapper">
                <form class="cart-form" action="" method="post">
                    <div class="cart-block">
                        <div class="cart-header-block">
                            <h2 class="cart-heading">
                                You Have {{countItems}} Items In Your Cart
                            </h2>
                        </div>
                        <product-list
                                :products="products"
                        ></product-list>
                    </div>
                </form>
            </div>
            <div class="cart-bottom-block-wrapper">
                <div class="wrapper">
                    <div class="cart-bottom-block">
                        <shipping
                                v-if="isShipping"
                        ></shipping>

                        <!--<div class="promotional-code-block-wrapper">
                            <div class="cart-header-block">
                                <h2 class="cart-heading">
                                    Have A Promotional Code?
                                </h2>
                            </div>
                            <div class="promotional-code-form-wrapper">
                                <form class="promotional-code-form" action="" name="" method="post">
                                    <div class="promotional-code-form-block">
                                        <input name="coupon_code" class="cart-form-field" value="" placeholder="Coupon code" type="text" />
                                        <input class="cart-submit-field promo-code-button" name="apply_coupon" value="Apply Coupon" type="submit" />
                                    </div>
                                </form>
                            </div>
                        </div>-->
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
                                                ${{ subTotal }}
                                            </span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th>
                                    Shipping
                                </th>
                                <td class="">
                                    Flat rate:
                                            <span class="product-flat-rate">
                                                ${{ shipping }}
                                            </span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td class="product-total">
                                            <span class="product-total-amount">
                                                <strong>
                                                    ${{ total }}
                                                </strong>
                                            </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="proceed-to-checkout-button-wrapper">
                            <a class="proceed-to-checkout" href="#">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">

    import productList from './component/product-list';
    import shipping from './component/shipping';

    export default ({
        data: () => ({
            products: [],
            isShipping: false,
            countItems: 0,
            subTotal: 0,
            shipping: 0,
            total: 0
        }),
        components: {
            productList,
            shipping
        },
        created() {
            this.getProducts();
            this.$EventBus.$on('updateProduct', this.updateProducts);
        },
    })

</script>