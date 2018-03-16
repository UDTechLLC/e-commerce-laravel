import VueLocalStorage from 'vue-localstorage';
import VeeValidate from 'vee-validate';
Vue.use(VueLocalStorage);
Vue.use(VeeValidate);

import miniCart from './component/cart';
import modalCart from './component/modal_cart';
import cart from './pages/cart';
import addToCart from './component/addToCart';
import checkout from './pages/checkout';
import addToCartMobile from  './component/addToCartMobile';
import shedfatMaxx from './pages/products/shedfat-maxx';

Vue.component('add-to-cart', addToCart);

import store from './store';

//require('./mixins');
Vue.prototype.$EventBus = new Vue();

import testComponent from './test';
Vue.component('test-component', testComponent);

const app = new Vue({
  el: '#app',
  store,
  data: {
    products: store.state.products
  },
  components: {
    miniCart,
    modalCart,
    cart,
    checkout,
    addToCartMobile,
    shedfatMaxx
},
  created() {
    store.commit('getProducts');
    
    if (!Vue.localStorage.get('hash')) {
      let hash = this.makeCardHash();
      Vue.localStorage.set('hash', hash);
    }
  }
});


