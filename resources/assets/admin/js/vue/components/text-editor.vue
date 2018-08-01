<template>
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
        <modal v-if="showModalVideo"
               @pushCancel="showModalVideo = false"
               @pushOk="createCustomVideo"
        >
            <div slot="body">
                <h3>Create video</h3>
                <div class="form-group">
                    <label for="videoUrl">Enter video</label>
                    <input type="text" class="form-control" id="videoUrl" v-model="customVideoInfo.url">
                </div>
                <div class="form-group">
                    <label for="videoUrl">Video height</label>
                    <input type="text" class="form-control" id="videoHeight" v-model="customVideoInfo.height">
                </div>
                <div class="form-group">
                    <label for="videoUrl">Video width</label>
                    <input type="text" class="form-control" id="videoWidth" v-model="customVideoInfo.width">
                </div>
            </div>
        </modal>
    </div>

</template>

<script type="text/babel">

    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'

    import {VideoBlot} from './quill/quill-video-resize'

    // register with Quill
    window.Quill.register({'formats/video': VideoBlot});

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
    icons['customVideo'] = '<i class="fa fa-film" aria-hidden="true"></i>';


    export default {
        data () {
            return {
                showModal: false,
                showModalVideo: false,
                content: '',
                customVideoInfo: {
                    url: "",
                    height: "150",
                    width: "300"
                },
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
                            ['link', 'image', 'customVideo'],
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
        props: {
            oldContent: String
        },
        watch: {
            content() {
                this.$emit('returnContent', this.content)
            }
        },
        components: {
            quillEditor
        },
        // manually control the data synchronization
        methods: {
            onEditorBlur(quill) {
                //this.$emit('returnContent', this.content)
            },
            onEditorFocus(quill) {
                // console.log('editor focus!', quill)
            },
            onEditorReady(quill) {
                // console.log('editor ready!', quill)
            },
            onEditorChange({quill, html, text}) {
                //   console.log('editor change!', quill, html, text)
                this.content = html
            },
            getBanners() {
                return axios.get('/admin/banners/all').then(
                        request => this.banners = request.data.data,
                        error => console.log('error')
                )
            },
            selectBanner(id) {
                this.editor.clipboard.dangerouslyPasteHTML(this.cursorPosition, `@banner(${id})`);
                this.showModal = false;
            },
            createCustomVideo() {
                this.editor.format('video', this.customVideoInfo);
                this.showModalVideo = false
            }
        },
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill
            }
        },
        mounted() {
            this.content = this.oldContent;
            let customButton = document.querySelector('.ql-banner');
            customButton.addEventListener('click', () => {
                this.getBanners().then(result => {
                    this.showModal = true;
                    this.cursorPosition = (this.editor.getSelection()) ? this.editor.getSelection().index : 0;
                });
            });

            let customButton1 = document.querySelector('.ql-customVideo');
            customButton1.addEventListener('click', () => {
                this.showModalVideo = true;
            });
        }
    }
</script>

<style>
    .item {
        cursor: pointer;
    }

    .test {
        color: red;
    }

    .tip {
        color: red;
    }

    .subtitle {
        color: green;
    }

    /*.quill-editor {
        height: 350px;
    }*/

</style>