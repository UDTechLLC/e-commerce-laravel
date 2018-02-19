import VueLocalStorage from 'vue-localstorage';
Vue.use(VueLocalStorage);

Vue.component('cart', require('./pages/cart'));
Vue.component('add-to-cart', require('./component/addToCart'));
Vue.component('mini-cart', require('./component/cart'));

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


