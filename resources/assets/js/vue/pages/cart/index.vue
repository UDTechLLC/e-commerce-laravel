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
                        <div class="culculate-shiping-block-wrapper">
                            <div class="cart-header-block">
                                <h2 class="cart-heading">
                                    Calculate shipping
                                </h2>
                            </div>
                            <form class="culculate-shiping-form" action="" name="" method="post">
                                <div class="culculate-shiping-form-block">
                                    <div class="cart-form-row">
                                        <div class="shiping-select-wrapper">
                                            <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state">
                                                <option value="">Select a country…</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                            </select>
                                            <div class="select-arrow" style="height: 36px; width: 36px; line-height: 36px;"></div>
                                        </div>
                                    </div>
                                    <div class="cart-form-field-wrapper left-wrapper">
                                        <input class="cart-form-field" value="" placeholder="State / county" name="calc_shipping_state" id="calc_shipping_state" type="text" />
                                    </div>
                                    <div class="cart-form-field-wrapper right-wrapper">
                                        <input class="cart-form-field" value="" placeholder="Postcode / ZIP" name="calc_shipping_postcode" id="calc_shipping_postcode" type="text" />
                                    </div>
                                    <div class="clear"></div>
                                    <p class="shiping-button-wrapper">
                                        <button type="submit" name="calc_shipping" value="1" class="shiping-update-button">Update totals</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                     <!--   <div class="promotional-code-block-wrapper">
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
                                                $17.99
                                            </span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td class="product-total">
                                            <span class="product-total-amount">
                                                <strong>
                                                    $101.99
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

    export default ({
        data: () => ({
            products: [],
            countItems: 0
        }),
        components: {
          productList
        },
        created() {
            this.getProducts();
            this.$EventBus.$on('updateProduct', this.updateProducts);
        },
        computed: {
            subTotal() {
                let subTotal = 0;
                this.products.forEach((value, key) => {
                    subTotal += value.amount
                });

                return subTotal;
            }
        },
    })

</script>