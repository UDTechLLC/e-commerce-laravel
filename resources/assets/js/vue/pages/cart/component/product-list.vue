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
                <th class="product-deliver">
                    Deliver
                </th>
                <th class="product-subtotal">
                    Total
                </th>
                <th class="product-remove">

                </th>
            </tr>
            </thead>
            <tbody>
            <product-item v-for="product in products"
                          :key="product.id"
                          :product="product"
            ></product-item>
            </tbody>
        </table>
    </div>
</template>

<script type="text/babel">

    import productItem from './product';

    export default ({
        props: {
            products: Array
        },
        components: {
            productItem
        }
    });
</script>