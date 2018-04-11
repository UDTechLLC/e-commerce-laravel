<template>
    <div>
        <div class="container">
            <h2>Orders</h2>
            <div class="title_right">

                <div class="form-group col-md-4 col-sm-3 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Search field</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" v-model="searchField" tabindex="-1">
                            <option></option>
                            <option v-for="item in searchFields">{{item}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                    <input type="text" id="search" v-model="searchQuery" @keyup.enter="getOrders"
                           class="form-control" placeholder="Search for...">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                    <button class="btn btn-success" @click="getOrders">Go</button>
                    <button class="btn btn-warning" @click="clearFilter">Clear filter</button>
                </div>
                <div class="form-group col-md-4 col-sm-3 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Filter Status</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" v-model="state" tabindex="-1" @change="getOrders">
                            <option></option>
                            <option v-for="item in states">{{item}}</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
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
                states: [],
                searchQuery: '',
                searchField: '',
                searchFields: [
                    'id', 'email', 'name'
                ],
                state: "",
                gridColumns: [
                    'id',
                    'order id',
                    'user name',
                    'email',
                    'ship to',
                    'coupon code',
                    'total cost',
                    'status',
                    'date'
                ],
                gridData: [],
                pagination: {
                    totalPage: 1,
                    currentPage: 1
                },
                /* sortParam: {
                 field: 'id',
                 type: 'asc'
                 }*/
            }
        },
        props: {
            statesProps: String
        },
        created() {
            this.states = JSON.parse(this.statesProps);
        },
        components: {
            ordersTable
        },
        mounted() {
            this.getOrders();
        },
        methods: {
            getOrders() {
                let url = `/admin/orders/filters?page=${this.pagination.currentPage}&searchField=${this.searchField}&searchValue=${this.searchQuery}&filterField=state&filterValue=${this.state}`;
                axios.get(url).then(
                        response => {
                            this.gridData = response.data.data;
                            this.pagination.totalPage = response.data.meta.last_page;
                        },
                        error => console.log('errors')
                )
            },
            clearFilter() {
                this.searchQuery = '';
                this.searchField = '';
                this.state = "";
                this.getOrders();
            },
            clickCallback(page) {
                this.pagination.currentPage = page;
                this.getOrders();
            }
        }
    })
</script>
<style scoped lang="scss">

    .control-label {
        margin: 0;
    }

    #search {
        border: solid 1px #dddddd;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
    }

</style>