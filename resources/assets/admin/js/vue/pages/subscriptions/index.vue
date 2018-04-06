<template>
    <div>
        <div class="container">
            <h2>Orders {{ msg }}</h2>
            <table class="table table-striped table-bordered bulk_action">
                <!--<thead>
                <tr>
                    <th class="sorting_desc"
                        v-for="key in columns">
                        {{ key | capitalize }}
                    </th>
                </tr>
                </thead>-->

                <!--<tbody>
                <tr v-for="(entry, index) in data">
                    <td v-for="key in columns" v-html="entry[key]">

                    </td>
                </tr>
                </tbody>-->
            </table>
        </div>
    </div>
</template>
<script type="text/babel">
    export default ({
        data:() => ({
           msg: "Hello"
        }),
        created() {
            this.getSubscriptions();
        },
        methods: {
            getSubscriptions() {
                console.log('Get Content')
            }
        }
    })
</script>