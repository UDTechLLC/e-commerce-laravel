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
                                <li class="media event">
                                    <a class="pull-left border-aero profile_thumb">
                                        <i class="fa fa-user aero"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Ms. Mary Jane</a>
                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                        <p>
                                            <small>12 Sales Today</small>
                                        </p>
                                    </div>
                                </li>
                                <li class="media event">
                                    <a class="pull-left border-green profile_thumb">
                                        <i class="fa fa-user green"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Ms. Mary Jane</a>
                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                        <p>
                                            <small>12 Sales Today</small>
                                        </p>
                                    </div>
                                </li>
                                <li class="media event">
                                    <a class="pull-left border-blue profile_thumb">
                                        <i class="fa fa-user blue"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Ms. Mary Jane</a>
                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                        <p>
                                            <small>12 Sales Today</small>
                                        </p>
                                    </div>
                                </li>
                                <li class="media event">
                                    <a class="pull-left border-aero profile_thumb">
                                        <i class="fa fa-user aero"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Ms. Mary Jane</a>
                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                        <p>
                                            <small>12 Sales Today</small>
                                        </p>
                                    </div>
                                </li>
                                <li class="media event">
                                    <a class="pull-left border-green profile_thumb">
                                        <i class="fa fa-user green"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Ms. Mary Jane</a>
                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                        <p>
                                            <small>12 Sales Today</small>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <line-chart
                                    :chart-data="datacollection"
                                    :options="{responsive: true, maintainAspectRatio: false}"
                            ></line-chart>
                        </div>
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
        },
        created(){
          this.getProducts()
        },
        methods: {
            getProducts() {
                axios.get('/admin/statistics/products/total/period/fixed?period=year').then(
                        response => console.log(response),
                        error => console.log('error')
                )
            }
        }
    })
</script>