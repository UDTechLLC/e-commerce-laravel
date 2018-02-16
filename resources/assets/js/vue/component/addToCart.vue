<template>
<div>
    <div class="product-button-block">
        <div class="add-to-cart-wrapper">
            <a class="add-to-cart-btn" href="#" @click.prevent="addProduct(productId)">
                Add to cart
            </a>
        </div>
    </div>
</div>
</template>
<script type="text/babel">
    export default ({
        props: {
            productId: String
        }
    });
</script>