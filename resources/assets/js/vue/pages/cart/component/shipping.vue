<template>
    <div class="culculate-shiping-block-wrapper">
        <div class="cart-header-block">
            <h2 class="cart-heading">
                Calculate shipping
            </h2>
        </div>
        <form class="culculate-shiping-form" action="" name="" method="post">
            <div class="culculate-shiping-form-block">
                <div class="cart-form-row">
                    <div class="shiping-select-wrapper">
                        <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state"
                                v-model="selectedCountry" @change="getState">
                            <option value="" v-for="country in countries" :value="country" >{{ country }}</option>
                        </select>
                        <div class="select-arrow" style="height: 36px; width: 36px; line-height: 36px;"></div>
                    </div>
                </div>
                <div class="cart-form-field-wrapper left-wrapper">
                    <input class="cart-form-field" value="" placeholder="State / county" name="calc_shipping_state"
                           id="calc_shipping_state" type="text"/>
                </div>
                <div class="cart-form-field-wrapper right-wrapper">
                    <input class="cart-form-field" value="" placeholder="Postcode / ZIP" name="calc_shipping_postcode"
                           id="calc_shipping_postcode" type="text"/>
                </div>
                <div class="clear"></div>
                <p class="shiping-button-wrapper">
                    <button type="submit" name="calc_shipping"
                            @click.prevent="updateShipping"
                            value="1" class="shiping-update-button">Update totals
                    </button>
                </p>
            </div>
        </form>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            selected: "",
            countries: [],
            selectedCountry: ''
        }),
        created() {
            this.getCountries();
        },
        methods: {
            getCountries() {
                axios.get('/api/countries').then(
                        response => {
                            this.countries = response.data.countries;
                            this.selectedCountry = response.data.default
                        },
                        error => console.log('error')
                )
            },
            getState() {

            },
            updateShipping() {
                console.log('update')
            }
        }
    });
</script>