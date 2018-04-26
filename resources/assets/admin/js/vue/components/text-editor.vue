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

        <modal v-if="showModal"
               @pushCancel="showModal = false"
               @pushOk="showModal = false"
        >
            <div slot="body">
                <h3>Banners</h3>
                <ul class="to_do">

                    <li v-for="item in banners" class="item" @click.prevent="selectBanner(item.id)">
                        <label :for="item.id">
                            {{item.title}}
                        </label>
                    </li>
                </ul>
            </div>
        </modal>
    </div>

</template>

<script type="text/babel">

    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'

    // you can also register quill modules in the component
    //import Quill from 'quill';

    let Block = window.Quill.import('blots/block');

    class SubtitleBlot extends Block {
        static create(url) {
            let node = super.create();
            return node;
        }
    }
    SubtitleBlot.blotName = 'subtitle';
    SubtitleBlot.className = 'subtitle';
    SubtitleBlot.tagName = 'div';

    class TipBlot extends Block {
        static create(url) {
            let node = super.create();
            return node;
        }
    }
    TipBlot.blotName = 'tip';
    TipBlot.className = 'tip';
    TipBlot.tagName = 'div';

    window.Quill.register(TipBlot);
    window.Quill.register(SubtitleBlot);

    import {quillEditor} from 'vue-quill-editor';
    import {ImageDrop} from 'quill-image-drop-module';
    import  ImageResize  from 'quill-image-resize-module';
    window.Quill.register('modules/imageDrop', ImageDrop);
    window.Quill.register('modules/imageResize', ImageResize);
    var icons = window.Quill.import('ui/icons');
    icons['banner'] = '<i class="fa fa-barcode" aria-hidden="true"></i>';

    export default {
        data () {
            return {
                showModal: false,
                content: '',
                cursorPosition: 0,
                banners: [],
                editorOption: {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],
                            [{'header': 1}, {'header': 2}],
                            [{'list': 'ordered'}, {'list': 'bullet'}],
                            [{'script': 'sub'}, {'script': 'super'}],
                            [{'indent': '-1'}, {'indent': '+1'}],
                            [{'direction': 'rtl'}],
                            [{'size': ['small', false, 'large', 'huge']}],
                            [{'header': [1, 2, 3, 4, 5, 6, false]}],
                            [{'font': []}],
                            [{'color': []}, {'background': []}],
                            [{'align': []}],
                            ['clean'],
                            ['link', 'image', 'video'],
                            ['banner']
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
            },
            getBanners() {
                axios.get('/admin/banners/all').then(
                        request => this.banners = request.data.data,
                        error => console.log('error')
                )
            },
           selectBanner(id) {
               this.editor.clipboard.dangerouslyPasteHTML(this.cursorPosition, `@banner(${id})`);
               this.showModal = false;
               /*axios.get(`/admin/banners/template/${id}`).then(
                        request => {
                           // let index = 0;
                           // let index = this.$refs.myQuillEditor.quill.getSelection();
                          //  console.log(index);
                            // this.$refs.myQuillEditor.quill.insertText(cursor, t, 'html');
                            this.editor.clipboard.dangerouslyPasteHTML(this.cursorPosition, `@banner(${id})`);
                            this.showModal = false;
                        },
                        error => console.log('error')
                )*/
            }
        },
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill
            }
        },
        mounted() {
            //console.log('this is current quill instance object', this.editor)
            let customButton = document.querySelector('.ql-banner');
            customButton.addEventListener('click', () => {
                this.getBanners();
                setTimeout(() => {
                    this.showModal = true;
                     this.cursorPosition = this.editor.getSelection().index;
                    //let t = `<img src="${this.banners[0].imageDesktop}" />`;

                }, 500);


                // this.content = this.content + t;
                /*if (screenfull.enabled) {
                 console.log('requesting fullscreen');
                 screenfull.request();
                 } else {
                 console.log('Screenfull not enabled');
                 }*/
            });
        }
    }
</script>

<style>
    .item {
        cursor: pointer;
    }
    .test {
        color:red;
    }
    .tip{color:red;}
    .subtitle{color:green;}

    /*.quill-editor {
        height: 350px;
    }*/
</style>