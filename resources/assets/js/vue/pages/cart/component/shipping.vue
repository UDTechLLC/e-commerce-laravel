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
                        <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state">
                            <option value="">Select a country…</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                        </select>
                        <div class="select-arrow" style="height: 36px; width: 36px; line-height: 36px;"></div>
                    </div>
                </div>
                <div class="cart-form-field-wrapper left-wrapper">
                    <input class="cart-form-field" value="" placeholder="State / county" name="calc_shipping_state" id="calc_shipping_state" type="text" />
                </div>
                <div class="cart-form-field-wrapper right-wrapper">
                    <input class="cart-form-field" value="" placeholder="Postcode / ZIP" name="calc_shipping_postcode" id="calc_shipping_postcode" type="text" />
                </div>
                <div class="clear"></div>
                <p class="shiping-button-wrapper">
                    <button type="submit" name="calc_shipping"
                            @click.prevent="updateShipping"
                            value="1" class="shiping-update-button">Update totals</button>
                </p>
            </div>
        </form>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({
            countries: []
        }),
        created() {
            this.getCountries();
        },
        methods: {
            getCountries() {
                console.log('Country');
            },
            updateShipping() {
                console.log('update')
            }
        }
    });
</script>