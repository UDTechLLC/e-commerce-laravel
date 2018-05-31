<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sales by date
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <line-chart
                                :chart-data="datacollection"
                                :options="{responsive: true, maintainAspectRatio: false}"
                        ></line-chart>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script type="text/babel">
    import LineChart from './lineCharts'

    export default ({
        data: () => ({
            show: true,
            datacollection: {

                labels: [],
                datasets: [
                    {
                        label: 'Net sales in this period',
                        data: []
                    },
                    {
                        label: 'Charged for shipping',
                        data: []
                    },
                    {
                        label: 'Gross sales in this period',
                        data: []
                    },
                    {
                        label: 'Visitors',
                        data: []
                    }
                ]
            }
        }),
        props: {
            startDate: String | Date,
            endDate: String | Date
        },
        components: {
            LineChart
        },
        created() {
            this.$EventBus.$on('updateCharts', this.getData);
            this.getData()
        },
        methods: {
            getData(period = 'day') {
                this.activeButton = period;
                axios.get(`/admin/statistics/orders/sum/period/fixed?period=${period}&start=${this.startDate}&end=${this.endDate}`).then(
                        response => {
                            this.datacollection = {
                                labels: response.data.labels,
                                datasets: [
                                    {
                                        label: 'Net sales in this period',
                                        data: response.data.products
                                    },
                                    {
                                        label: 'Charged for shipping',
                                        data: response.data.shipping
                                    },
                                    {
                                        label: 'Gross sales in this period',
                                        data: response.data.total
                                    },
                                    {
                                        label: 'Visitors',
                                        data: response.data.visitors
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
    .x_content {
        background: #262C36;
    }
</style>