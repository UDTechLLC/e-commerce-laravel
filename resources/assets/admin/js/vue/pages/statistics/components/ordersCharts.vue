<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaction Summary
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
        props: {
            datacollection: null | Object
        },
        components: {
            LineChart
        }
    })
</script>