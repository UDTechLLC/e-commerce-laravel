<template>

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
                           v-validate data-vv-rules="required|max:250"
                           :class="{'is-danger': errors.has('title')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('title')">{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('slug') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Slug <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="slug" name="slug"
                           v-model="slug"
                           v-validate data-vv-rules="required|max:250"
                           :class="{'is-danger': errors.has('slug')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('slug')">{{ errors.first('slug') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="metaKeywords">Description <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <editor
                            @returnContent="updateContent"
                    >
                    </editor>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('category') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="category" name="category"
                            v-model="category"
                            v-validate data-vv-rules="required"
                            :class="{'is-danger': errors.has('category')}"
                            class="form-control col-md-7 col-xs-12">
                        <option v-for="item in categories" :value="item.id">{{ item.title }}</option>
                    </select>
                    <span class="text-danger" v-if="errors.has('category')">{{ errors.first('category') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="published">Published
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="published" name="visible"
                           v-model="published"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postedAt"> Posted at <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <date-picker v-model="postedAt" :config="config"></date-picker>
                </div>
            </div>
            <h3 class="text-center">Meta tags</h3>
            <div class="form-group" :class="{'has-error': errors.has('metaTitle') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="metaTitle">Title <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="metaTitle" name="metaTitle"
                           v-model="metaTags.title"
                           v-validate data-vv-rules="required|max:250"
                           :class="{'is-danger': errors.has('metaTitle')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('metaTitle')">{{ errors.first('metaTitle') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('metaDescription') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="metaDescription">Description <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="metaDescription" name="metaDescription"
                           v-model="metaTags.description"
                           v-validate data-vv-rules="required|max:250"
                           :class="{'is-danger': errors.has('metaDescription')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger"
                          v-if="errors.has('metaDescription')">{{ errors.first('metaDescription') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('metaKeywords') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="metaKeywords">Keywords <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="metaKeywords" name="metaKeywords"
                           v-model="metaTags.keywords"
                           v-validate data-vv-rules="required|max:250"
                           :class="{'is-danger': errors.has('metaKeywords')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger"
                          v-if="errors.has('metaKeywords')">{{ errors.first('metaKeywords') }}</span>
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
    import editor from './../../components/text-editor.vue'
    import datePicker from 'vue-bootstrap-datetimepicker';
    // Import date picker css
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
    import moment from 'moment'

    export default {
        data: () => ({
            title: "",
            slug: "",
            body: "",
            image: "",
            imagePreview: "",
            category: "",
            postedAt: moment().format('YYYY-MM-DD h:mm:ss'),
            config: {
                format: 'YYYY-MM-DD h:mm:ss'
            },
            published: false,
            errorImage: false,
            errorPreviewImage: false,
            metaTags: {
                title: "",
                keywords: "",
                description: ""
            }
        }),
        props: {
            categories: Array
        },
        components: {
            editor,
            datePicker
        },
        methods: {
            updateContent(value) {
                this.body = value;
            },
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
                    slug: this.sanitizeTitle(this.slug),
                    content: this.body,
                    categoryId: this.category,
                    image: this.image,
                    imagePreview: this.imagePreview,
                    postedAt: this.postedAt,
                    published: this.published,
                    metaTags: this.metaTags
                };
                axios.post('/admin/posts/store', data).then(
                        response => {
                            this.notifySuccess("Done", "Post create");
                            setTimeout(() => location.href = "/admin/posts", 1500);
                        },
                        error => {
                            this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                        }
                )
            },
            sanitizeTitle(title) {
                let slug = "";
                // Change to lower case
                let titleLower = title.toLowerCase();
                // Letter "e"
                slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
                // Letter "a"
                slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
                // Letter "o"
                slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
                // Letter "u"
                slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
                // Letter "d"
                slug = slug.replace(/đ/gi, 'd');
                // Trim the last whitespace
                slug = slug.replace(/\s*$/g, '');
                // Change whitespace to "-"
                slug = slug.replace(/\s+/g, '-');

                return slug;
            }
        }
    }
</script>

<style scoped>
    #published {
        margin-top: 10px;
    }
</style>