<template>
    <div class="small">
        <line-chart :chart-data="datacollection"></line-chart>
        <button @click="getData('year')">Randomize</button>
    </div>
</template>

<script type="text/babel">
    import LineChart from './lineCharts'

    export default {
        components: {
            LineChart
        },
        data () {
            return {
                datacollection: null
            }
        },
        mounted () {
            this.getData()
        },
        methods: {
            fillData () {
                this.datacollection = {
                    labels: [this.getRandomInt(), this.getRandomInt()],
                    datasets: [
                        {
                            label: 'Data One',
                            backgroundColor: '#f87979',
                            data: [this.getRandomInt(), this.getRandomInt()]
                        }, {
                            label: 'Data One',
                            backgroundColor: '#f87979',
                            data: [this.getRandomInt(), this.getRandomInt()]
                        }
                    ]
                }
            },
            getData(period = 'day') {

                axios.get(`/admin/statistics/orders/sum/period/fixed?period=${period}`).then(
                        response => {
                    console.log(response);
                let dataTmp = [];
                let collectTmp = [];
                for (var prop in response.data) {
                    collectTmp.push(prop);
                    dataTmp.push(response.data[prop]);
                }
                /*this.datacollection.labels.push(...collectTmp);
                this.datacollection.datasets.push({
                    label: 'Bar Dataset',
                    borderColor: '#eeccbb',
                    data: dataTmp
                });*/

                            this.datacollection = {
                                labels: collectTmp,
                                datasets: [
                                    {
                                        label: 'Data One',
                                        backgroundColor: '#f87979',
                                        data: dataTmp
                                    }
                                ]
                            }
            },
                error => console.log('error')
            )
            },
            getRandomInt () {
                return Math.floor(Math.random() * (50 - 5 + 1)) + 5
            }
        }
    }
</script>

<style>
    .small {
        max-width: 600px;
        margin:  150px auto;
    }
</style>