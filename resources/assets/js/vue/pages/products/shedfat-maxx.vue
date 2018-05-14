<template>
    <div>
        <div class="product-price-block product-price-block--radio">

            <div class="price-radio-block">

                <label class="price-radio flex flex-a--center">
                    <input type="radio" :value="product.slug" v-model="slug" name="product-price" checked
                           @change="showDelivery = !showDelivery">
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
                    <input type="radio" :value="subscribeProduct.slug" name="product-price" v-model="slug"
                           @change="showDelivery = !showDelivery">
                    <span class="custom-input"></span>
                                    <span>
                                    <!--<span class="old-price">-->
                                        <!--<span class="currency">$</span>-->
                                        <!--<span>{{ subscribeProduct.old_amount }}</span>-->
                                        <!--</span>-->
                                    <span class="product-amount">
                                        <span class="currency">$</span>
                                        <span>{{ subscribeProduct.amount }}</span>
                                    </span>
                                </span>

                                    <span class="price-radio-block__desc">
                                        I want auto-shipping for every 30 days.
                                </span>
                </label>
                <div class="deliver-block-wrapper" v-if="showDelivery">
                    <label class="deliver-label">
                        Deliver:
                    </label>
                    <select class="deliver-select" v-model="subscribePeriod">
                        <option v-for="item in subscribePlans" :value="item.value">{{ item.name }}</option>
                    </select>
                </div>

            </div>

        </div>
        <div class="product-button-block">
            <div v-if="freeShipping">
                <img width="95px" src="/web/images/delivery.svg" alt="delivery">
            </div>
            <div class="flex flex-a--center wrapper-btns-buy-count">
                <!--<div class="btn-wrapper-product-count flex flex-a&#45;&#45;center">
                    <button class="btn">-</button>
                    <input type="number" class="product-count" value="1">
                    <button class="btn">+</button>
                </div>-->

                        <div class="add-to-cart-wrapper">
                            <a v-if="!addedToCart" class="add-to-cart-btn" href="#" @click.prevent="addProduct"
                               >
                                    Add to cart
                            </a>
                            <a v-else class="add-to-cart-btn" href="/cart" >
                                View cart
                            </a>
                        </div>

            </div>

        </div>
    </div>
</template>

<script type="text/babel">
    import moment from 'moment';

    export default ({
        data: () => ({
            slug: "",
            product: {},
            subscribeProduct: {},
            addedToCart: false,
            showDelivery: false,
            subscribePeriod: 14,
            subscribePlans: [
                {
                    name: "2 weeks",
                    value: 14
                },
                {
                    name: "month (most common)",
                    value: 1
                },
                {
                    name: "2 month",
                    value: 2
                },
                {
                    name: "3 months",
                    value: 3
                }
            ]
        }),
        props: {
            productProps: String,
            subscribeProductProps: String,
            freeShipping: Number
        },
        computed: {
            subscribeDay() {
                return (this.subscribePeriod == 14 ) ? 14 : Math.abs(moment().diff(moment().add(this.subscribePeriod, 'months'), 'days'));
            }
        },
        created() {
            this.product = JSON.parse(this.productProps);
            this.slug = this.product.slug;
            this.subscribeProduct = JSON.parse(this.subscribeProductProps)
        },
        methods: {
            addProduct() {
                this.addedToCart = true;
                let data = {
                    hash: Vue.localStorage.get('hash'),
                    subscribePeriod: this.subscribeDay
                };
                axios.post(`/api/carts/products/add/${this.slug}`, data).then(
                        response => {
                            this.$store.commit('updateState', response);
                        },
                        error => console.log('error')
                );
            }
        }
    })
</script>
<style>
    .top-product-description-block .product-button-block .add-to-cart-wrapper {
        margin-top: 10px;
    }
</style>
