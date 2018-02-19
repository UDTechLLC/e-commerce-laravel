<template>
<div>
    <div class="product-button-block">
        <div class="add-to-cart-wrapper">
            <a class="add-to-cart-btn" href="#" @click.prevent="addProduct(productSlug)">
                Add to cart
            </a>
        </div>
    </div>
</div>
</template>
<script type="text/babel">
    export default ({
        props: {
            productSlug: String
        }
    });
</script>