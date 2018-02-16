Vue.mixin({
  methods: {
    addProduct(productId) {
      this.$EventBus.$emit('test');
      let data = {
        product_id: productId,
        hash: Vue.localStorage.get('hash')
      };
      axios.post('/api/carts/products/store', data).then(
        response => console.log('as'),
        error => console.log('error')
      )
    },
    deleteProduct() {
      console.log('delete')
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
