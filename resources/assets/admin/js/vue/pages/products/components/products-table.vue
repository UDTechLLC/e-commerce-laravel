<template>
    <div>
        <table-vue
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery">
        </table-vue>
    </div>
</template>

<script>

    export default ({
        data() {
            return {
                searchQuery: '',
                /*gridColumns: [
                 'name', 'power', 'test'
                 ],*/
                gridColumns: {
                    id: 'id',
                    name: 'name',
                    email: 'email'
                },

                gridData: [
                    { f_name: 'Chuck Norris', g_power: Infinity, t_test: 'AAAaa' },
                    { f_name: 'Bruce Lee', g_power: 9000 },
                    { f_name: 'Jackie Chan', g_power: 7000 },
                    { f_name: 'Jet Li', g_power: 8000 }
                ]
            }
        },

        mounted() {
            this.getProducts();
        },
        methods: {
            getProducts() {
               axios.get('/admin/getProducts').then(
                       response => this.gridData = response.data,
                        error => console.log('errors')

            )

            }
        }
    })

</script>