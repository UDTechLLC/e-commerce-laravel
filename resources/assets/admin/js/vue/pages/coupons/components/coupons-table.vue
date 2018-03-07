<template>
    <div>
        <table-vue
                @sort="sort"
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery"
                :actionField="actionField">
                <!--:actionField="actionField"-->
        </table-vue>

        <div v-if="pagination.totalPage > 1">
            <paginate
                    :pageCount="pagination.totalPage"
                    :containerClass="'pagination'"
                    :clickHandler="clickCallback">
            </paginate>
        </div>

    </div>
</template>

<script type="text/babel">

    export default ({
        data() {
            return {
                searchQuery: '',
                actionField: true,
                gridColumns: [
                    'id',
                    'code',
                    'description',
                    'discount_type',
                    'coupon_amount'
                ],

                gridData: [],
                pagination: {
                    totalPage: 1,
                    currentPage: 1
                },
                sortParam: {
                    field: 'id',
                    type: 'asc'
                }
            }
        },

        mounted() {
           this.getCoupons();
        },
        methods: {
            getCoupons() {
                let url = `/admin/coupons/list?page=${this.pagination.currentPage}&sortType=${this.sortParam.type}&sortField=${this.sortParam.field}`;
                axios.get(url).then(
                    response => {
                        this.gridData = response.data.data;
                        this.pagination.totalPage = response.data.meta.last_page;
                    },
                    error => console.log('errors')
                )
            },
            clickCallback(page) {
                this.pagination.currentPage = page;
                this.getCoupons();
            },
            sort(sortParam) {
                this.sortParam = sortParam;
                this.getCoupons();
            }
        }
    })

</script>