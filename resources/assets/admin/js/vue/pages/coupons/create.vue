<template>
    <div>
        <form id="demo-form3" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <div class="form-group" :class="{'has-error': errors.has('title') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Code <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="code" name="code"
                           v-model="code"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('code')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('description') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control"
                              v-validate data-vv-rules="required"
                              :class="{'is-danger': errors.has('description')}"
                              name="description" v-model="description" rows="3"></textarea>
                    <span class="text-danger" v-if="errors.has('description')">{{ errors.first('description') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('coupon_amount') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old-price">Coupon Amount
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" id="old-price" v-model="coupon_amount"
                           v-validate data-vv-rules="decimal"
                           :class="{'is-danger': errors.has('coupon_amount')}"
                           name="old-price" class="form-control col-md-7 col-xs-12">
                    <span class="text-danger"
                          v-if="errors.has('coupon_amount')">{{ errors.first('coupon_amount') }}</span>
                </div>
            </div>
            <div class="ln_solid"></div>
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

    export default ({
        data: () => ({
            code: "",
            description: "",
            coupon_amount: ""

        }),

        methods: {
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    this.submitForm();
                });
            },
            submitForm() {
                let data = {
                    code: this.code,
                    description: this.description,
                    coupon_amount: this.coupon_amount
                };
                axios.post('/admin/coupons/store', data).then(
                        result => {
                            this.notifySuccess("Done", "Coupon create");
                            setTimeout(() => location.href = "/admin/coupons", 1500);
                        },
                        error => {
                            this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                        }
                );
            },

        }

    });
</script>