<template>
    <div>
        <div class="billing-address-info-block-wrapper">
            <div class="wrapper">
                <div class="billing-address-info-block billing-address-edit-block">
                    <div class="cart-header-block">
                        <h2 class="cart-heading">
                            Billing address
                        </h2>
                        <a class="edit-block-link" href="#" @click.prevent="editBilling">
                            Edit
                        </a>
                        <div class="clear"></div>
                    </div>
                    <div class="billing-user-info-block">
                        <span id="baCompName" v-if="billing.company" class="billing-user-info">{{ billing.company}}, </span>
                        <span id="baStreetAddress" v-if="billing.street" class="billing-user-info">{{ billing.street }}, </span>
                        <span id="baTown" v-if="billing.city" class="billing-user-info"> {{ billing.city }} </span>
                        <span id="baState" v-if="billing.state" class="billing-user-info"> {{billing.state }} </span>
                        <span id="baZipCode" v-if="billing.postcode" class="billing-user-info"> {{ billing.postcode }}, </span>
                        <span id="baCountry" v-if="billing.country" class="billing-user-info"> {{ billing.country.name }} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">

    export default ({
        data: () => ({

        }),
        props: {
            billing: Object
        },
        methods: {
            editBilling() {
                this.$parent.$emit('editBilling');
            }
        }
    })

</script>