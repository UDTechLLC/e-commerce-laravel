<template>
       <!-- bidirectional data binding（双向数据绑定） -->
    <div class="container">

        <editor
            @returnContent="updateContent"
        >
        </editor>
    </div>

</template>

<script type="text/babel">
    import editor from './../../components/text-editor.vue'

    export default {
        data: () => ({
            content: '<h2>I am Example</h2>',
        }),
        components: {
            editor
        },
        methods: {
            updateContent(value) {
                this.content = value;
            }
        }
    }
</script>

<style scoped>
    .quill-editor {
        min-height: 300px;
    }
</style>