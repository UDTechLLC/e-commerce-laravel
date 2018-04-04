<template>
    <table class="table table-striped table-bordered bulk_action">
        <thead>
        <tr>
            <th class="sorting_desc"
                v-for="key in columns">
                {{ key | capitalize }}
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
        props: {
            data: Array,
            columns: Array
        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        }
    })
</script>