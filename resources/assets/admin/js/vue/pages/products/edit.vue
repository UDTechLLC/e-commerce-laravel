<template>
    <div>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
            <h2 class="text-center">Load main image</h2>
            <upload-image
                    @getFile="getFile"
                    :errorImage="errorImage"
                    :oldImage="entry.image"
            />
            <h2 class="text-center">Load preview image</h2>
            <upload-image
                    @getFile="getPreview"
                    :errorImage="errorPreviewImage"
                    :oldImage="entry.imagePreview"
            />

            <div class="form-group" :class="{'has-error': errors.has('title') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title"
                           v-model="entry.title"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('title')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('title')">{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('slug') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Slug
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="slug" name="slug"
                           v-model="entry.slug"
                           disabled
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('slug')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('slug')">{{ errors.first('slug') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('subtitle') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Subtitle">Subtitle <span
                        class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="subtitle" name="subtitle"
                           v-model="entry.subtitle"
                           v-validate data-vv-rules="required"
                           :class="{'is-danger': errors.has('subtitle')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('subtitle')">{{ errors.first('subtitle') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <editor
                            @returnContent="updateContent"
                            :oldContent="entry.description"
                    >
                    </editor>
                </div>
                <!--<div class="col-md-6 col-sm-6 col-xs-12">-->
                <!--<textarea class="form-control"-->
                <!--v-validate data-vv-rules="required"-->
                <!--:class="{'is-danger': errors.has('description')}"-->
                <!--name="description" v-model="description" rows="3"></textarea>-->
                <!--<span class="text-danger" v-if="errors.has('description')">{{ errors.first('description') }}</span>-->
                <!--</div>-->
            </div>
            <!--<div class="form-group" :class="{'has-error': errors.has('description') }">-->
                <!--<label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>-->
                <!--</label>-->
                <!--<div class="col-md-6 col-sm-6 col-xs-12">-->
                    <!--<textarea class="form-control"-->
                              <!--v-validate data-vv-rules="required"-->
                              <!--:class="{'is-danger': errors.has('description')}"-->
                              <!--name="description" v-model="entry.description" rows="3"></textarea>-->
                    <!--<span class="text-danger" v-if="errors.has('description')">{{ errors.first('description') }}</span>-->
                <!--</div>-->
            <!--</div>-->
            <div class="form-group" :class="{'has-error': errors.has('view_name') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_name">View Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="view_name" name="view_name"
                            v-model="entry.view_name"
                            v-validate data-vv-rules="required"
                            :class="{'is-danger': errors.has('view_name')}"
                            class="form-control col-md-7 col-xs-12">
                        <option v-for="view in viewArray">{{ view }}</option>
                    </select>
                    <span class="text-danger" v-if="errors.has('view_name')">{{ errors.first('view_name') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('video') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video"> View Video
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <iframe :src="entry.viewVideo" frameborder="0" v-if="!errors.has('video') && entry.viewVideo"
                            webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    <input type="text" id="video" v-model="entry.viewVideo" class="form-control col-md-7 col-xs-12"

                           v-validate data-vv-rules="url|linkVimeo"  name="video"
                    />
                    <span class="text-danger" v-if="errors.has('video')">{{ errors.first('video') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('old-price') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old-price">Old price
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="number" id="old-price" v-model="entry.oldPrice"
                           v-validate data-vv-rules="decimal"
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
                    <input type="number" id="price" name="price" v-model="entry.price"
                           v-validate data-vv-rules="required|decimal"
                           :class="{'is-danger': errors.has('price')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('price')">{{ errors.first('price') }}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('checkMark') }">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="checkMark">Check mark</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" id="checkMark" name="checkMark"
                           v-model="check"
                           :class="{'is-danger': errors.has('checkMark')}"
                           class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('checkMark')">{{ errors.first('checkMark') }}</span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <ul class="col-md-3 col-md-offset-3 col-sm-3 col-xs-12">
                        <li v-for="(mark, index) in entry.check_mark">
                            <span v-show="mark.edit === false" @dblclick="mark.edit = true">{{ mark.title }}</span>
                            <input
                                    v-show="mark.edit === true"
                                    v-model="mark.title"
                                    v-on:blur="mark.edit = false; $emit('update')"
                                    keyup.enter="mark.edit = false; $emit('update')">
                            <a href="#" @click.prevent="removeCheckMark(index)"><i class="fa fa-remove item-delete"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" @click.prevent="addCheckMark" class="btn btn-success">Add check mark</button>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isVirtual">Virtual
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="isVirtual" name="isVirtual" v-model="entry.isVirtual" />
                </div>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('externalLink') }" v-if="entry.isVirtual">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old-price">Purchase note
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="externalLink" v-model="entry.externalLink"
                           v-validate data-vv-rules="url"
                           :class="{'is-danger': errors.has('externalLink')}"
                           name="externalLink" class="form-control col-md-7 col-xs-12">
                    <span class="text-danger" v-if="errors.has('externalLink')">{{ errors.first('externalLink') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="published">Published

                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="published" name="published" v-model="entry.published" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="visible"> Add to the Shop Page

                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="visible" name="visible" v-model="entry.visible" />
                </div>
            </div>
            <div class="form-group" v-if="!entry.isVirtual">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="out_of_stock"> Out of stock

                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="checkbox" class="published-checkbox" id="out_of_stock" name="visible" v-model="entry.out_of_stock" />
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
    import editor from './../../components/text-editor.vue'

    export default ({
        data: () => ({
            entry: {},
            viewArray:[],
            oldSlug: "",
            oldContent: "",
            errorImage: false,
            errorPreviewImage: false,
            check: "",
        }),
        props: {
            product: String,
            viewList: String
        },
        components: {
            editor
        },
        created() {
            this.entry = JSON.parse(this.product);
            this.viewArray = JSON.parse(this.viewList);
            this.oldSlug = this.entry.slug;
            this.oldContent = this.entry.description;

            this.$validator.extend('linkVimeo', {

                getMessage: field => 'Url is not valid.',
                validate: (value) => {
                    let url = new URL(value);

                    return url.hostname == "player.vimeo.com"
                            || url.hostname == "www.youtube.com"
                            || url.hostname == "youtube.com";
                }
            });
        },
        computed: {
            /*renderSlug() {
                let slug = this.sanitizeTitle(this.entry.title);
                this.entry.slug = slug;
                return `${location.hostname}/${slug}`;
            }*/
        },
        methods: {
            updateContent(value) {
                this.entry.description = value;
            },
            getFile(file) {
                this.entry.image = file;
                this.entry.errorImage = false;
            },
            getPreview(file) {
                this.entry.imagePreview = file;
                this.entry.errorPreviewImage = false;
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (this.entry.image == "") this.errorImage = true;
                    if (this.entry.imagePreview == "") this.errorPreviewImage = true;
                    if (result && this.entry.image && this.entry.imagePreview)  this.submitForm();
                });
            },
            submitForm() {
                axios.put(`/admin/products/update/${this.oldSlug}`, this.entry).then(
                        result => {
                            this.notifySuccess("Done", "Product update");
                            setTimeout(() => location.href = "/admin/products", 1500);
                        },
                        error =>  this.notifyError(
                                error.response.data.message,
                                error.response.data.errors,
                                error.response.status)
                );
            },
            addCheckMark() {
                this.entry.check_mark.push({
                    title: this.check,
                    edit: false
                });

                this.check = "";
            },
            removeCheckMark(item) {
                this.entry.check_mark.splice(item, 1);
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
    })

</script>
<style scoped>
    #published, #visible, #isVirtual {
        margin-top: 10px;
    }
    iframe {
        display: block;
        margin: 25px 0;
        width: 100%;
    }

    ul {
        list-style: none;
    }

    li {
        padding-left: 1em;
        text-indent: -1em;
    }

    li:before {
        content: "\02713";
        padding-right: 5px;
    }
</style>
