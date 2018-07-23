<template>
    <div>
        <div class="container">
            <h2>Subscriptions</h2>
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
                    <input type="text" id="search" v-model="searchQuery" @keyup.enter="getSubscriptions"
                           class="form-control" placeholder="Search for...">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                    <button class="btn btn-success" @click="getSubscriptions">Go</button>
                    <button class="btn btn-warning" @click="clear">Clear</button>
                </div>

            </div>
            <table class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th class="sorting_desc"
                        v-for="key in columns"
                        :class="{cursorPointer: sortItems.hasOwnProperty(key) }"
                        @click="sortBy(key)"
                    >
                        {{ key }}
                        <span v-if="sortItems.hasOwnProperty(key)">
                        <span v-if="sortItems[key] > 0">
                              <i class="fa fa-sort-amount-asc"></i>
                          </span>
                          <span v-else>
                              <i class="fa fa-sort-amount-desc"></i>
                            </span>
                        </span>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="(entry, index) in subscribs">
                    <td v-for="key in columns" v-html="entry[key]">

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
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
        data: () => ({
            searchQuery: '',
            searchField: '',
            searchFields: [
                'id',
                'name',
                'email'
            ],
            sortKey: '',
            sortItems: {
                'id' : 1,
                'start date': 1,
                'status': 1
            },
            sortParam: {
                field: 'id',
                type: 'asc'
            },
            subscribs: [],
            columns: [
                'id',
                'user name',
                'user email',
                'user phone',
                'period',
                'price',
                'start date',
                'next payment',
                'last order date',
                'status',
            ],
            pagination: {
                totalPage: 1,
                currentPage: 1
            },
        }),
        created() {
            this.getSubscriptions();
        },
        methods: {
            getSubscriptions() {
                let url = `/admin/subscriptions/custom/getSubscriptions?page=${this.pagination.currentPage}&sortType=${this.sortParam.type}&sortField=${this.sortParam.field}&searchField=${this.searchField}&searchValue=${this.searchQuery}`;
                axios.get(url).then(
                    response => {
                        this.subscribs = response.data.data;
                        this.pagination.totalPage = response.data.meta.pagination.total_pages;
                    },
                    error => console.log('error')

                )
            },
            clickCallback(page) {
                this.pagination.currentPage = page;
                this.getSubscriptions();
            },
            clear() {
                this.searchField = '';
                this.searchQuery = '';
                this.getSubscriptions()
            },
            sortBy (key) {
                if (this.sortItems.hasOwnProperty(key)) {
                    this.sortItems[key] = this.sortItems[key] * -1;

                    this.sortParam.field = key;
                    if ('start date') this.sortParam.field = 'created_at';

                    this.sortParam.type = this.sortItems[key] == -1 ? 'DESC' : 'ASC';

                    this.getSubscriptions();
                }
            }
        }
    })
</script>
