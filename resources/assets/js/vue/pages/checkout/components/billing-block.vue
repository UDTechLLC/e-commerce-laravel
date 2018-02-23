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
                        <span id="baCompName" class="billing-user-info">{{ billing.company}}, </span>
                        <span id="baStreetAddress" class="billing-user-info">{{ billing.street }}, </span>
                        <span id="baTown" class="billing-user-info"> {{ billing.city }} </span>
                        <span id="baState" class="billing-user-info"> {{billing.state }} </span>
                        <span id="baZipCode" class="billing-user-info"> {{ billing.postcode }}, </span>
                        <span id="baCountry" class="billing-user-info"> {{ billing.country }} </span>
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
                let data = {
                    step: 'first',
                    progress: 1
                };
                this.$parent.$emit('back', data);
            }
        }
    })

</script>