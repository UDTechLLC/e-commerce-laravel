<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sales by product
                            <small>Top sellers</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3">
                            <ul class="list-unstyled top_profiles scroll-view">
                                <li class="media event" v-for="product in products" @click="selectProduct(product.slug)"
                                    :class="{active: activeProduct == product.slug}">
                                    <div class="media-body">
                                        <a class="title">{{product.title}} </a>
                                        <p><i class="green">SKU {{product.id}}</i></p>
                                        <p><strong>{{ product.count }} </strong> Sales </p>
                                        <p><strong>{{ product.total | dollars }} </strong> </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <bar-chart
                                    :chart-data="datacollection"
                                    :options="{responsive: true, maintainAspectRatio: false}"
                            ></bar-chart>
                            <!--<div v-else>
                                <h1>Select Product</h1>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import BarChart from './barCharts'

    export default ({
        data: () => ({
            products: [],
            activeProduct: "",
            period: 'day',
            datacollection: {
                labels: [],
                datasets: [
                    {
                        label: 'Purchases for the selected items',
                        borderColor: 'rgba(0, 174, 255)',
                        backgroundColor: 'rgba(130, 196, 214, 0.35)',
                        data: []
                    }
                ]
            }
        }),
        components: {
            BarChart
        },
        props: {
            startDate: String | Date,
            endDate: String | Date
        },
        created(){
            this.getProducts();
            this.$EventBus.$on('updateCharts', this.updateProductStats);
        },
        filters: {
            dollars(value) {
                if (value > 0) return '$' + parseInt(value, 10) / 100;
                else return `$0`
            }
        },
        methods: {
            getProducts() {

                axios.get(`/admin/statistics/products/total/period/fixed?period=${this.period}&start=${this.startDate}&end=${this.endDate}`).then(
                        response => {
                            this.products = response.data;
                            this.activeProduct = this.products[0].slug;
                            this.productStats();
                        },
                        error => console.log('error')
                )
            },
            selectProduct(slug) {
                this.activeProduct = slug;
                this.productStats()
            },
            updateProductStats(period) {
                this.period = period;
                this.getProducts()
            },
            productStats () {
                axios.get(`/admin/statistics/products/specific/period/fixed/${this.activeProduct}?period=${this.period}&start=${this.startDate}&end=${this.endDate}`).then(
                        response => {
                            this.datacollection = {
                                labels: response.data.labels,
                                datasets: [
                                    {
                                        label: 'Purchases for the selected items',
                                        borderColor: 'rgba(0, 174, 255)',
                                        backgroundColor: 'rgba(130, 196, 214, 0.35)',
                                        data: response.data.data
                                    }
                                ]
                            }
                        },
                        error => console.log('error')
                )
            }
        }
    })
</script>
<style scoped>
    ul.top_profiles {
        overflow: auto;
        height: 400px;
    }

    li {
        cursor: pointer;
    }

    li.active {
        background: #acc8d8 !important;
    }
</style>