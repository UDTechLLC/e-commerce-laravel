<template>
    <div>
        <div class="title_right">

            <div class="form-group col-md-4 col-sm-3 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Search field</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="select2_single form-control" v-model="searchField" tabindex="-1">
                        <option></option>
                        <option v-for="item in searchFields">{{ item }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                <input type="text" id="search" v-model="searchQuery" @keyup.enter="getUsers"
                       class="form-control" placeholder="Search for...">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                <button class="btn btn-success" @click="getUsers">Go</button>
                <button class="btn btn-warning" @click="clear">Clear</button>
            </div>

        </div>
        <table-vue
                @sort="sort"
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery"
                :actionField="actionField">
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
                searchField: '',
                searchFields: [
                    'id',
                    'name',
                    'email'
                ],
                actionField: true,
                gridColumns: [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone'
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
            this.getUsers();
        },
        methods: {
            getUsers() {
                let url = `/admin/users/list?page=${this.pagination.currentPage}&sortType=${this.sortParam.type}&sortField=${this.sortParam.field}&searchField=${this.searchField}&searchValue=${this.searchQuery}`;
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
                this.getUsers();
            },
            sort(sortParam) {
                this.sortParam = sortParam;
                this.getUsers();
            },
            clear() {
                this.searchField = '';
                this.searchQuery = '';
                this.getUsers()
            }
        }
    })

</script>