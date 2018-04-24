<template>
    <!-- bidirectional data binding（双向数据绑定） -->
    <div class="container">

        <quill-editor v-model="content"
                      ref="myQuillEditor"
                      :options="editorOption"
                      @blur="onEditorBlur($event)"
                      @focus="onEditorFocus($event)"
                      @ready="onEditorReady($event)">
        </quill-editor>
    </div>

</template>

<script>

    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'

    // you can also register quill modules in the component
    //import Quill from 'quill';
    import {quillEditor} from 'vue-quill-editor';
    import {ImageDrop} from 'quill-image-drop-module';
    import  ImageResize  from 'quill-image-resize-module';
    window.Quill.register('modules/imageDrop', ImageDrop);
    window.Quill.register('modules/imageResize', ImageResize);

    export default {
        data () {
            return {
                content: '',
                editorOption: {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],
                            [{ 'header': 1 }, { 'header': 2 }],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            [{ 'script': 'sub' }, { 'script': 'super' }],
                            [{ 'indent': '-1' }, { 'indent': '+1' }],
                            [{ 'direction': 'rtl' }],
                            [{ 'size': ['small', false, 'large', 'huge'] }],
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [{ 'font': [] }],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'align': [] }],
                            ['clean'],
                            ['link', 'image', 'video']
                        ],
                        imageDrop: true,
                        imageResize: {
                            displayStyles: {
                                backgroundColor: 'black',
                                border: 'none',
                                color: 'white'
                            },
                            modules: ['Resize', 'DisplaySize', 'Toolbar']
                        }
                    }
                }
            }
        },
        components: {
            quillEditor
        },
        // manually control the data synchronization
        methods: {
            onEditorBlur(quill) {
                this.$emit('returnContent', this.content)
            },
            onEditorFocus(quill) {
               // console.log('editor focus!', quill)
            },
            onEditorReady(quill) {
                //console.log('editor ready!', quill)
            },
            onEditorChange({quill, html, text}) {
                //console.log('editor change!', quill, html, text)
                this.content = html
            }
        },
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill
            }
        },
        mounted() {
            //console.log('this is current quill instance object', this.editor)
        }
    }
</script>

<style scoped>
    /*.quill-editor {
        height: 350px;
    }*/
</style>