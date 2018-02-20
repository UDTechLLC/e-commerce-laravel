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
                                v-model="selectedCountry" @change="getCountries">
                            <option value="">Select a country…</option>
                            <option value="" v-for="country in countries" :value="country" >{{ country }}</option>
                        </select>
                        <div class="select-arrow" style="height: 36px; width: 36px; line-height: 36px;"></div>
                    </div>
                </div>
                <div class="cart-form-field-wrapper left-wrapper">
                    <div v-if="states.length == 0">
                    <input class="cart-form-field" value="" placeholder="State / county" name="calc_shipping_state"
                           id="calc_shipping_state" type="text"/>
                    </div>
                    <div class="cart-form-row" v-else>
                        <div class="shiping-select-wrapper">
                            <select name="calc_shipping_country" class="country_to_state"
                                    v-model="selectedState">
                                <option value="">Select a option…</option>
                                <option value="" v-for="state in states" :value="state" >{{ state }}</option>
                            </select>
                            <div class="select-arrow" style="height: 36px; width: 36px; line-height: 36px;"></div>
                        </div>
                    </div>
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
            countries: [],
            states: [],
            selectedCountry: '',
            selectedState: ''
        }),
        created() {
            this.getCountries();
        },
        methods: {
            getCountries() {
                axios.get(`/api/countries?country=${this.selectedCountry}`).then(
                        response => {
                            this.countries = response.data.countries;
                            this.selectedCountry = response.data.selected;
                            this.states = response.data.states;
                            this.$EventBus.$emit('updateShipping', response.data.shipping);
                        },
                        error => console.log('error')
                )
            },
            updateShipping() {
                console.log('update')
            }
        }
    });
</script>