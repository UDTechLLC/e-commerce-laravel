<template>
    <div>
        <div class="container">
            <h2>Orders</h2>
        <orders-table
                :data="gridData"
                :columns="gridColumns"
        >
        </orders-table>

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
import ordersTable from './components/orders-table';

    export default ({
        data() {
            return {
                searchQuery: '',
                gridColumns: [
                    'id',
                    'full name',
                    'email',
                    'ship to',
                    'coupon code',
                    'total cost',
                    'state',
                    'date'
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
        components: {
          ordersTable
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