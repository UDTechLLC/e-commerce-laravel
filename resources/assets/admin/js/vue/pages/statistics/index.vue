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
            <button type="button" class="btn btn-primary" @click.prevent="selectPeriod('custom')">
                Go
            </button>
        </div>
            <ordersCharts
                    :start-date="startDate"
                    :end-date="endDate">
            </ordersCharts>
            <productsCharts
                    :start-date="startDate"
                    :end-date="endDate">
            </productsCharts>
    </div>
</template>
<script type="text/babel">

    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'

    import ordersCharts from './components/ordersCharts'
    import productsCharts from './components/productsCharts'

    export default({
        data: () => ({
            startDate: moment().subtract(1, "days").format('YYYY-MM-DD'),
            endDate: moment().format('YYYY-MM-DD'),
            activeButton: 'day'
        }),
        components: {
            Datepicker,
            ordersCharts,
            productsCharts
        },
        methods: {
            selectPeriod(period) {
                this.startDate = moment(this.startDate).format('YYYY-MM-DD');
                this.endDate = moment(this.endDate).format('YYYY-MM-DD');
                setTimeout(() => {
                    this.$EventBus.$emit('updateCharts', period);
                }, 100);

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