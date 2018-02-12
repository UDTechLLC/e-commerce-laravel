Vue.mixin({
    methods: {
        notifyError(text) {
            this.$notify({
                group: 'foo-css',
                title: `Test  notification #5`,
                text,
                type: 'error',
                data: {
                    randomNumber: Math.random()
                }
            })
        },
        notifySuccess(text) {
            this.$notify({
                group: 'foo-css',
                title: `Test  notification #5`,
                text,
                type: 'success',
                data: {
                    randomNumber: Math.random()
                }
            })
        }
    }
});
