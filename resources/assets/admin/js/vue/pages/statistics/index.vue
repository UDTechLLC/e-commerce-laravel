<template>
    <div>
        <h1>Analytics</h1>
        <div class="bs-example-popovers">
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'year'}"
                    @click.prevent="selectPeriod('year')">
                Year
            </button>
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'month'}"
                    @click.prevent="selectPeriod('month')">
                Month
            </button>
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'week'}"
                    @click.prevent="selectPeriod('week')">
                Week
            </button>
            <button type="button" class="btn btn-default" :class="{ active: activeButton == 'day'}"
                    @click.prevent="selectPeriod('day')">
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
            <ordersCharts></ordersCharts>
            <!--<productsCharts></productsCharts>-->
    </div>
</template>
<script type="text/babel">

    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'

    import ordersCharts from './components/ordersCharts'
    import productsCharts from './components/productsCharts'

    export default({
        data: () => ({
            startDate: moment().subtract(1, "days").format(),
            endDate: moment().format(),
            activeButton: 'day'
        }),
        components: {
            Datepicker,
            ordersCharts,
            productsCharts,
        },
        methods: {
            selectPeriod(period) {
                this.$EventBus.$emit('updateCharts', period)
                this.activeButton = period
            }
        }
    })
</script>
<style scoped>
    .vdp-datepicker {
        display: inline-block !important;
    }
</style>