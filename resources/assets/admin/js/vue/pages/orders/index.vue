<template>
    <div>
        <div class="container">
            <h2>Orders</h2>
        <table-vue
                @sort="sort"
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery"
        >
        </table-vue>

        <div v-if="pagination.totalPage > 1">
            <paginate
                    :pageCount="pagination.totalPage"
                    :containerClass="'pagination'"
                    :clickHandler="clickCallback">
            </paginate>
        </div>
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
                    'user',
                    'shipping',
                    'billing',
                    'date',
                    'product cost',
                    'coupon code',
                    'shipping cost',
                    'total cost',
                    'count',
                    'state'
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
            this.getOrders();
        },
        methods: {
            getOrders() {
                let url = `/admin/orders/list?page=${this.pagination.currentPage}&sortType=${this.sortParam.type}&sortField=${this.sortParam.field}`;
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
                this.getOrders();
            },
            sort(sortParam) {
                this.sortParam = sortParam;
                this.getOrders();
            }
        }
    })
</script>