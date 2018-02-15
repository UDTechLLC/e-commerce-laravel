Vue.mixin({
    methods: {
        notifyError(title, text, code) {
            this.$notify({
                group: 'foo-css',
                title: `${title} CODE: ${code}`,
                text,
                type: 'error',
                data: {
                    randomNumber: Math.random()
                }
            })
        },
        notifySuccess(title, text) {
            this.$notify({
                group: 'foo-css',
                title,
                text,
                type: 'success',
                data: {
                    randomNumber: Math.random()
                }
            })
        }
    }
});
