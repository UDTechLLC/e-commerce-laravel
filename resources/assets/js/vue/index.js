import VueLocalStorage from 'vue-localstorage';
Vue.use(VueLocalStorage);

Vue.component('cart', require('./pages/cart'));
Vue.component('add-to-card', require('./component/addToCart'));

require('./mixins');

Vue.prototype.$EventBus = new Vue();

const app = new Vue({
  el: '#app',
  created() {
    if (!Vue.localStorage.get('hash')) {
      let hash = this.makeCardHash();
      Vue.localStorage.set('hash', hash);
    }

    this.$EventBus.$on('test', this.clickHandler);
  },
  methods: {
    clickHandler() {
      console.log('Event Bus')
    }
  }
});


