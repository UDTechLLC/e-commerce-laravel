<template>
<div>
    <div class="product-button-block">
        <div class="add-to-cart-wrapper">
            <a v-if="!addedToCart" class="add-to-cart-btn" href="#" @click.prevent="addProductTest(productSlug, productBundleSlug)"
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
    import  mapActions from 'vuex'

    export default ({
        data: () => ({
           addedToCart: false
        }),
        props: {
            productSlug: String,
            dataTitle: String,
            productBundleSlug: String
        },
        methods: {
            addProductTest(productSlug, productBundleSlug = null) {

                console.log('test');
                this.$store.dispatch('test', this.productSlug);
                /*let data = {
                    hash: Vue.localStorage.get('hash')
                };
                axios.post(`/api/carts/products/add/${productSlug}`, data).then(
                        response => {
                            this.$EventBus.$emit('updateProduct', response);
                            this.addedToCart = true;
                        },
                        error => console.log('error')
                );

                if (productBundleSlug != null) {
                    axios.post(`/api/carts/products/add/${productBundleSlug}`, data).then(
                            response => {
                                this.$EventBus.$emit('updateProduct', response);
                                this.addedToCart = true;
                            },
                            error => console.log('error')
                    )
                }*/
            },
        }
    });
</script>