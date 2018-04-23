<template>
    <div>
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>App Devices
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <pie-charts
                                :chart-data="datacollection"
                                :options="{responsive: true, maintainAspectRatio: false}"
                        ></pie-charts>
                    </div>
                </div>
            </div>
    </div>
</template>
<script type="text/babel">
    import pieCharts from './pieCharts'

    export default({
        data: () => ({
            datacollection: {
                labels: [],
                datasets: null
            }
        }),
        created() {
            this.datacollection.labels = this.labelsProps;
            this.datacollection.datasets = [
                {
                    backgroundColor: [
                        '#3FC8AB',
                        '#3998D7',
                        '#B072CB'
                    ],
                    data: this.dataProps
                }
            ]
        },
        components: {
            pieCharts
        },
        props: {
            labelsProps: Array,
            dataProps: Array
        }
    })
</script>