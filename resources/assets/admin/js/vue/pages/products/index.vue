<template>
    <div>
        <h3>Products</h3>
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Products list <small>different icon design elements</small></h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="/admin/products/create">
                            <button class="btn btn-sm btn-success btn-block">
                                <i class="fa fa-plus"></i> Add product
                            </button>
                        </a>
                        <a href="/admin/products/order">
                            <button class="btn btn-sm btn-primary btn-block">
                                <i class="fa fa-sort-amount-asc"></i> Products placement
                            </button>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <products-table></products-table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    import productsTable from './components/products-table.vue';

    export default({
        components: {
            productsTable
        }
    })

</script>