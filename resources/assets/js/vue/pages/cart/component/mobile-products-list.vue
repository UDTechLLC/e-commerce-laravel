<template>
    <div class="side-cart-block-wrapper">
        <div class="side-cart-block">
            <span class="close-cart close" data-dismiss="modal" aria-label="Close"></span>
            <div class="cart-products-wrapper">
                <mobile-product
                        v-for="product in products"
                        :key="product.id"
                        :product="product"
                ></mobile-product>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import mobileProduct from './mobile-product'
    export default ({
        props: {
            products: Array
        },
        components: {
            mobileProduct
        }
    });
</script>
