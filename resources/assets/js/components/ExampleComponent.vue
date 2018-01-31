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
    import { ImageDrop } from 'quill-image-drop-module';
    import  ImageResize  from 'quill-image-resize-module';
    window.Quill.register('modules/imageDrop', ImageDrop);
    window.Quill.register('modules/imageResize', ImageResize);

    export default {
        data () {
            return {
                content: '<h2>I am Example</h2>',
                editorOption: {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'size': ['small', false, 'large'] }],
                            ['bold', 'italic'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            ['link', 'image']
                        ],
                        imageDrop: true,
                        imageResize: {
                            displayStyles: {
                                backgroundColor: 'black',
                                border: 'none',
                                color: 'white'
                            },
                            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
                    }
                }
            }
            }
        },
        components: {
            quillEditor
        },
        // manually control the data synchronization
        // 如果需要手动控制数据同步，父组件需要显式地处理changed事件
        methods: {
            onEditorBlur(quill) {
                console.log('editor blur!', quill)
            },
            onEditorFocus(quill) {
                console.log('editor focus!', quill)
            },
            onEditorReady(quill) {
                console.log('editor ready!', quill)
            },
            onEditorChange({quill, html, text}) {
                console.log('editor change!', quill, html, text)
                this.content = html
            }
        },
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill
            }
        },
        mounted() {
            console.log('this is current quill instance object', this.editor)
        }
    }
</script>

<style>
    .container {
        width: 1000px;
        padding-top: 150px;
        margin: auto;
    }
</style>