<template>
    <div class="container">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <h2 class="text-center">Load desktop image</h2>
            <upload-image
                    @getFile="getDesktopImage"
                    :errorImage="errorImage"
                    :oldImage="banner.imageDesktop"
            ></upload-image>
            <h2 class="text-center">Load mobile image</h2>
            <upload-image
                    @getFile="getMobileImage"
                    :errorImage="errorPreviewImage"
                    :oldImage="banner.imageMobile"
            ></upload-image>

            <div class="form-group" :class="{'has-error': errors.has('link') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="link" name="link"
                           v-model="banner.link"
                           v-validate data-vv-rules="required|url:{true}"
                           :class="{'is-danger': errors.has('link')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('link')">{{ errors.first('link') }}</span>
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
            banner: {
                link: "",
                imageDesktop: "",
                imageMobile: ""
            },
            errorImage: false,
            errorPreviewImage: false
        }),
        props: {
            bannerProps: Object
        },
        created() {
            this.banner.link = this.bannerProps.link;
            this.banner.imageDesktop = this.bannerProps.desktopImage;
            this.banner.imageMobile = this.bannerProps.mobileImage;
        },
        methods: {
            getDesktopImage(file) {
                this.banner.imageDesktop = file;
                this.errorImage = false;
            },
            getMobileImage(file) {
                this.banner.imageMobile = file;
                this.errorPreviewImage = false;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (this.banner.imageDesktop == "") this.errorImage = true;
                    if (this.banner.imageMobile == "") this.errorPreviewImage = true;
                    if (result && this.banner.imageDesktop && this.banner.imageMobile)  this.submitForm();
                });
            },
            submitForm() {
                axios.put(`/admin/cms/homepage/update/${this.bannerProps.id}`, this.banner).then(
                        response => {
                            this.notifySuccess("Done", "Banner update");
                           // setTimeout(() => location.href = "/admin/banners", 1500);
                        },
                        error => {
                            this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                        }
                )
            }
        }
    }
</script>

<style scoped>
    #published {
        margin-top: 10px;
    }
</style>