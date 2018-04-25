<template>
    <!-- bidirectional data binding（双向数据绑定） -->
    <div class="container">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <h2 class="text-center">Load main image</h2>
            <upload-image
                    @getFile="getFile"
                    :errorImage="errorImage"
            ></upload-image>
            <h2 class="text-center">Load preview image</h2>
            <upload-image
                    @getFile="getPreview"
                    :errorImage="errorPreviewImage"
            ></upload-image>

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
            <div class="form-group" :class="{'has-error': errors.has('description') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea type="text" id="description" name="description"
                           v-model="description"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('description')}"
                           class="form-control col-md-7 col-xs-12"></textarea>
                    <span class="text-danger" v-if="errors.has('description')">{{ errors.first('description') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('link') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="link" name="link"
                           v-model="link"
                           v-validate data-vv-rules="required|link"
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
            title: "",
            description: "",
            link: "",
            image: "",
            imagePreview: "",
            errorImage: false,
            errorPreviewImage: false,

        }),

        methods: {
            getFile(file) {
                this.image = file;
                this.errorImage = false;
            },
            getPreview(file) {
                this.imagePreview = file;
                this.errorPreviewImage = false;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (this.image == "") this.errorImage = true;
                    if (this.imagePreview == "") this.errorPreviewImage = true;
                    if (result && this.image && this.imagePreview)  this.submitForm();
                });
            },
            submitForm() {
                let data = {
                    title: this.title,
                    description: this.description,
                    link: this.link,
                    image: this.image
                };
                axios.post('/admin/posts/store', data).then(
                        request => console.log(request),
                        error => console.log('error')
                )
            },
        }
    }
</script>

<style scoped>
    #published {
        margin-top: 10px;
    }
</style>