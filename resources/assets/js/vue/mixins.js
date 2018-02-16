Vue.mixin({
  methods: {
    addProduct() {
      this.$EventBus.$emit('test');
      console.log('added');
    },
    deleteProduct() {
      console.log('delete')
    }
  }
});
