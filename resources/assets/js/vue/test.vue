<template>
    <ul>
        <li v-for="product in products">
            {{ product.title }} - {{ product.amount}}
            <br>
            <button>
                Add to cart
            </button>
        </li>
    </ul>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        computed: mapGetters({
            products: 'products'
        })
    }
</script>