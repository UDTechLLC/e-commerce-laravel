<template>
    <div class="cart-wrapper">
        <table class="shop-table">
            <thead>
            <tr>
                <th class="product-name">
                    Product
                </th>
                <th class="product-price">
                    Price
                </th>
                <th class="product-quantity">
                    Quantity
                </th>
                <th class="product-subtotal">
                    Total
                </th>
                <th class="product-remove">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="cart-row" v-for="product in products">
                <td class="product-name">
                    <div class="product-thumbnail">
                        <a href="#">
                            <img :src="product.image" />
                        </a>
                    </div>
                    <div class="product-info">
                        <a class="product-title" href="#">
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
                        <input value="-" class="minus" type="button" @click="deleteProduct" />
                        <input id="" class="input-text qty text" step="1" min="0" max="" name="" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number" />
                        <input value="+" class="plus" type="button" @click="addProduct" />
                    </div>
                </td>
                <td class="product-subtotal">
                                                <span class="product-subtotal-amount">
                                                    $34.00
                                                </span>
                </td>
                <td class="product-remove">
                    <a href="#" class="remove" aria-label="Remove this item" @click.prevent="deleteAllProduct">
                        ×
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script type="text/babel">
    export default ({
       data: () => ({

       }),
        props: {
            products: Array
        },
        methods: {
            deleteProduct() {
                console.log('delete product')
            },
            deleteAllProduct() {
                axios.delete(`/api/carts/products/remove/12week-custom-training-plan?hash=${Vue.localStorage.get('hash')}`).then(
                        response => {
                            console.log('delete');
                            this.$EventBus.$emit('updateProduct', this.clickHandler);
                        },
                        error => console.log('error')

                )
            }
        }
    });
</script>