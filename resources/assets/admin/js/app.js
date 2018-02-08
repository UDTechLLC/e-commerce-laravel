window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */


window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
window.axios = require('axios');

window.Vue = require('vue');

require(`gentelella/vendors/fastclick/lib/fastclick.js`);
require(`gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js`);
require(`gentelella/vendors/iCheck/icheck.js`);

require(`gentelella/build/js/custom.js`);

/// global 
Vue.component('table-vue', require('./vue/components/table.vue'));

Vue.component('products-index', require('./vue/pages/products/index.vue'));

const app = new Vue({
    el: '#app',
    data: {
        
    }
});