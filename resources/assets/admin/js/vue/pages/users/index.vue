<template>
    <div>
        <h3>Users</h3>
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User list</h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="/admin/users/create">
                            <button class="btn btn-sm btn-success btn-block">
                                <i class="fa fa-plus"></i> Add user
                            </button>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <users-table></users-table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>

    import usersTable from './components/users-table.vue';

    export default({
        components: {
            'users-table': usersTable
        }
    })

</script>