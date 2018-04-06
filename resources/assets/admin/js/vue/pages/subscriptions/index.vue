<template>
    <div>
        <div class="container">
            <h2>Subscriptions</h2>
            <table class="table table-striped table-bordered bulk_action">
                <thead>
                <tr>
                    <th class="sorting_desc"
                        v-for="key in columns">
                        {{ key }}
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
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            subscribs: [],
            columns: [
                'id',
                'name',
                'plan',
                'status'
            ],
        }),
        created() {
            this.getSubscriptions();
        },
        methods: {
            getSubscriptions() {
                axios.get('/admin/subscriptions/getSubscriptions').then(
                        request => this.subscribs = request.data.data,
                        error => console.log('eroro')
                )
            }
        }
    })
</script>