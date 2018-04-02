<template>
    <div>
        <h1>Analytics</h1>
        <div class="bs-example-popovers">
            <button type="button" class="btn btn-default active">
                Year
            </button>
            <button type="button" class="btn btn-default">
                Month
            </button>
            <button type="button" class="btn btn-default">
                Week
            </button>
            <button type="button" class="btn btn-default">
                Day
            </button>
            <span>Custom: </span>
            <datepicker v-model="startDate"></datepicker> -
            <datepicker v-model="endDate"></datepicker>
        </div>
            <test></test>
    </div>
</template>
<script type="text/babel">
    import test from './components/test'
    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'

    export default({
        data: () => ({
            startDate: moment().format(),
            endDate: moment().format()
        }),
        components: {
            test,
            Datepicker
        },
        created() {
            console.log(moment().startOf('week').isoWeekday(0));
        }
    })
</script>
<style scoped>
    .vdp-datepicker {
        display: inline-block!important;
    }
</style>