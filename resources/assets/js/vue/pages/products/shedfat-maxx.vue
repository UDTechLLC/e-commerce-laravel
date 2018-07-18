<template>
    <div>
        <div class="product-price-block product-price-block--radio">

            <div class="price-radio-block">

                <label class="price-radio has-select flex flex-a--center" v-if="!isSubscribe && product.id == 3">
                    <input type="radio" :value="subscribeProduct.slug" v-model="slug" name="product-price" checked>

                    <span class="custom-input"></span>
                    <div class="product-select_subscribe">
                        <div class="flex flex-a--center m-flexSbscr">
                            <div class="product-price">
                                              <span class="product-amount">
                                                ${{ subscribeProduct.amount }}
                                              </span>
                            </div>
                            <span class="product-subscribeText">Subscribe and Save</span>
                        </div>


                        <div class="product-select-wrapper">
                            <div class="product-select-text">Deliver every</div>
                            <div class="product-select">

                                <select v-model="subscribePeriod">
                                    <option v-for="item in subscribePlans" :value="item.value">{{ item.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </label>
                <label class="price-radio has-select  flex flex-a--center">
                    <input type="radio" :value="product.slug" v-model="slug" name="product-price">
                    <span class="custom-input"></span>
                    <div class="product-select_subscribe">

                        <div class="flex flex-a--center m-flexSbscr">
                            <div class="product-price">
                                <span class="product-amount">
                                    ${{ product.amount }}
                                </span>
                            </div>

                            <span class="product-subscribeText">One time purchase</span>

                        </div>

                    </div>
                </label>
            </div>
        </div>

        <div class="product-button-block" v-if="!outOfStock">
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
                       :data-title="getDataTitle"
                    >
                       <span v-if="product.id == 22"> Pre-order</span>
                       <span v-else> Add to cart</span>
                    </a>
                    <a v-else class="add-to-cart-btn" href="/cart">
                        View cart
                    </a>
                </div>
            </div>
        </div>
        <div class="product-button-block" v-else>
            <div class="add-to-cart-wrapper">
                <div class="product-button-block">
                    <div class="add-to-cart-wrapper">
                        <a class="disabled-button-product-page">
                            Sold out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script type="text/babel">
    import moment from 'moment';
    import delivery from './../../component/delivery';
    import {mapGetters} from 'vuex';

    export default ({
        data: () => ({
            slug: "",
            product: {},
            subscribeProduct: {},
            addedToCart: false,
            subscribePeriod: 14,
            subscribePlans: delivery,
        }),
        props: {
            productProps: String,
            subscribeProductProps: String,
            freeShipping: Number,
            dataTitle: String,
            outOfStock: Number
        },
        computed: {
            ...mapGetters([
                'isSubscribe'
            ]),
            subscribeDay() {
                return (this.subscribePeriod == 14) ? 14 : Math.abs(moment().diff(moment().add(this.subscribePeriod, 'months'), 'days'));
            },
            getDataTitle() {
                if (this.slug !== 'shedfat-maxx') {
                    return 'shedfat-maxx-subscription';
                } else {
                    return 'shedfat-maxx';
                }
            },

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

