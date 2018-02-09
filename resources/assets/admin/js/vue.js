window.Vue = require('vue');

/// global 
import Paginate from 'vuejs-paginate'
Vue.component('table-vue', require('./vue/components/table'));
Vue.component('paginate', Paginate);
Vue.component('delete', require('./vue/components/delete'));
Vue.component('modal', require('./vue/components/modal.vue'));

Vue.component('products-index', require('./vue/pages/products/index.vue'));

const app = new Vue({
    el: '#app',
});