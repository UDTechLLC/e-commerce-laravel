<template>
    <div class="upload-form">
        <div v-if="image" class="image-preview">
            <img :src="image"/>
        </div>
        <div v-else class="image-preview">
            <img v-if="oldImage" :src="oldImage" alt="Upload image">
            <img v-else src="/admin_panel/images/empty-image.png" alt="Upload image">
        </div>
        <p class="text-danger" v-if="errorImage">The image is required.</p>
        <p class="text-danger" v-if="errors.has('image')">{{ errors.first('image') }}</p>
        <div class="fileUpload btn btn-info" v-if="!image">
            <i class="fa fa-cloud-upload"></i> <span>Upload a file</span>
            <input type="file" @change="onFileChange" class="upload"
                   v-validate data-vv-rules="required|image"
                   :class="{'is-danger': errors.has('image')}"
                   name="image"
            />
        </div>

        <div v-else>
            <button class="btn btn-danger" @click.prevent="removeImage">
                <i class="fa fa-remove"></i> Remove image
            </button>
        </div>
    </div>
</template>

<script type="text/babel">

    export default ({
        data: () => ({
            image: ''
        }),
        props: {
            errorImage: Boolean,
            oldImage: String
        },
        watch: {
            image(val) {
                this.$emit('getFile', val);
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                console.log(files[0]);
                setTimeout(() => this.createImage(files[0]), 500);
                //this.createImage(files[0])
            },
            createImage(file) {
                //this.$validator.validateAll();
                console.log(this.errors.first("image"));
                if (!this.errors.has("image")) {
                    let image = new Image();
                    let reader = new FileReader();
                    let vm = this;

                    reader.onload = (e) => {
                        vm.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            removeImage: function (e) {
                this.image = '';
            }
        }
    })

</script>

<style scoped>
    .upload-form {
        text-align: center;
    }

    .fileUpload {
        position: relative;
        overflow: hidden;
    }

    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .image-preview {
        margin: auto;
        width: 200px;
        height: 150px;
    }

    img {
        width: 100%;
        height: 100%;
    }

    .btn {
        margin-top: 30px;
    }
</style>