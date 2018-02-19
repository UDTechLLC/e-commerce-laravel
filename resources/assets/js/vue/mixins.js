Vue.mixin({
  methods: {

    addProduct(productSlug) {
      this.$EventBus.$emit('test');
      let data = {
        hash: Vue.localStorage.get('hash')
      };
      axios.post(`/api/carts/products/add/${productSlug}`, data).then(
        response => {
          this.$EventBus.$emit('updateProduct', response.data.data.products.data);
          this.addedToCart = true;
        },
        error => console.log('error')
      )
    },

    getProducts() {
      axios.get(`/api/carts/products?hash=${Vue.localStorage.get('hash')}`).then(
        response => {
          this.products = response.data.data.products.data;
          this.countItems = this.products.length;
        },
        error => console.log('error')
      )
    },

    updateProducts(products) {
      console.log("update => " + products);
      this.products = products
    },

    makeCardHash() {
      var text = "";
      var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (var i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    }
  }
});
