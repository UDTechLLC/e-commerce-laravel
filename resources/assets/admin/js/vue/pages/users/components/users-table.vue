<template>
    <div>
        <table-vue
                @sort="sort"
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery"
                :actionField="actionField">
        </table-vue>

        <div v-if="pagination.totalPage > 1">
            <paginate
                    :pageCount="pagination.totalPage"
                    :containerClass="'pagination'"
                    :clickHandler="clickCallback">
            </paginate>
        </div>

    </div>
</template>

