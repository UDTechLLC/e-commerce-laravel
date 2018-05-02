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
            subscribs: [],
            columns: [
                'id',
                'subscription',
                'plan',
                'user name',
                'user email',
                'user phone',
                'start date',
                'next payment',
                'status'
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
                axios.get(`/admin/subscriptions/getSubscriptions?page=${this.pagination.currentPage}`).then(
                        response => {
                            this.subscribs = response.data.data;
                            this.pagination.totalPage = response.data.meta.pagination.total_pages;
                        },
                            error => console.log('eroro')

                )
            },
            clickCallback(page) {
                this.pagination.currentPage = page;
                this.getSubscriptions();
            }
        }
    })
</script>