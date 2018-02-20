<template>
    <div class="header-cart-wrapper">
        <a href="/cart" class="header-cart">
            <!-- <span class="header-cart__text">Cart</span>-->
                        <span class="header-cart__text">
                                <span class="flex">
                                    <span class="header-cart__products-count">
                                        {{ countItems }} Item(s)
                                    </span>
                                    <span class="header-cart__delimiter">-</span>
                                    <span class="currency">$</span>
                                    <span class="header-cart__amount">{{ subTotal }}</span>
                                </span>
                            </span>
        </a>
        <ul class="header-cart-items">
            <li class="header-cart-item" v-for="product in products">
                <a :href="'/products/' + product.slug" class="flex flex-a--center flex-j--between">
ev
                                        <span class="header-cart-item__image">
                                            <img :src="product.image" alt="">
                                        </span>

                                <span class="header-cart-item__title-price ">
                                        <span class="header-cart-item__title">
                                           {{ product.title }}
                                        </span>
                                        <span class="flex header-cart-item__count-price">
                                           <span class="header-cart-item__count">{{ product.count }}</span>
                                            <span class="header-cart-item__delimiter">x</span>
                                           <span class="header-cart-item__price flex">
                                               <span class="currency">$</span>
                                               <span>{{ product.total_sum }}</span>
                                           </span>
                                        </span>
                                    </span>
                </a>
            </li>


            <li class="header-cart-items__footer">
                <div class="flex flex-a--center flex-j--between">
                    <a href="/cart" class="header-cart-items__footer-view-cart">View Cart</a>
                    <a href="#" class="header-cart-items__footer-checkout">Checkout</a>
                </div>
            </li>
        </ul>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            products: [],
            countItems: 0,
            subTotal: 0
        }),
        created() {
            this.getProducts();
            this.$EventBus.$on('updateProduct', this.updateProducts);
        }
    });
</script>