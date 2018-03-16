Vue.mixin({
  methods: {
    addProduct(productSlug, productBundleSlug = null) {
      this.addedToCart = true;
      this.$store.dispatch('addProduct', productSlug, productBundleSlug);
    },

    getProducts() {
      axios.get(`/api/carts/products?hash=${Vue.localStorage.get('hash')}`).then(
        response => {
          this.products = response.data.data.products.data;
          this.isShipping = response.data.data.isShipping;
          this.countItems = response.data.data.sum.products_counts;
          this.subTotal = response.data.data.sum.with_discount_sum;
          this.discount = response.data.data.sum.discount_sum;
          this.cartId = response.data.data.id;
          this.coupon = response.data.data.coupon;
          this.isSubscribe = response.data.data.isSubscribe;
        },
        error => console.log('error')
      )
    },

    updateProducts(response) {
      this.products = response.data.data.products.data;
      this.countItems = response.data.data.sum.products_counts;
      this.subTotal = response.data.data.sum.with_discount_sum;
      this.discount = response.data.data.sum.discount_sum;
      this.isShipping = response.data.data.isShipping;
      this.shipping = this.isShipping ? this.shipping : 0;
      this.coupon = response.data.data.coupon;
    },

    deleteProduct(slug) {
      this.$store.dispatch('deleteProduct', slug);
    },
  }
});
