<template>
<div>
    <div class="product-button-block">
        <div class="add-to-cart-wrapper">
            <a v-if="!addedToCart" class="add-to-cart-btn" href="#" @click.prevent="addProduct(productSlug)"
               :data-title="dataTitle" data-target="#sideCartModal">
                Add to cart
            </a>
            <a v-else class="add-to-cart-btn" href="/cart" >
                View cart
            </a>
        </div>
    </div>
</div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
           addedToCart: false
        }),
        props: {
            productSlug: String,
            dataTitle: String
        }
    });
</script>