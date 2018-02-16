
Vue.component('cart', require('./pages/cart'));
Vue.component('add-to-card', require('./component/addToCart'));

require ('./mixins');

Vue.prototype.$EventBus = new Vue();

const app = new Vue({
  el: '#app',
  created() {
    this.$EventBus.$on('test', this.clickHandler);
  },
  methods: {
    clickHandler() {
      console.log('Event Bus')
    }
  }
});


