<template>
    <ul class="shipping-user-info__list">
        <li class="shipping-user-info__item">
                                        <span class="label">
                                            Subtotal:
                                        </span>
            <span class="content">
                                            ${{ subTotal }}
                                        </span>
        </li>
        <li class="shipping-user-info__item" v-if="discount != '0.00'">
                                        <span class="label">
                                            Coupon: {{ coupon }}
                                        </span>
            <span class="content">
                                            -${{ discount  }}
                                        </span>
        </li>
        <li class="shipping-user-info__item" v-if="isShipping">
                                        <span class="label">
                                            Shipping Flat rate:
                                        </span>
            <span class="content">
                                            ${{ shipping }}
                                        </span>
        </li>
        <li class="shipping-user-info__item">
                                        <span class="label">
                                            Total:
                                        </span>
            <span class="content">
                                            ${{ total }}
                                        </span>
        </li>
    </ul>
</template>
<script type="text/babel">
  import {mapGetters} from 'vuex'

  export default ({
    props: {
      shipping: String
    },
    computed: {
      ...mapGetters([
        'products',
        'subTotal',
        'discount',
        'isShipping',
        'coupon'
      ]),
      total() {
        return (Number(this.subTotal) + Number(this.shipping)).toFixed(2);
      }
    }
  })
</script>