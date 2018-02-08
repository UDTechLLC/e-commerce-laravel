<template>
    <table class="table table-striped table-bordered bulk_action">
        <thead>
        <tr>
            <th class="sorting_desc"
                v-for="key in columns"
                @click="sortBy(key)"
                :class="{ active: sortKey == key }">
                {{ key | capitalize }}
          <span v-if="sortOrders[key] > 0">
              <i class="fa fa-sort-amount-asc"></i>
          </span>
          <span v-else>
              <i class="fa fa-sort-amount-desc"></i>
          </span>

            </th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="entry in filteredData">
            <td v-for="(key, index) in columns">
                {{entry[index]}}
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>

    export default ({
        props: {
            data: Array,
            columns: Object,
            filterKey: String
        },
        data() {
            let sortOrders = {};
            for (let key in this.columns) {
                sortOrders[this.columns[key]] = 1;
                console.log(sortOrders);
            }
            return {
                sortKey: '',
                sortOrders: sortOrders
            }
        },
        computed: {
            filteredData() {
                let sortKey = this.sortKey;
                let filterKey = this.filterKey && this.filterKey.toLowerCase();
                let order = this.sortOrders[sortKey] || 1;
                let data = this.data;
                if (filterKey) {
                    data = data.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                        })
                    })
                }
                if (sortKey) {
                    data = data.slice().sort(function (a, b) {
                        a = a[sortKey];
                        b = b[sortKey];
                        return (a === b ? 0 : a > b ? 1 : -1) * order
                    })
                }
                return data
            }
        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },
        methods: {
            sortBy: function (key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1
            }
        }
    })

</script>