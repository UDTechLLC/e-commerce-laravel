<template>

    <div class="container">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <h2 class="text-center">Load main image</h2>
            <upload-image
                    @getFile="getFile"
                    :errorImage="errorImage"
                    :oldImage="post.image"
            ></upload-image>
            <h2 class="text-center">Load preview image</h2>
            <upload-image
                    @getFile="getPreview"
                    :errorImage="errorPreviewImage"
                    :oldImage="post.imagePreview"
            ></upload-image>

            <div class="form-group" :class="{'has-error': errors.has('title') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title"
                           v-model="post.title"
                           v-validate data-vv-rules="required"
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
                           v-model="post.slug"
                           v-validate data-vv-rules="required"
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
                            :oldContent="post.content"
                    >
                    </editor>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('category') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="category" name="category"
                            v-model="post.categoryId"
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
                           v-model="post.published"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postedAt"> Posted at <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <date-picker v-model="post.postedAt" :config="config"></date-picker>
                </div>
            </div>
            <h3 class="text-center">Meta tags</h3>
            <div class="form-group" :class="{'has-error': errors.has('metaTitle') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="metaTitle">Title <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="metaTitle" name="metaTitle"
                           v-model="post.metaTags.title"
                           v-validate data-vv-rules="required"
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
                           v-model="post.metaTags.description"
                           v-validate data-vv-rules="required"
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
                           v-model="post.metaTags.keywords"
                           v-validate data-vv-rules="required"
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
            post: {
                title: "",
                slug: "",
                content: "",
                image: "",
                imagePreview: "",
                categoryId: "",
                postedAt: moment().format('YYYY-MM-DD h:mm:ss'),
                published: false,
                metaTags: {
                    title: "",
                    keywords: "",
                    description: ""
                }
            },
            oldSlug: "",
            config: {
                format: 'YYYY-MM-DD h:mm:ss'
            },
            errorImage: false,
            errorPreviewImage: false
        }),
        props: {
            categories: Array,
            postProps: Object
        },
        components: {
            editor,
            datePicker
        },
        created() {
          this.post.title = this.postProps.title;
          this.post.slug = this.postProps.slug;
          this.oldSlug = this.postProps.slug;
          this.post.content = this.postProps.content;
          this.post.image = this.postProps.image;
          this.post.imagePreview = this.postProps.preview;
          this.post.categoryId = this.postProps.category_id;
          this.post.published = this.postProps.published;
          this.post.postedAt = moment(this.postProps.posted_at, 'MMMM Do, YYYY').format('YYYY-MM-DD h:mm:ss');
          this.post.metaTags.title = this.postProps.meta_title;
          this.post.metaTags.keywords = this.postProps.meta_keywords;
          this.post.metaTags.description = this.postProps.meta_description
        },
        methods: {
            updateContent(value) {
                this.post.content = value;
            },
            getFile(file) {
                this.post.image = file;
                this.errorImage = false;
            },
            getPreview(file) {
                this.post.imagePreview = file;
                this.errorPreviewImage = false;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (this.post.image == "") this.errorImage = true;
                    if (this.post.imagePreview == "") this.errorPreviewImage = true;
                    if (result && this.post.image && this.post.imagePreview)  this.submitForm();
                });
            },
            submitForm() {

                axios.post(`/admin/posts/update/${this.oldSlug}`, this.post).then(
                        response => {
                            this.notifySuccess("Done", "Post update");
                           // setTimeout(() => location.href = "/admin/posts", 1500);
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
