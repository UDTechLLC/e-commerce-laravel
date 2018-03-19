<template>
    <div>
        <h1>Order</h1>
        <draggable :list="products" class="dragArea">
            <div v-for="product in products">
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" :src="product.image" alt="image"/>
                        </div>
                        <div class="caption">
                            <p v-html="product.title"></p>
                        </div>
                    </div>
                </div>
            </div>
        </draggable>

        <div class="clearfix"></div>
        <div class="buttons">
            <button class="btn btn-success btn-lg" @click.prevent="save">Save</button>
        </div>
        <div class="clearfix"></div>
    </div>
</template>
<script type="text/babel">
    import draggable from 'vuedraggable';

    export default({
        components: {
            draggable
        },
        data: () => ({
            products: []
        }),
        props: {
            productsProps: String
        },
        created() {
            this.products = JSON.parse(this.productsProps);
        },
        methods: {
            save() {
                axios.post('/admin/products/order', this.products).then(
                        response => this.notifySuccess("Done", "Product order save"),
                        error => this.notifyError(
                                error.response.data.message,
                                error.response.data.errors,
                                error.response.status)
                )
            }
        }
    })
</script>
<style scoped>
    .col-md-55 {
        width: 200px;
    }
    .buttons {
        text-align: right;
    }
</style>