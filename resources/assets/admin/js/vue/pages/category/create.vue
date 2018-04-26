<template>
    <!-- bidirectional data binding（双向数据绑定） -->
    <div class="container">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

            <div class="form-group" :class="{'has-error': errors.has('title') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title"
                           v-model="title"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('title')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('title')">{{ errors.first('title') }}</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" @click.prevent="validateBeforeSubmit" class="btn btn-success btn-lg">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

</template>

<script type="text/babel">

    export default {
        data: () => ({
            title: "",
            description: ""
        }),
        methods: {
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                   this.submitForm();
                });
            },
            submitForm() {
                axios.post('/admin/category/store', {title: this.title}).then(
                        request => console.log(request),
                        error => console.log('error')
                )
            }
        }
    }
</script>