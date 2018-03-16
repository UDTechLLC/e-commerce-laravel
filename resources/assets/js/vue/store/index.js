import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({

  state: {
    products: [],
    countItems: 0,
    subTotal: 0
  },

  getters: {
    products: state => {
      return state.products
    },
    countItems: state => {
      return state.countItems
    },
    subTotal: state => {
      return state.subTotal
    }
  },
  
  actions: {
    test (context, productSlug) {
      this.commit('addedProduct', productSlug)
    }
  },
  
  mutations: {
    getProducts(state) {
      axios.get(`/api/carts/products?hash=${Vue.localStorage.get('hash')}`).then(
        response => {
          state.products = response.data.data.products.data;
          state.countItems = response.data.data.sum.products_counts;
          state.subTotal = response.data.data.sum.with_discount_sum;
        },
        error => console.log('error')
      )
    },

    addedProduct(state, productSlug) {

      let data = {
        hash: Vue.localStorage.get('hash')
      };
      axios.post(`/api/carts/products/add/${productSlug}`, data).then(
        response => {
          state.products = response.data.data.products.data;
          state.countItems = response.data.data.sum.products_counts;
          state.subTotal = response.data.data.sum.with_discount_sum;
        },
        error => console.log('error')
      );
    }
  }

})
