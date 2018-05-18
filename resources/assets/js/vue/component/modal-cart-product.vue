<template>
    <div class="cart-single-product">
        <div class="product-image">
            <img :src="product.image"/>
        </div>
        <div class="product-details">
            <h3 class="product-title">
                {{ product.title }}
            </h3>
            <div class="product-price-wrapper">
                <span class="product-price">
                    ${{ product.amount }}
                </span>
                <div class="quantity buttons_added" v-if="!product.subscribe">
                    <input value="-" class="minus" type="button"
                           @click="deleteProduct(product.slug)"/>
                    <input id="" class="input-text qty text" step="1" min="0" max="" name=""
                           :value="product.count" title="Qty" size="4" pattern="[0-9]*"
                           inputmode="numeric" type="number"/>
                    <input value="+" class="plus" type="button"
                           @click="addProduct(product.slug)"/>
                </div>
            </div>
            <!--<div class="deliver-block-wrapper" v-if="product.subscribe">
                <label class="deliver-label">
                    Deliver:
                </label>
                <select class="deliver-select" v-model="subscribePeriod">
                    <option v-for="item in subscribePlans" :value="item.value">{{ item.name }}</option>
                </select>
            </div>-->
            <div class="deliver-block-wrapper" v-if="product.subscribe">
                <label class="deliver-label">
                    Deliver :
                </label>
                <select name="" @change="updatePlan" v-model="subscribePeriod">
                    <option v-for="item in subscribePlans" :value="item.value">{{ item.name }}</option>
                </select>
                <!--<select class="deliver-select">
                    <option>1 time only</option>
                </select>-->
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import delivery from './delivery'
    import moment from 'moment'

    export default ({
        data:() => ({
            subscribePlans: delivery,
            subscribePeriod: 0
        }),
        props: {
            product: Object
        },
        computed: {
            subscribeDay() {
                return (this.subscribePeriod == 14 ) ? 14 : Math.abs(moment().diff(moment().add(this.subscribePeriod, 'months'), 'days'));
            }
        },
        created() {
            this.subscribePeriod = this.product.subscribe_period;
        },
        methods: {
            updatePlan() {
                this.$store.dispatch('updatePlan', [this.product.slug, this.subscribeDay]);
            }
        }
    })
</script>
<style scoped>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
</style>