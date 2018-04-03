<template>
    <div>
        <h1>Analytics</h1>
        <div class="bs-example-popovers">
            <button type="button" class="btn btn-default active" @click.prevent="getData('year')">
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
            <datepicker v-model="startDate" input-class="form-control"></datepicker>
            -
            <datepicker v-model="endDate" input-class="form-control"></datepicker>
            <button type="button" class="btn btn-primary">
                Go
            </button>
        </div>
        <test v-if="show" :datacollection="datacollection"></test>
    </div>
</template>
<script type="text/babel">
    import test from './components/test'
    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'

    export default({
        data: () => ({
            show: false,
            startDate: moment().subtract(1, "days").format(),
            endDate: moment().format(),
            datacollection: {
                //labels: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00"],
                labels: [],
                datasets: [],
            }
        }),
        components: {
            test,
            Datepicker
        },
        created() {
            this.getData()
        },
        methods: {
            getData(period = 'day') {
                axios.get(`/admin/statistics/orders/sum/period/fixed?period=${period}`).then(
                        response => {
                            console.log(response);
                            let dataTmp = []
                            for (var prop in response.data) {
                                  this.datacollection.labels.push(prop)
                                dataTmp.push(response.data[prop]);
                            }

                            this.datacollection.datasets.push({
                                label: 'Bar Dataset',
                                borderColor: '#eeccbb',
                                data: dataTmp
                            });
                            this.show = true
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