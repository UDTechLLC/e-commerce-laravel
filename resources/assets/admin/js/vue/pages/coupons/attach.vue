<template>
    <div>
        <h3>Coupons</h3>
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Coupons list </h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="/admin/coupons/create">
                            <button class="btn btn-sm btn-success btn-block">
                                <i class="fa fa-plus"></i> Add coupons
                            </button>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <coupons-table></coupons-table>
                </div>
            </div>
        </div>

    </div>
</template >

<script type="text/babel">

    import couponsTable from './components/coupons-table.vue';

    export default({
        components: {
            'coupons-table': couponsTable
        }
    })

</script>