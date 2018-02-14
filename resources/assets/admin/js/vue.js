window.Vue = require('vue');

/// global 
import Paginate from 'vuejs-paginate'
import VeeValidate from 'vee-validate';
import Notifications from 'vue-notification'
import velocity from 'velocity-animate'

Vue.use(VeeValidate);
Vue.use(Notifications);

Vue.use(Notifications, { velocity });

Vue.component('table-vue', require('./vue/components/table'));
Vue.component('paginate', Paginate);
Vue.component('delete', require('./vue/components/delete'));
Vue.component('modal', require('./vue/components/modal'));
Vue.component('upload-image', require('./vue/components/upload-image'));

Vue.component('products-index', require('./vue/pages/products/index'));
Vue.component('products-create', require('./vue/pages/products/create.vue'));
Vue.component('products-edit', require('./vue/pages/products/edit.vue'));

Vue.component('users-index', require('./vue/pages/users/index'));


require('./vue/mixins');


const app = new Vue({
    el: '#app',
});