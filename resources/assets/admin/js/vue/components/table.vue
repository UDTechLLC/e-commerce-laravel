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
            <th v-if="actionField">Action</th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="entry in data">
            <td v-for="key in columns" v-html="entry[key]">
i
            </td>
            <td v-if="actionField">
                <a href="/ss" v-if="entry.action.edit"><i class="fa fa-edit"></i></a>
                <delete
                        message="FSFSF"
                        url="/"
                        redirect="String"
                ></delete>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>

    export default ({
        props: {
            data: Array,
            columns: Array,
            filterKey: String,
            actionField: Boolean
        },
        data() {
            let sortOrders = {};
            this.columns.forEach(function (key) {
                sortOrders[key] = 1
            });
            /*for (let key in this.columns) {
                sortOrders[this.columns[key]] = 1;
                console.log(sortOrders);
            }*/
            return {
                sortKey: '',
                sortOrders: sortOrders
            }
        },
        computed: {

        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },
        methods: {
            sortBy: function (key) {
                this.sortOrders[key] = this.sortOrders[key] * -1;
                let sort = {
                    field: key,
                    type: this.sortOrders[key] == -1 ? 'DESC' : 'ASC'
                };
                this.$emit('sort', sort);
                this.sortKey = key;

            }
        }
    })

</script>

<style scoped>
    th {
        cursor: pointer;
    }
</style>