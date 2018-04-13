<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaction Summary
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3">
                            <ul class="list-unstyled top_profiles scroll-view">
                                <li class="media event" v-for="product in products" @click="selectProduct(product.slug)"
                                    :class="{active: activeProduct == product.slug}">
                                    <div class="media-body">
                                        <a class="title" href="#">{{product.title}}</a>
                                        <p><strong>{{ product.count }} </strong> Sales </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <bar-chart
                                    :chart-data="datacollection"
                                    :options="{responsive: true, maintainAspectRatio: false}"
                            ></bar-chart>
                          <!--  <div v-else>
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
            activeProduct: "bogo-12week-custom-training-plan",
            datacollection: null
        }),
        components: {
            BarChart
        },
        created(){
            this.productStats();
            this.getProducts()
        },
        methods: {
            getProducts() {
                axios.get('/admin/statistics/products/total/period/fixed?period=year').then(
                        response => {
                            this.products = response.data
                        },
                        error => console.log('error')
                )
            },
            selectProduct(slug) {
                this.activeProduct = slug;
                this.productStats()
            },
            productStats () {
                axios.get(`/admin/statistics/products/specific/period/fixed?period=year&&product=${this.activeProduct}`).then(
                        response => {
                            this.datacollection = {
                                labels: response.data.labels,
                                datasets: [
                                    {
                                        label: 'Orders total',
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