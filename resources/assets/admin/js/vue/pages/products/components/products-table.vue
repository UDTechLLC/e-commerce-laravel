<template>
    <div>
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
                actionField: true,
                gridColumns: [
                    'id',
                    'title',
                    'slug',
                    'description'
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
            this.getProducts();
        },
        methods: {
            getProducts() {
                let url = `/admin/products/list?page=${this.pagination.currentPage}&sortType=${this.sortParam.type}&sortField=${this.sortParam.field}`;
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
                this.getProducts();
            },
            sort(sortParam) {
                this.sortParam = sortParam;
                this.getProducts();
            }
        }
    })

</script>