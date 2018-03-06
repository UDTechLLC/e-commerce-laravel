<template>
    <div>
        Hello
    </div>
</template>
<!--<script type="text/babel">-->

<!--//    export default ({-->
<!--//        data() {-->
<!--//            return {-->
<!--//                searchQuery: '',-->
<!--//                actionField: true,-->
<!--//                gridColumns: [-->
<!--//                    'id',-->
<!--//                    'code',-->
<!--//                    'description',-->
<!--//                    'discount_type',-->
<!--//                    'coupon_amount'-->
<!--//                ],-->
                <!--export default ({-->
                  <!--data: () => ({-->
                <!--code: "",-->
<!--//                subtitle: "",-->
                <!--description: "",-->
<!--//                view_name: "show",-->
<!--//                viewArray:[],-->
<!--//                oldPrice: null,-->
<!--//                price: "",-->
            <!--}),-->
                <!--props: {-->
                <!--viewList: String-->
            <!--},-->
            <!--created() {-->
                <!--this.viewArray = JSON.parse(this.viewList);-->
            <!--},-->
<!--//            computed: {-->
<!--//                renderSlug() {-->
<!--//                    let slug = this.sanitizeTitle(this.title);-->
<!--//                    this.slug = slug;-->
<!--//                    return `${location.hostname}/${slug}`;-->
<!--//                }-->
<!--//            },-->
            <!--methods: {-->
<!--//                getFile(file) {-->
<!--//                    this.image = file;-->
<!--//                    this.errorImage = false;-->
<!--//                },-->
<!--//                getPreview(file) {-->
<!--//                    this.imagePreview = file;-->
<!--//                    this.errorPreviewImage = false;-->
<!--//                },-->
<!--//                validateBeforeSubmit() {-->
<!--//                    this.$validator.validateAll().then((result) => {-->
<!--//                        if (this.image == "") this.errorImage = true;-->
<!--//                        if (this.imagePreview == "") this.errorPreviewImage = true;-->
<!--//                        if (result && this.image && this.imagePreview)  this.submitForm();-->
<!--//                    });-->
<!--//                },-->
                <!--submitForm() {-->
                    <!--let data = {-->
                        <!--code: this.code,-->
<!--//                        subtitle: this.subtitle,-->
                        <!--description: this.description,-->
<!--//                        view_name: this.view_name,-->
<!--//                        oldPrice: this.oldPrice,-->
<!--//                        price: this.price-->
                    <!--};-->

                    <!--axios.post('/admin/coupons/store', data).then(-->
                        <!--result => {-->
                            <!--this.notifySuccess("Done", "Coupons create");-->
                            <!--setTimeout(() => location.href = "/admin/coupons", 1500);-->
                        <!--},-->
                        <!--error => {-->
                            <!--this.notifyError(-->
                                <!--error.response.data.message,-->
                                <!--error.response.data.errors,-->
                                <!--error.response.status)-->
                        <!--}-->
                    <!--);-->
                <!--},-->

            <!--}-->
        <!--});-->
<!--</script>-->