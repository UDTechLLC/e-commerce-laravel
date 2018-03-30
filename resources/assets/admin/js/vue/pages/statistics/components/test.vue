<template>
    <div class="dashboard_graph">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="demo-placeholder">
                <line-chart
                        :chart-data="datacollection"
                        :options="{responsive: true, maintainAspectRatio: false}"
                ></line-chart>
                <button @click="fillData()">Randomize</button>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import LineChart from './lineCharts.js'

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
            this.fillData();
            let timer = setInterval(() => {
                this.fillData();
            }, 500);

            clearInterval(timer);
        },
        methods: {
            fillData () {
                this.datacollection = {
                    labels: [this.getRandomInt(), this.getRandomInt(), this.getRandomInt(), this.getRandomInt(),this.getRandomInt()],
                    datasets: [
                        {
                            label: 'Data One',
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [

                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            data: [this.getRandomInt(), this.getRandomInt(), this.getRandomInt(), this.getRandomInt(),this.getRandomInt()],
                        },
                        {
                            label: 'Data One',
                            backgroundColor: [
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 159, 64, 1)'
                            ],
                            data: [this.getRandomInt(), this.getRandomInt(), this.getRandomInt(), this.getRandomInt(),this.getRandomInt()],
                        },
                        {
                            label: 'Data One',
                            backgroundColor: [
                                'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 206, 86, 1)'
                            ],
                            data: [this.getRandomInt(), this.getRandomInt(), this.getRandomInt(), this.getRandomInt(),this.getRandomInt()],
                        },
                        {
                            label: 'Data One',
                            backgroundColor: [
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(153, 102, 255, 1)'
                            ],
                            data: [this.getRandomInt(), this.getRandomInt(), this.getRandomInt(), this.getRandomInt(),this.getRandomInt()],
                        },

                    ]
                }
            },
            getRandomInt () {
                return Math.floor(Math.random() * (50 - 5 + 1)) + 5
            }
        }
    }
</script>