<template>
        <div class="cart-review-block">
            <div class="cart-header-block">
                <h2 class="cart-heading">
                    Cart totals
                </h2>
            </div>
            <table class="shop-table">
                <thead>
                <tr>
                    <th class="product-name">
                        Product
                    </th>
                    <th class="product-subtotal">
                        Total
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart-row" v-for="product in products">
                    <td class="product-name">
                        <div class="product-thumbnail">
                            <a href="#">
                                <img :src="product.image"/>
                            </a>
                        </div>
                        <div class="product-info">
                            <a class="product-title" href="#">
                                {{ product.title }} <span>x {{ product.count }}</span>
                            </a>
                        </div>
                    </td>
                    <td class="product-subtotal">
                        <span class="product-subtotal-amount">
                            ${{ product.total_sum }}
                        </span>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="cart-subtotal">
                    <th>
                        Subtotal
                    </th>
                    <td>
                        <span class="product-subtotal-amount">
                            ${{ subTotal }}
                        </span>
                    </td>
                </tr>
                <tr class="shipping">
                    <th>
                        Shipping
                    </th>
                    <td>
                        <span class="product-subtotal-amount">
                            Flat rate: ${{ shipping }}
                        </span>
                    </td>
                </tr>
                <tr class="order-total">
                    <th>
                        Total
                    </th>
                    <td>
                        <span class="product-total-amount">
                            <strong>
                                ${{ total }}
                            </strong>
                        </span>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
</template>
<script type="text/babel">

    export default ({
        props: {
            products: Array,
            subTotal: String,
            total: Number,
            shipping: Number
        }
    })

</script>