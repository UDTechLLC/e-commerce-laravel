<template>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product list</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="" method="post">
                        <label class="selectAll" for="all">Select All
                            <input id="all" type="checkbox" @click="selectAll" v-model="allSelected"></label>
                        <div class="">
                            <ul class="to_do">
                                <li v-for="product in products">
                                    <label :for="product.id">
                                        <input :id="product.id" v-model="productIds"
                                               :value="product.id"
                                               type="checkbox"
                                               @click="select"
                                        > {{ product.title }} <span> SKU {{ product.id }}</span>
                                    </label>
                                </li>

                            </ul>
                        </div>
                        <div class="actionBar">
                            <input type="submit" value="Attach" @click.prevent="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">

    export default({
        data: () => ({
            allSelected: false,
            productIds: []
        }),
        props: {
            products: Array,
            attachProduct: Array,
            couponId: Number
        },
        created() {
            this.productIds = this.attachProduct
        },
        methods: {
            selectAll() {
                this.productIds = [];

                if (!this.allSelected) {
                    for (let product in this.products) {
                        this.productIds.push(this.products[product].id.toString());
                    }
                }
            },
            select() {
                this.allSelected = false;
            },
            submit() {
                axios.post(`/admin/coupons/attach-product/${this.couponId}`, {'products':this.productIds}).then(
                        response => {
                            this.notifySuccess("Done", "Coupon attach");
                            setTimeout(() => location.href = "/admin/coupons", 1500);
                        },
                        error => {
                            this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                        }
                )
            }
        }
    })

</script>
<style scoped lang="scss">
    .selectAll {
        font-size: 25px;
        input {
            margin-left: 10px;
        }
    }
</style>