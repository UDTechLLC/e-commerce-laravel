<template>
    <div>
        <a v-if="!addedToCart" class="btn add-to-cart-btn add-to-cart-btn--mobile" href="#" @click.prevent="addProduct(productSlug)">
            <slot>Add to cart</slot>
        </a>
        <a v-else class="btn add-to-cart-btn add-to-cart-btn--mobile" href="/cart" >
            View cart
        </a>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            addedToCart: false
        }),
        props: {
            productSlug: String
        }
    });
</script>