<template>
    <table class="table table-striped table-bordered bulk_action">
        <thead>
        <tr>
            <th class="sorting_desc"
                v-for="key in columns"
                @click="sortBy(key)"
                :class="{ active: sort.key == key, cursorPointer: key == 'id' }">
                {{ key | capitalize }}
                <span v-if="key == 'id' && sortStatus > 0 ">
                    <i class="fa fa-sort-amount-asc"></i>
                </span>
                <span v-if="key == 'id' && sortStatus < 0">
                    <i class="fa fa-sort-amount-desc"></i>
                </span>
            </th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="(entry, index) in data">
            <td v-for="key in columns" v-html="entry[key]">

            </td>
        </tr>
        </tbody>
    </table>
</template>
<script type="text/babel">
    export default({
        data: () => ({
            sortStatus: 1,
            sort: {
                key: 'id',
                type: 1
            }
        }),
        props: {
            data: Array,
            columns: Array
        },
        filters: {
            capitalize(str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },
        methods: {
            sortBy(key) {
                if(key == 'id') {
                    this.sortStatus = this.sortStatus * -1;
                    this.sort.type = this.sortStatus == -1 ? 'DESC' : 'ASC';
                    this.sort.key = key;
                    this.$emit('sort', this.sort);
                }
            }
        }
    })
</script>
<style scoped>
    .cursorPointer {
        cursor: pointer;
    }
</style>