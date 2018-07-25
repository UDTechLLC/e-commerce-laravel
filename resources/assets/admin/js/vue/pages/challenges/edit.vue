<template>
    <div>
        <form id="demo-form3" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <h2 class="text-center">Load main image</h2>
            <upload-image
                    @getFile="getFile"
                    :errorImage="errorImage"
                    :oldImage="challenge.preview"
            />
            <div class="form-group" :class="{'has-error': errors.has('code') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Title <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="code" name="title"
                           v-model="challenge.title"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('challenge.title')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger"
                          v-if="errors.has('challenge.title')">{{ errors.first('challenge.title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="published">Published

                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="published" name="published"
                           v-model="challenge.published"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="open">Open

                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="open" name="open" v-model="challenge.open"/>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" @click.prevent="submitForm" class="btn btn-success btn-lg">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

</template>
<script type="text/babel">

    export default ({
        data: () => ({
            errorImage: false,
        }),
        props: {
            challenge: Object
        },
        created() {
            // this.coupon = JSON.parse(this.couponProps);
        },
        methods: {
            submitForm() {
                /*let data = {
                 title: this.coupon.code,
                 description: this.coupon.description,
                 coupon_amount: this.coupon.coupon_amount
                 };*/
                this.$validator.validateAll().then((result) => {
                    if (result) {

                        axios.post(`/admin/challenges/update/${this.challenge.id}`, this.challenge).then(
                                result => {
                                    this.notifySuccess("Done", "Challenge update");
                                      setTimeout(() => location.href = `/admin/challenges`, 1500);
                                },
                                error => {
                                    this.notifyError(
                                            error.response.data.message,
                                            error.response.data.errors,
                                            error.response.status)
                                }
                        );
                    }
                });
            },
            getFile(file) {
                this.challenge.image = file;
            },
        }

    });
</script>