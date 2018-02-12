<template>
    <div class="upload-form">
        <div v-if="image" class="image-preview">
            <img :src="image" />
        </div>
        <div v-else class="image-preview">
            <img src="/admin_panel/images/empty-image.png" alt="Upload image">
        </div>
        <div class="fileUpload btn btn-info"  v-if="!image">
            <i class="fa fa-cloud-upload"></i> <span>Upload a file</span>
            <input type="file" @change="onFileChange" class="upload" />
        </div>

        <div v-else>
            <button class="btn btn-danger" @click="removeImage">
                <i class="fa fa-remove"></i> Remove image
            </button>
        </div>
    </div>
</template>

<script type="text/babel">

    export default ({
        data() {
            return {
                image: ''
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let image = new Image();
                let reader = new FileReader();
                let vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
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