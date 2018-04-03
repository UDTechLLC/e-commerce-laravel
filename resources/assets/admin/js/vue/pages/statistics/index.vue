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
            <datepicker v-model="startDate" input-class="form-control"></datepicker> -
            <datepicker v-model="endDate" input-class="form-control"></datepicker>
            <button type="button" class="btn btn-primary">
                Go
            </button>
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
            startDate: moment().subtract(1, "days").format(),
            endDate: moment().format()
        }),
        components: {
            test,
            Datepicker
        },
    })
</script>
<style scoped>
    .vdp-datepicker {
        display: inline-block!important;
    }
</style>