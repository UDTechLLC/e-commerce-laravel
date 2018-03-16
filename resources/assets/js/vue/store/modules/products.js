// initial state

const state = {
  products: [],
  countItems: 0,
  subTotal: 0
};

// getters
const getters = {
  products: state => {
    return state.products
  },
  countItems: state => {
    return state.countItems
  },
  subTotal: state => {
    return state.subTotal
  }
};

// actions
const actions = {
  getProducts(context) {
    axios.get(`/api/carts/products?hash=${Vue.localStorage.get('hash')}`).then(
      response => this.commit('updateState', response),
      error => console.log('error')
    )
  },

  deleteProduct(context, productSlug) {
    axios.delete(`/api/carts/products/remove/${productSlug}?hash=${Vue.localStorage.get('hash')}`).then(
      response => this.commit('updateState', response),
      error => console.log('error')
    )
  },

  addProduct(context, productSlug, productBundleSlug) {
    let data = {
      hash: Vue.localStorage.get('hash')
    };
    axios.post(`/api/carts/products/add/${productSlug}`, data).then(
      response => {
        this.commit('updateState', response);
        //this.addedToCart = true;
      },
      error => console.log('error')
    );

    if (productBundleSlug != null) {
      axios.post(`/api/carts/products/add/${productBundleSlug}`, data).then(
        response => {
          this.commit('updateState', response);
          //this.addedToCart = true;
        },
        error => console.log('error')
      )
    }
  }
};

// mutations
const mutations = {
  updateState(state, responseApi) {
    state.products = responseApi.data.data.products.data;
    state.countItems = responseApi.data.data.sum.products_counts;
    state.subTotal = responseApi.data.data.sum.with_discount_sum;
  }
};

export default {
  state,
  getters,
  actions,
  mutations
}