<template>
    <tr class="cart-row">
        <td class="product-name">
            <div class="product-thumbnail">
                <a :href="'/product/' + product.slug">
                    <img :src="product.image"/>
                </a>
            </div>
            <div class="product-info">
                <a class="product-title" :href="'/product/' + product.slug">
                    {{ product.title }}
                </a>
            </div>
        </td>
        <td class="product-price">
                    <span v-if="product.discount_amount != '0.00'">
                        <del>$ {{product.amount}}</del>
                        <span class="product-subtotal-amount"> ${{ product.amount_with_discount }} </span>
                    </span>
                     <span v-else class="product-amount">
                          ${{ product.amount_with_discount }}
                     </span>
        </td>
        <td class="product-quantity">
            <div class="quantity buttons_added" v-if="!product.subscribe">
                <input value="-" class="minus" type="button" @click="deleteProduct(product.slug)"/>
                <input id="" class="input-text qty text" step="1" min="0" max="" name="" :value="product.count"
                       title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number"/>
                <input value="+" class="plus" type="button" @click="addProduct(product.slug)"/>
            </div>
        </td>
        <td class="product-deliver" v-if="product.subscribe">
            <div class="deliver-select-wrapper">
                <select class="deliver-select-custom" v-model="subscribePeriod" @change="updatePlan">
                    <option v-for="item in subscribePlans" :value="item.value">{{ item.name }}</option>
                </select>
            </div>
        </td>
        <td class="product-deliver" v-else></td>
        <td class="product-subtotal">
                     <span class="product-subtotal-amount">
                           ${{ animatedTotal }}
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
    import delivery from './../../../component/delivery'
    import moment from 'moment';

    export default ({
        data: () => ({
            animatedTotal: 0,
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
            this.animatedTotal = this.product.total_sum_with_discount;
        },
        watch: {
            product(newValue, oldValue) {
                let vm = this;

                function animate() {
                    if (TWEEN.update()) {
                        requestAnimationFrame(animate)
                    }
                }

                new TWEEN.Tween({tweeningNumber: oldValue.total_sum_with_discount})
                        .easing(TWEEN.Easing.Quadratic.Out)
                        .to({tweeningNumber: newValue.total_sum_with_discount}, 500)
                        .onUpdate(function () {
                            vm.animatedTotal = this.tweeningNumber.toFixed(2)
                        })
                        .start();


                animate()
            }
        },
        methods: {
            deleteAllProduct(slug) {
                axios.delete(`/api/carts/products/remove/${slug}/all?hash=${Vue.localStorage.get('hash')}`).then(
                        response => {
                            this.$store.commit('updateState', response);
                        },
                        error => console.log('error')
                )
            },
            updatePlan() {
                this.$store.dispatch('updatePlan', [this.product.slug, this.subscribeDay]);
            }
        }
    });
</script>

<style scoped>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
    .deliver-select-custom {
        background: #ffffff;
    }
</style>