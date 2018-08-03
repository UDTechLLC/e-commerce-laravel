<template>
    <div>
        <main class="upsale">
            <section class="upsale__top-banner">
                <!--<div class="wrapper">
                    <div class="upsale__top-banner__content-block">
                        <h2 class="upsale__top-banner__content-block-title">
                            <span class="highlight-text">
                                Try these products
                            </span>
                            at our highest savings
                        </h2>
                    </div>
                    <div class="upsale__top-banner__image-block">
                        <img src="assets/images/upsale_page/top_banner_image.png" />
                    </div>
                </div>-->
                <div class="upsale__top-banner__image-wrapper desktop">
                    <img src="/web/images/upsale_page/top_banner_decktop.png" alt="Try these products at our highest savings" />
                </div>
                <div class="upsale__top-banner__image-wrapper mobile">
                    <img src="/web/images/upsale_page/top_banner_mobile.png" alt="Try these products at our highest savings" />
                </div>
            </section>
            <section class="upsale__product-block">
                <div class="wrapper">
                    <div class="upsale__product-block-single" v-for="product in upSaleProducts">
                        <div class="upsale__product-block-single--image-wrapper">
                            <img :src="product.image" />
                        </div>
                        <div class="upsale__product-block-single--description-block">
                            <div class="title-check-wrapper">
                                <input :id="'product' + product.id" class="product-check-field upsale__checkbox" :name="'product'+product.id"
                                       type="checkbox" v-model="selectedProducts" :value="product.id"
                                />
                                <label :for="'product' + product.id" class="product-title">{{ product.title }}</label>
                            </div>
                            <p>
                                {{ product.description }}
                            </p>
                            <div class="product-price-block">
                                <div class="product-price">
                                    <span class="product-amount">
                                        <del v-if="product.old_amount != 0">
                                            ${{ product.old_amount }}
                                        </del>
                                        <ins>
                                            ${{ product.amount }}
                                        </ins>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="upsale__product-block-single">
                        <div class="upsale__product-block-single--image-wrapper">

                        </div>
                        <div class="upsale__product-block-single--description-block">
                            <div class="title-check-wrapper">
                                <input id="product1" class="product-check-field" name="product_1" type="checkbox" />
                                <label for="product1" class="product-title"></label>
                            </div>
                            <p></p>
                            <div class="product-price-block">
                                <div class="product-price">
                                    <span class="product-amount">
                                        <del>
                                            $100.00
                                        </del>
                                        <ins>
                                            $50.00
                                        </ins>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="upsale__product-block-buttons-area">
                        <button class="add-to-my-order-btn" :class="{'disabled': payButton || selectedProducts.length == 0}" :disabled="payButton || selectedProducts.length == 0" @click="addedProduct">Add to my order</button>
                        <span class="close-btn" @click="pay">No Thanks</span>
                    </div>
                </div>
            </section>

        </main>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            selectedProducts: [],
            payButton: false,
        }),
        props: {
            upSaleProducts: Array,
            payload: String,
            orderId: Number
        },
        created() {
            //this.getUpSaleProducts();
        },
        methods: {

            pay() {
                let method = "post";
                let path = `/api/pay/braintree/${this.orderId}`;
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", 'nonce');
                hiddenField.setAttribute("value", this.payload);

                form.appendChild(hiddenField);

                document.body.appendChild(form);
                form.submit();
            },
            addedProduct() {
                this.payButton = true;
                axios.post(`/api/checkout/addUpSaleProducts/${this.orderId}`, {
                    products: this.selectedProducts
                }).then(
                        response => this.pay(),
                        error => console.log('error')
                )
            }
        }
    })
</script>
<style scoped>
    .add-to-my-order-btn {
        cursor: pointer;
    }
    .disabled {
        background: #a8a6a6;
    }
</style>