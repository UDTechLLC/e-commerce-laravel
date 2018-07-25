<template>
    <div>
        <h3>Challenges</h3>
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Challenges list </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="(entry, index) in challenges">
                            <td>
                               {{ entry.id }}
                            </td>
                            <td>
                                {{ entry.title }}
                            </td>
                            <td>
                                <a :href="'/admin/challenges/edit/' + entry.id" class="item-edit"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script type="text/babel">

    export default({
        props: {
            challenges: Array
        }
    })

</script>