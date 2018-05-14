// initial state

const state = {
  products: [],
  countItems: 0,
  subTotal: 0,
  discount: 0,
  isShipping: false,
  isSubscribe: false,
  cartId: 0,
  coupon: ""
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
  },
  discount: state => {
    return state.discount
  },
  isShipping: state => {
    return state.isShipping
  },
  isSubscribe: state => {
    return state.isSubscribe
  },
  cartId: state => {
    return state.cartId
  },
  coupon: state => {
    return state.coupon
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
  },
  updatePlan(context, params) {
    let data = {
      hash: Vue.localStorage.get('hash'),
      days: params[1]
    };

    axios.put(`/api/carts/products/update/${params[0]}/subscribe/period`, data).then(
      response => {
        this.commit('updateState', response);
      },
      error => console.log('error')
    )
  }
};

// mutations
const mutations = {
  updateState(state, responseApi) {
    state.products = responseApi.data.data.products.data;
    state.countItems = responseApi.data.data.sum.products_counts;
    state.subTotal = responseApi.data.data.sum.products_sum;
    state.discount = responseApi.data.data.sum.discount_sum;
    state.isShipping = responseApi.data.data.isShipping;
    state.isSubscribe = responseApi.data.data.isSubscribe;
    state.cartId = responseApi.data.data.id;
    state.coupon = responseApi.data.data.coupon;
  },
  updateCoupon (state, value) {
    state.coupon = value
  }
};

export default {
  state,
  getters,
  actions,
  mutations
}