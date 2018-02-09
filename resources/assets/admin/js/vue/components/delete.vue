<template>
    <div class="display-inline">
        <modal v-if="showModal"
               @pushCancel="showModal = false"
               @pushOk="deleteItem"
        >
            <p slot="body">{{ msg }}</p>
        </modal>
        <a href="#" @click.prevent="showModal = true"><i class="glyphicon glyphicon-trash"></i></a>
    </div>
</template>
<script type="text/babel">
    export default({
        data() {
            return {
                showModal: false,
                msg: (this.message) ? this.message : "Are you sure ?"
            }
        },
        props: {
            message: String,
            url: String,
            redirect: String
        },
        methods: {
            deleteItem() {
                this.showModal = false;
                axios.delete(this.url).then(
                        response => window.location.href = this.redirect,
                        error => console.log('error delete component')
                );
            }
        }
    })
</script>
<style scoped lang="scss">
    .display-inline {
        display: inline-block;
    }
    a {
        font-size: 20px;
        padding-left: 10px;
    .glyphicon-trash {
        color: #d43f3a;
    }
    }
</style>