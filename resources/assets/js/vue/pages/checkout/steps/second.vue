<template>
    <div>
        <div class="billing-address-info-block-wrapper">
            <div class="wrapper">
                <div class="billing-address-info-block billing-address-edit-block">
                    <div class="cart-header-block">
                        <h2 class="cart-heading">
                            Billing address
                        </h2>
                        <a class="edit-block-link" href="#">
                            Edit
                        </a>
                        <div class="clear"></div>
                    </div>
                    <div class="billing-user-info-block">
                        <span id="baCompName" class="billing-user-info">Company, </span>
                        <span id="baStreetAddress" class="billing-user-info">311 W 34TH ST, </span>
                        <span id="baTown" class="billing-user-info">New york </span>
                        <span id="baState" class="billing-user-info">NY </span>
                        <span id="baZipCode" class="billing-user-info">10001, </span>
                        <span id="baCountry" class="billing-user-info">United States</span>
                    </div>
                </div>
            </div>
        </div>
        <login></login>
        <div class="checkout-billing-details-block-wrapper">
            <div class="wrapper">
                <div class="checkout-billing-details-block">
                    <form class="checkout-billing-details-form" action="" name="checkout-billing-details" method="post">
                        <div class="checkout-title-block">
                            <h3 class="checkout-title">
                                <input id="shipToDifferentAddressCheckbox" class="form-checkbox-field"
                                       name="ship_to_different_address" value="1" type="checkbox" @change="show = !show" />
                                <label for="shipToDifferentAddressCheckbox" class="checkbox">
                                    Ship to a different address?
                                </label>
                            </h3>
                        </div>

                        <div class="billing-details-info-wrapper">
                            <div class="contacts-block-wrapper">
                                <transition name="fade">
                                <div class="contacts-block" v-if="show">
                                    <h4 class="contacts-block-title">
                                        Contacts
                                    </h4>
                                    <div class="form-field-wrapper">
                                        <label for="bdFirstName">
                                            First name
                                        </label>
                                        <input id="bdFirstName" class="form-field" name="bd_first_name" type="text" />
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdLastName">
                                            Last name
                                        </label>
                                        <input id="bdLastName" class="form-field" name="bd_last_name" type="text" />
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdCompName">
                                            Company Name
                                                    <span>
                                                                (optional)
                                                            </span>
                                        </label>
                                        <input id="bdCompName" class="form-field" name="bd_comp_name" type="text" />
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdEmail">
                                            Email address
                                        </label>
                                        <input id="bdEmail" class="form-field" name="bd_email" type="email" />
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdStreetAddress">
                                            Street address
                                        </label>
                                        <input id="bdStreetAddress" class="form-field" name="bd_street_address" type="text" placeholder="House number and street name" />
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdApartments">
                                            Apartment, suite, unit etc.
                                                    <span>
                                                                (optional)
                                                            </span>
                                        </label>
                                        <input id="bdApartments" class="form-field" name="bd_apartments" type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdCountry">
                                            Country
                                        </label>
                                        <!-- <input id="bdCountry" class="form-field" name="bd_country" type="text" /> -->
                                        <select id="bdCountry" class="form-field" name="bd_country">
                                            <option value="">Select a country...</option>
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
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdTownCity">
                                            Town / City
                                        </label>
                                        <input id="bdTownCity" class="form-field" name="bd_town_city" type="text" />
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdState">
                                            State / County
                                        </label>
                                        <input id="bdState" class="form-field" name="bd_state" type="text" />
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdZipCode">
                                            Postcode / ZIP
                                        </label>
                                        <input id="bdZipCode" class="form-field" name="bd_post_zip" type="text" />
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdPhone">
                                            Phone
                                        </label>
                                        <input id="bdPhone" class="form-field" name="bd_phone" type="text" />
                                    </div>
                                    <!--<div class="form-field-wrapper">
                                        <input id="bdCreateAccount" class="form-checkbox-field" name="bd_create_account" type="checkbox" />
                                        <label for="bdCreateAccount" class="checkbox">
                                            Create an account?
                                        </label>
                                    </div>
                                    <div class="create-account-block" style="display: none">
                                        <p>
                                            Create an account by entering the information below. If you are a returning customer please login at the top of the page.
                                        </p>
                                        <div class="form-field-wrapper">
                                            <label for="bdCreatePass">
                                                Create account password
                                            </label>
                                            <input id="bdCreatePass" class="form-field" name="bd_create_pass" type="text" placeholder="Password" />
                                        </div>
                                    </div>-->
                                </div>
                                </transition>
                            </div>
                            <cart-totals
                                    :products="products"
                                    :subTotal="subTotal"
                                    :total="total"
                                    :shipping="shipping"
                            ></cart-totals>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="back-button">
                                Back
                            </a>
                            <a href="#" class="continue-checkout">
                                Continue
                            </a>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">

    import cartTotals from './../components/cart-totals';
    import login from './../components/login';

    export default ({
        data: () => ({
            show: false
        }),
        components: {
            cartTotals,
            login
        },
        props: {
            products: Array,
            subTotal: String,
            total: Number,
            shipping: Number
        },
        mounted() {

        },
        methods: {

        }
    })

</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
</style>