<template>
    <div>
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
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Slug
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="slug" name="slug"
                           disabled
                           :value="renderSlug"
                           class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('subtitle') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Subtitle">Subtitle <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="subtitle" name="subtitle"
                           v-model="subtitle"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('subtitle')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('subtitle')">{{ errors.first('subtitle') }}</span>
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
            <div class="form-group" :class="{'has-error': errors.has('view_name') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_name">View Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="view_name" name="view_name"
                           v-model="view_name"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('view_name')}"
                            class="form-control col-md-7 col-xs-12">

                        <option v-for="view in viewArray">{{ view }}</option>
                        <!--<option>view2</option>-->
                    </select>
                    <!--<span class="text-danger" v-if="errors.has('view_name')">{{ errors.first('view_name') }}</span>-->
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('old-price') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old-price">Old price
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" id="old-price" v-model="oldPrice"
                           v-validate data-vv-rules="numeric"
                           :class="{'is-danger': errors.has('old-price')}"
                           name="old-price" class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('old-price')">{{ errors.first('old-price') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('price') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price<span
                        class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" id="price" name="price" v-model="price"
                           v-validate data-vv-rules="required|numeric"
                           :class="{'is-danger': errors.has('price')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('price')">{{ errors.first('price') }}</span>
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
            title: "",
            subtitle: "",
            description: "",
            view_name: "show",
            viewArray:[],
            oldPrice: null,
            price: "",
            image: "",
            imagePreview: "",
            slug: "",
            errorImage: false,
            errorPreviewImage: false
        }),
        props: {
            viewList: String
        },
        created() {
            this.viewArray = JSON.parse(this.viewList);
        },
        computed: {
            renderSlug() {
                let slug = this.sanitizeTitle(this.title);
                this.slug = slug;
                return `${location.hostname}/${slug}`;
            }
        },
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
                    image: this.image,
                    imagePreview: this.imagePreview,
                    slug: this.slug,
                    title: this.title,
                    subtitle: this.subtitle,
                    description: this.description,
                    view_name: this.view_name,
                    oldPrice: this.oldPrice,
                    price: this.price
                };

                axios.post('/admin/products/store', data).then(
                        result => {
                            this.notifySuccess("Done", "Product create");
                            setTimeout(() => location.href = "/admin/products", 1500);
                        },
                        error => {
                            this.notifyError(
                                    error.response.data.message,
                                    error.response.data.errors,
                                    error.response.status)
                        }
                );
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
    });
</script>