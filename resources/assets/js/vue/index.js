import VueLocalStorage from 'vue-localstorage';
import VeeValidate from 'vee-validate';
Vue.use(VueLocalStorage);
Vue.use(VeeValidate);

Vue.component('cart', require('./pages/cart'));
Vue.component('add-to-cart', require('./component/addToCart'));
Vue.component('mini-cart', require('./component/cart'));
Vue.component('checkout', require('./pages/checkout'));
Vue.component('add-to-cart-mobile', require('./component/addToCartMobile'));
Vue.component('modal-cart', require('./component/modal_cart'));
require('./mixins');

Vue.prototype.$EventBus = new Vue();

const app = new Vue({
  el: '#app',
  created() {
    if (!Vue.localStorage.get('hash')) {
      let hash = this.makeCardHash();
      Vue.localStorage.set('hash', hash);
    }
  }
});


