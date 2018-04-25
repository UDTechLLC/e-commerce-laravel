window.Vue = require('vue');

/// global 
import Paginate from 'vuejs-paginate'
import VeeValidate from 'vee-validate';
import Notifications from 'vue-notification'
import velocity from 'velocity-animate'

Vue.use(VeeValidate);
Vue.use(Notifications);

Vue.use(Notifications, { velocity });

import tableVue from './vue/components/table';
import deleteComponent from './vue/components/delete';
import modal from './vue/components/modal';
import uploadImage from './vue/components/upload-image';

Vue.component('table-vue', tableVue);
Vue.component('paginate', Paginate);
Vue.component('delete', deleteComponent);
Vue.component('modal', modal);
Vue.component('uploadImage', uploadImage);

import productsIndex from './vue/pages/products/index';
import productsCreate from './vue/pages/products/create';
import productsEdit from './vue/pages/products/edit';
import productsOrder from './vue/pages/products/order';

import couponsIndex from './vue/pages/coupons/index';
import couponsCreate from './vue/pages/coupons/create';
import couponsEdit from './vue/pages/coupons/edit';

import usersIndex from './vue/pages/users/index';

import statistics from './vue/pages/statistics';

import orders from './vue/pages/orders';

import subscriptions from './vue/pages/subscriptions';

import timer from './vue/pages/timer/edit';

import deviceChart from './vue/pages/statistics/components/deviceCharts';

import blogCreate from './vue/pages/blog/create';

import bannerCreate from './vue/pages/banners/create'

require('./vue/mixins');

Vue.prototype.$EventBus = new Vue();

const app = new Vue({
    el: '#app',
    components: {
        productsIndex,
        productsCreate,
        productsEdit,
        productsOrder,
        couponsIndex,
        couponsCreate,
        couponsEdit,
        usersIndex,
        statistics,
        orders,
        subscriptions,
        timer,
        deviceChart,
        blogCreate,
        bannerCreate
    }
});