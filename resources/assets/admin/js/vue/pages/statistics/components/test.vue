<template>
  <!--  <div class="dashboard_graph">
        <div class="col-md-6 col-sm-9 col-xs-12">
            <div class="demo-placeholder">
                <line-chart
                        :chart-data="datacollection"
                        :options="{responsive: true, maintainAspectRatio: false}"
                ></line-chart>
            </div>
        </div>
        <div class="col-md-6 col-sm-9 col-xs-12">
            <div class="demo-placeholder">
                <bar-chart
                        :chart-data="datacollection"
                        :options="{responsive: true, maintainAspectRatio: false}"
                ></bar-chart>
                <button @click="fillData()">Randomize</button>
            </div>
        </div>
    </div>-->

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Line graph<small>Sessions</small></h2>
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

</template>
<script type="text/babel">
    import LineChart from './lineCharts.js'
    import BarChart from './barCharts'

    export default {
        components: {
            LineChart,
            BarChart
        },
        data () {
            return {
                datacollection: null
            }
        },
        mounted () {
            this.fillData();
            /*let timer = setInterval(() => {
                this.fillData();
            }, 500);*/

            //clearInterval(timer);
        },
        methods: {
            fillData () {
                this.datacollection = {
                    labels: [this.getRandomInt(), this.getRandomInt(), this.getRandomInt(), this.getRandomInt(),this.getRandomInt()],
                    datasets: [{
                        label: 'Bar Dataset',
                        borderColor: '#eeccbb',
                        data: [10, 20, 30, 4, 11]
                    }, {
                        label: 'Line Dataset',
                        data: [5, 25, 40, 10, 32],

                        // Changes this dataset to become a line
                        type: 'line'
                    }],
                   // labels: ['January', 'February', 'March', 'April']
                }
            },
            getRandomInt () {
                return Math.floor(Math.random() * (50 - 5 + 1)) + 5
            }
        }
    }
</script>