<template>
    <div>
        <div class="sideCartModal__bg"></div>
        <div id="sideCartModal" class="side-cart-screen-block modal right">
            <div class="modal-dialog">
                <div class="side-cart-block-wrapper modal-content">
                    <div class="side-cart-block">
                        <span class="close-cart close" data-dismiss="modal" aria-label="Close"></span>
                        <div class="cart-products-wrapper">
                            <div class="cart-single-product" v-for="product in products">
                                <div class="product-image">
                                    <img :src="product.image"/>
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">
                                        {{ product.title }}
                                    </h3>
                                    <div class="product-price-wrapper">
												<span class="product-price">
													${{ product.amount }}
												</span>
                                        <div class="quantity buttons_added">
                                            <input value="-" class="minus" type="button"
                                                   @click="deleteProduct(product.slug)"/>
                                            <input id="" class="input-text qty text" step="1" min="0" max="" name=""
                                                   :value="product.count" title="Qty" size="4" pattern="[0-9]*"
                                                   inputmode="numeric" type="number"/>
                                            <input value="+" class="plus" type="button"
                                                   @click="addProduct(product.slug)"/>
                                        </div>
                                    </div>
                                    <!-- <div class="deliver-block-wrapper">
                                         <label class="deliver-label">
                                             Deliver:
                                         </label>
                                         <select class="deliver-select">
                                             <option>1 time only</option>
                                         </select>
                                     </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="cart-button-area-wrapper">
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
                            <div class="cart-button-area">
                                <div class="cart-button checkout-button-wrapper">
                                    <a href="/checkout" class="checkout-button">
                                        Checkout
                                    </a>
                                </div>
                                <div class="cart-button keep-shoping-button-wrapper">
                                    <a href="#" data-dismiss="modal" aria-label="Close" class="keep-shoping-button">
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
                            <p class="subscribe-save-wrapper">
                            <span class="label">
                                SUBSCRIBE AND SAVE 15%:
                            </span>
                                <a id="subsSaveMoreInf" href="#" class="subs-save-more-info">
                                    MORE INFO
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import {mapGetters} from 'vuex'

    export default ({
        computed: mapGetters({
            products: 'products',
            subTotal: 'subTotal'
        })
    })
</script>
<style scoped>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
</style>