<template>
    <div>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <h2 class="text-center">Load image</h2>
            <upload-image
                    @getFile="getFile"
                    :errorImage="errorImage"
                    :oldImage="image"
            ></upload-image>

            <div class="form-group" :class="{'has-error': errors.has('first_name') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first_name" name="first_name"
                           v-model="first_name"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('first_name')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('first_name')">{{ errors.first('first_name') }}</span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error': errors.has('last_name') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last_name" name="last_name"
                           v-model="last_name"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('last_name')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('last_name')">{{ errors.first('last_name') }}</span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error': errors.has('email') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Email <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="email" name="email"
                           v-model="email"
                           v-validate data-vv-rules="required|email"
                           :class="{'is-danger': errors.has('email')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('email')">{{ errors.first('email') }}</span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error': errors.has('password') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="password" name="password"
                           placeholder="********"
                           v-model="password"
                           v-validate data-vv-rules="min:5"
                           :class="{'is-danger': errors.has('password')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('password')">{{ errors.first('password') }}</span>
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
            first_name: "",
            last_name: "",
            email: "",
            password: "",
            image: "",
            errorImage: false
        }),
        props: {
            user: Object
        },
        created() {
            this.first_name = this.user.first_name;
            this.last_name = this.user.last_name;
            this.email = this.user.email;
            this.image = this.user.avatar;
        },
        methods: {
            getFile(file) {
                this.image = file;
                this.errorImage = false;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (this.image == "") this.errorImage = true;
                    if (result && this.image)  this.submitForm();
                });
            },
            submitForm() {
                let data = {
                    image: this.image,
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                };

                axios.post(`/admin/users/update/${this.user.id}`, data).then(
                        response => {
                            this.notifySuccess("Done", "User update");
                            setTimeout(() => location.href = "/admin/users", 1500);
                        },
                        error => {
                            this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                        }
                );
            }
        }
    });
</script>