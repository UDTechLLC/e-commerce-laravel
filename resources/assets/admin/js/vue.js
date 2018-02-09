window.Vue = require('vue');

/// global 
Vue.component('table-vue', require('./vue/components/table.vue'));

Vue.component('products-index', require('./vue/pages/products/index.vue'));

const app = new Vue({
    el: '#app',
    data: {

    }
});