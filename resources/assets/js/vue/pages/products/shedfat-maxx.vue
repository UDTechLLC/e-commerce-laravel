<template>
    <div>
        <div class="product-price-block product-price-block--radio">

            <div class="price-radio-block">

                <label class="price-radio flex flex-a--center">
                    <input type="radio" :value="product.slug" v-model="slug" name="product-price" checked>
                    <span class="custom-input"></span>
                                    <span class="product-amount">
                                        <span class="currency">$</span>
                                        <span>{{ product.amount }}</span>
                                    </span>

                                    <span class="price-radio-block__desc">
                                        I want to make a one-time purchase.
                                    </span>

                </label>
                <label class="price-radio flex flex-a--center">
                    <input type="radio" :value="subscribeProduct.slug" name="product-price" v-model="slug">
                    <span class="custom-input"></span>
                                    <span>
                                    <span class="old-price">
                                        <span class="currency">$</span>
                                        <span>{{ subscribeProduct.old_amount }}</span>
                                    </span>
                                    <span class="product-amount">
                                        <span class="currency">$</span>
                                        <span>{{ subscribeProduct.amount }}</span>
                                    </span>
                                </span>

                                    <span class="price-radio-block__desc">
                                        I want auto-shipping for every 30 days.
                                </span>
                </label>
            </div>

        </div>
        <div class="product-button-block">
            <div class="flex flex-a--center wrapper-btns-buy-count">
                <!--<div class="btn-wrapper-product-count flex flex-a&#45;&#45;center">
                    <button class="btn">-</button>
                    <input type="number" class="product-count" value="1">
                    <button class="btn">+</button>
                </div>-->

                <div class="add-to-cart-wrapper">
                    <add-to-cart
                            :product-slug="slug"
                    >
                    </add-to-cart>
                </div>
            </div>

        </div>
    </div>
</template>

<script type="text/babel">
    export default ({
        data: () => ({
            slug: "",
            product: {},
            subscribeProduct: {}
        }),
        props: {
            productProps: String,
            subscribeProductProps: String
        },
        created() {
            this.product = JSON.parse(this.productProps);
            this.slug = this.product.slug;
            this.subscribeProduct = JSON.parse(this.subscribeProductProps)
        }
    })
</script>