<template>
    <div>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

            <div class="form-group" :class="{'has-error': errors.has('title') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"> Description <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" rows="3"
                              id="description" v-model="description"
                              v-validate data-vv-rules="required"></textarea>

                    <span class="text-danger" v-if="errors.has('description')">{{ errors.first('description') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="value"> Value <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <date-picker v-model="value" :config="config"></date-picker>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="homePage">Home Page
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="homePage" name="home_page"
                           v-model="homePage"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shopPage">Shop Page
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="shopPage" name="shop_page"
                           v-model="shopPage"/>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success btn-lg" @click.prevent="submitForm">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script type="text/babel">

    // Import this component
    import datePicker from 'vue-bootstrap-datetimepicker';

    // Import date picker css
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
    import moment from 'moment'

    export default({
        data: () => ({
            id: 1,
            description: "",
            value: moment().format(),
            homePage: true,
            shopPage: true,
            config: {
                format: 'YYYY-MM-DD h:mm:ss'
            }
        }),
        props: {
            timerProps: String
        },
        components: {
            datePicker
        },
        created() {
            let data = JSON.parse(this.timerProps);
            this.id = data.id;
            this.description = data.description;
            this.value = data.value;
            this.homePage = data.home_page;
            this.shopPage = data.shop_page;
        },
        methods: {
            submitForm() {
                this.$validator.validateAll().then((result) => {
                    let data = {
                        description: this.description,
                        value: this.value,
                        home_page: this.homePage,
                        shop_page: this.shopPage
                    };
                    axios.put(`/admin/timer/update/${this.id}`, data).then(
                            result => {
                                this.notifySuccess("Done", "Timer update");
                            },
                            error => this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                    );
                });
            },
        }
    })
</script>
<style scoped>
    #shopPage, #homePage {
        margin-top: 10px;
    }

    iframe {
        display: block;
        margin: 25px 0;
        width: 100%;
    }
</style>