<template>
    <div>
        <div class="customer-login-block-wrapper">
            <div class="wrapper">
                <div class="customer-login-block">
                    <div class="customer-login-info">
                        Returning customer?
                        <a class="showlogin" href="#">
                            Click here to login
                        </a>
                    </div>
                    <form class="customer-login-form" style="display: none" name="customer_login_form" action=""
                          method="post">
                        <p>
                            If you have shopped with us before, please enter your details in the boxes below. If you are
                            a new customer, please proceed to the Billing & Shipping section.
                        </p>
                        <div class="form-field-wrapper">
                            <label for="">
                                Username or email
                                <span class="required">*</span>
                            </label>
                            <input class="form-field" type="text"/>
                        </div>
                        <div class="form-field-wrapper">
                            <label for="">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input class="form-field" type="password"/>
                        </div>
                        <div class="clear"></div>
                        <div class="form-submit-wrapper">
                            <input class="login-button button" name="login" value="Login" type="submit"/>
                            <label class="rememberme-wrapper">
                                <input class="remember-me-checkbox" name="rememberme" id="rememberme" value="forever"
                                       type="checkbox"/>
                                <span>Remember me</span>
                            </label>
                        </div>
                        <div class="lost-password-wrapper">
                            <a href="#">Lost your password?</a>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="checkout-billing-details-block-wrapper">
            <div class="wrapper">
                <div class="checkout-billing-details-block">
                    <form class="checkout-billing-details-form" action="" name="checkout-billing-details" method="post">
                        <div class="checkout-title-block">
                            <h3 class="checkout-title">
                                Billing Details
                            </h3>
                        </div>
                        <div class="billing-details-info-wrapper">
                            <div class="contacts-block-wrapper">
                                <div class="contacts-block">
                                    <h4 class="contacts-block-title">
                                        Contacts
                                    </h4>
                                    <div class="form-field-wrapper" :class="{'error': errors.has('bg_first_name') }">
                                        <label for="bdFirstName">
                                            First name
                                        </label>
                                        <input id="bdFirstName" class="form-field" name="bg_first_name" type="text"
                                               v-validate data-vv-rules="required" v-model="billing.firstName"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your first name.</span>
                                    </div>
                                    <div class="form-field-wrapper" :class="{'error': errors.has('bg_last_name') }">
                                        <label for="bdLastName">
                                            Last name
                                        </label>
                                        <input id="bdLastName" class="form-field" name="bg_last_name" type="text"
                                               v-validate data-vv-rules="required" v-model="billing.lastName"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your last name.</span>
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdCompName">
                                            Company Name
                                                <span>
                                                    (optional)
                                                </span>
                                        </label>
                                        <input id="bdCompName" class="form-field" name="bd_comp_name" type="text"
                                               v-model="billing.company"
                                        />
                                    </div>
                                    <div class="form-field-wrapper" :class="{'error': errors.has('bg_email') }">
                                        <label for="bdEmail">
                                            Email address
                                        </label>
                                        <input id="bdEmail" class="form-field" name="bg_email" type="email"
                                               v-validate data-vv-rules="required|email" v-model="billing.email"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your email.</span>
                                    </div>
                                    <div class="form-field-wrapper" :class="{'error': errors.has('bg_street_address') }">
                                        <label for="bdStreetAddress">
                                            Street address
                                        </label>
                                        <input id="bdStreetAddress" class="form-field" name="bg_street_address"
                                               type="text" placeholder="House number and street name"
                                               v-validate data-vv-rules="required" v-model="billing.street"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your address</span>
                                    </div>
                                    <div class="form-field-wrapper">
                                        <label for="bdApartments">
                                            Apartment, suite, unit etc.
                                                <span>
                                                    (optional)
                                                </span>
                                        </label>
                                        <input id="bdApartments" class="form-field" name="bd_apartments" type="text"
                                               placeholder="Apartment, suite, unit etc. (optional)"
                                               v-model="billing.apartment"/>
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdCountry">
                                            Country
                                        </label>
                                        <!-- <input id="bdCountry" class="form-field" name="bd_country" type="text" /> -->
                                        <select id="bdCountry" class="form-field" name="bd_country"
                                                v-model="billing.country" @change="getCountries">
                                            <option value="">Select a country...</option>
                                            <option value="" v-for="country in countries" :value="country" >{{ country }}</option>
                                        </select>
                                    </div>
                                    <div class="form-field-wrapper half-field" :class="{'error': errors.has('bg_city') }">
                                        <label for="bdTownCity">
                                            Town / City
                                        </label>
                                        <input id="bdTownCity" class="form-field" name="bg_city" type="text"
                                               v-validate data-vv-rules="required" v-model="billing.city"
                                        />
                                        <span class="error-massage" style="display: none">Please enter your city.</span>
                                    </div>
                                    <div class="form-field-wrapper half-field">
                                        <label for="bdState">
                                            State / County
                                        </label>

                                        <div v-if="states.length == 0">
                                            <input id="bdState" class="form-field" name="bd_state" type="text"
                                                   v-model="billing.state"
                                            />
                                        </div>
                                        <div v-else>
                                        <select id="bdState" class="form-field" name="bd_country" v-model="billing.state">
                                            <option value="">Select a option...</option>
                                            <option value="" v-for="state in states" :value="state" >{{ state }}</option>
                                        </select>
                                        </div>
                                        <span class="error-massage"
                                              style="display: none">Please enter your state.</span>
                                    </div>
                                    <div class="form-field-wrapper half-field" :class="{'error': errors.has('bg_post_zip') }">
                                        <label for="bdZipCode">
                                            Postcode / ZIP
                                        </label>
                                        <input id="bdZipCode" class="form-field" name="bg_post_zip" type="text"
                                               v-validate data-vv-rules="required" v-model="billing.postcode"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your postcode.</span>
                                    </div>
                                    <div class="form-field-wrapper half-field" :class="{'error': errors.has('bg_phone') }">
                                        <label for="bdPhone">
                                            Phone
                                        </label>
                                        <input id="bdPhone" class="form-field" name="bg_phone" type="text"
                                               v-validate data-vv-rules="required" v-model="billing.phone"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your phone.</span>
                                    </div>
                                    <div class="form-field-wrapper">
                                        <input id="bdCreateAccount" class="form-checkbox-field" name="bd_create_account"
                                               type="checkbox"/>
                                        <label for="bdCreateAccount" class="checkbox">
                                            Create an account?
                                        </label>
                                    </div>
                                    <div class="create-account-block" style="display: none">
                                        <p>
                                            Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.
                                        </p>
                                        <div class="form-field-wrapper">
                                            <label for="bdCreatePass">
                                                Create account password
                                            </label>
                                            <input id="bdCreatePass" class="form-field" name="bd_create_pass"
                                                   type="text" placeholder="Password"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <cart-totals
                                    :products="products"
                                    :subTotal="subTotal"
                                    :total="total"
                                    :shipping="shipping"
                            ></cart-totals>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="continue-checkout" @click.prevent="next">
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

    export default ({
        data: () => ({
            billing: {
                firstName: "",
                lastName: "",
                email: "",
                company: "",
                street: "",
                apartment: "",
                country: "",
                state: "",
                city: "",
                postcode: "",
                phone: ""
            }
        }),
        props: {
            products: Array,
            subTotal: String,
            total: Number,
            shipping: Number,
            countries: Array,
            states: Array,
            selectedCountry: String
        },
        components: {
            cartTotals
        },
        created() {
            this.billing.country = this.selectedCountry;
        },
        methods: {
            getCountries() {
                this.$emit('updateCountry', this.billing.country);
            },
            next() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        // eslint-disable-next-line
                        this.$emit('next', 'second');
                        return;
                    }
                });
            }
        }
    })

</script>