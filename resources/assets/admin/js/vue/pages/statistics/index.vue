<template>
    <div>
        <h1>Analytics</h1>
        <div class="bs-example-popovers">
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'year'}"
                    @click.prevent="getData('year')">
                Year
            </button>
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'month'}"
                    @click.prevent="getData('month')">
                Month
            </button>
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'week'}"
                    @click.prevent="getData('week')">
                Week
            </button>
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'day'}"
                    @click.prevent="getData('day')">
                Day
            </button>
            <span>Custom: </span>
            <datepicker v-model="startDate" input-class="form-control"></datepicker>
            -
            <datepicker v-model="endDate" input-class="form-control"></datepicker>
            <button type="button" class="btn btn-primary">
                Go
            </button>
        </div>
            <ordersCharts :datacollection="datacollection"></ordersCharts>

    </div>
</template>
<script type="text/babel">
    import test from './components/test'
    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'

    import ordersCharts from './components/ordersCharts'
    import productsCharts from './components/productsCharts'

    export default({
        data: () => ({
            startDate: moment().subtract(1, "days").format(),
            endDate: moment().format(),
            datacollection: null,
            activeButton: 'day'
        }),
        components: {
            test,
            Datepicker,
            ordersCharts,
            productsCharts,
        },
        created() {
            this.getData()
        },
        methods: {
            getData(period = 'day') {
                this.activeButton = period;
                axios.get(`/admin/statistics/orders/sum/period/fixed?period=${period}`).then(
                        response => {
                            let dataTmp = [];
                            let labelsTmp = [];
                            for (var prop in response.data) {
                                labelsTmp.push(prop);
                                dataTmp.push(response.data[prop]);
                            }
                            this.datacollection = {
                                labels: labelsTmp,
                                datasets: [
                                    {
                                        label: 'Orders total',
                                        borderColor: 'rgba(0, 174, 255)',
                                        backgroundColor: 'rgba(130, 196, 214, 0.35)',
                                        data: dataTmp
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
    .vdp-datepicker {
        display: inline-block !important;
    }
</style>