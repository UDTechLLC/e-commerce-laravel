<template>
    <tr class="cart-row">
        <td class="product-name">
            <div class="product-thumbnail">
                <a :href="'/products/' + product.slug">
                    <img :src="product.image"/>
                </a>
            </div>
            <div class="product-info">
                <a class="product-title" :href="'/products/' + product.slug">
                    {{ product.title }}
                </a>
            </div>
        </td>
        <td class="product-price">
                     <span class="product-amount">
                          ${{product.amount}}
                     </span>
        </td>
        <td class="product-quantity">
            <div class="quantity buttons_added">
                <input value="-" class="minus" type="button" @click="deleteProduct(product.slug)"/>
                <input id="" class="input-text qty text" step="1" min="0" max="" name="" :value="product.count"
                       title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number"/>
                <input value="+" class="plus" type="button" @click="addProduct(product.slug)"/>
            </div>
        </td>
        <td class="product-subtotal">
                     <span class="product-subtotal-amount">
                           {{ product.total_sum }}
                     </span>
        </td>
        <td class="product-remove">
            <a href="#" class="remove" aria-label="Remove this item" @click.prevent="deleteAllProduct(product.slug)">
                ×
            </a>
        </td>
    </tr>
</template>

<script type="text/babel">
    export default ({
        props: {
            product: Object
        },
        methods: {
            deleteProduct(slug) {
                axios.delete(`/api/carts/products/remove/${slug}?hash=${Vue.localStorage.get('hash')}`).then(
                        response => {
                            console.log(response);
                            this.$EventBus.$emit('updateProduct', response);
                        },
                        error => console.log('error')
                )
            },
            deleteAllProduct(slug) {
                axios.delete(`/api/carts/products/remove/${slug}/all?hash=${Vue.localStorage.get('hash')}`).then(
                        response => {
                            console.log(response);
                            this.$EventBus.$emit('updateProduct', response);
                        },
                        error => console.log('error')
                )
            }
        }
    });
</script>