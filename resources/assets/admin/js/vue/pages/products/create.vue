<template>
    <div>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <upload-image
                    @getFile="getFile"
                    :errorImage="errorImage"
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
            <div class="form-group" :class="{'has-error': errors.has('Subtitle') }">
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
            <div class="form-group" :class="{'has-error': errors.has('old-price') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old-price">Old price<span
                        class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" id="old-price" v-model="oldPrice"
                           v-validate data-vv-rules="required|numeric"
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

                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" @click.prevent="validateBeforeSubmit" class="btn btn-success">Submit</button>
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
            oldPrice: "",
            price: "",
            image: "",
            slug: "",
            errorImage: false
        }),
        computed: {
            renderSlug: function () {
                let slug = this.sanitizeTitle(this.title);
                this.slug = slug;
                return `location.hostname/${slug}`;
            }
        },
        methods: {
            getFile(file) {
                this.image = file;
                this.errorImage = false;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (this.image == "") {
                        this.errorImage = true;
                        console.log('aa');
                    }
                    if (result && this.image) {
                        this.submitForm();
                    }
                });
            },
            submitForm() {
                let data = {
                    image: this.image,
                    slug: this.slug,
                    title: this.title,
                    subtitle: this.subtitle,
                    description: this.description,
                    oldPrice: this.oldPrice,
                    price: this.price
                };

                axios.post('/admin/products/store', data).then(
                        result => {
                            this.notifySuccess("Product create");
                            setTimeout(() => location.href = "/admin/products", 1500);
                        },
                        error => this.notifyError("Server error")
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