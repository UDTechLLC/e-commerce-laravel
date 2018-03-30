<template>
    <div class="checkout">
        <billing-block
                :billing="billing"
        ></billing-block>
        <!--<login v-if="userAuth != '1'"></login>-->
        <div class="checkout-billing-details-block-wrapper">
            <div class="wrapper">
                <div class="checkout-billing-details-block">
                    <form class="checkout-billing-details-form" action="" name="checkout-billing-details" method="post">
                        <div class="checkout-title-block">
                            <h3 class="checkout-title">
                                <input id="shipToDifferentAddressCheckbox" class="form-checkbox-field"
                                       name="ship_to_different_address" value="1" type="checkbox"
                                       @change="showShipping = !showShipping"/>
                                <label for="shipToDifferentAddressCheckbox" class="checkbox">
                                    Ship to a different address?
                                </label>
                            </h3>
                        </div>

                        <div class="billing-details-info-wrapper">
                            <div class="contacts-block-wrapper">
                                <transition name="fade">
                                    <div class="contacts-block" v-if="showShipping">
                                        <h4 class="contacts-block-title">
                                            Contacts
                                        </h4>
                                        <div class="form-field-wrapper"
                                             :class="{'error': errors.has('bd_first_name') }">
                                            <label for="bdFirstName">
                                                First name
                                            </label>
                                            <input id="bdFirstName" class="form-field" name="bd_first_name" type="text"
                                                   v-model="shippingInfo.firstName" v-validate data-vv-rules="required"
                                            />
                                        <span class="error-massage"
                                              style="display: none">Please enter your first name.</span>
                                        </div>
                                        <div class="form-field-wrapper" :class="{'error': errors.has('bd_last_name') }">
                                            <label for="bdLastName">
                                                Last name
                                            </label>
                                            <input id="bdLastName" class="form-field" name="bd_last_name" type="text"
                                                   v-model="shippingInfo.lastName" v-validate data-vv-rules="required"
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
                                                   v-model="shippingInfo.company"
                                            />
                                        </div>
                                        <div class="form-field-wrapper" :class="{'error': errors.has('bd_email') }">
                                            <label for="bdEmail">
                                                Email address
                                            </label>
                                            <input id="bdEmail" class="form-field" name="bd_email" type="email"
                                                   v-model="shippingInfo.email" v-validate
                                                   data-vv-rules="required|email"
                                            />
                                        <span class="error-massage"
                                              style="display: none">Please enter your email.</span>
                                        </div>
                                        <div class="form-field-wrapper"
                                             :class="{'error': errors.has('bd_street_address') }">
                                            <label for="bdStreetAddress">
                                                Street address
                                            </label>
                                           <input id="bdStreetAddress" class="form-field" name="bd_street_address"
                                                   type="hidden" placeholder="House number and street name"
                                                   v-model="shippingInfo.street" v-validate data-vv-rules="required"
                                            />
                                            <vue-google-autocomplete
                                                    ref="street"
                                                    id="map2"
                                                    :country="googleCountry"
                                                    type="text"
                                                    classname="form-field"
                                                    placeholder="House number and street name"
                                                    @placechanged="getAddressData"
                                            >
                                            </vue-google-autocomplete>
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
                                                   v-model="shippingInfo.apartment"
                                            />
                                        </div>
                                        <div class="form-field-wrapper half-field">
                                            <label for="bdCountry">
                                                Country
                                            </label>
                                            <select id="bdCountry" class="form-field" name="bd_country"
                                                    v-model="shippingInfo.country" @change="saveCountries">
                                                <option value="">Select a country...</option>
                                                <option value="" v-for="country in countries" :value="country">
                                                    {{ country.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-field-wrapper half-field"
                                             :class="{'error': errors.has('bd_city') }">
                                            <label for="bdTownCity">
                                                Town / City
                                            </label>
                                            <input id="bdTownCity" class="form-field" name="bd_city" type="text"
                                                   v-model="shippingInfo.city" v-validate data-vv-rules="required"
                                            />
                                            <span class="error-massage"
                                                  style="display: none">Please enter your city.</span>
                                        </div>
                                        <div class="form-field-wrapper half-field "
                                             :class="{'error': errors.has('bd_state') }">
                                            <label for="bdState">
                                                State / County
                                            </label>
                                            <div>
                                                <input id="bdState" class="form-field" name="bd_state" type="text"
                                                       v-model="shippingInfo.state"
                                                />
                                            </div>

                                            <span class="error-massage"
                                                  style="display: none">Please enter your state.</span>
                                        </div>
                                        <div class="form-field-wrapper half-field"
                                             :class="{'error': errors.has('bd_post_zip') }">
                                            <label for="bdZipCode">
                                                Postcode / ZIP
                                            </label>
                                            <input id="bdZipCode" class="form-field" name="bd_post_zip" type="text"
                                                   v-validate data-vv-rules="required" v-model="shippingInfo.postcode"/>
                                        <span class="error-massage"
                                              style="display: none">Please enter your postcode.</span>
                                        </div>
                                        <div class="form-field-wrapper half-field"
                                             :class="{'error': errors.has('bd_phone') }">
                                            <label for="bdPhone">
                                                Phone
                                            </label>
                                            <input id="bdPhone" class="form-field" name="bd_phone" type="text"
                                                   v-validate data-vv-rules="required" v-model="shippingInfo.phone"/>
                                         <span class="error-massage"
                                               style="display: none">Please enter your phone.</span>
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
                            <div class="cart-review-block-wrapper">
                                <cart-totals
                                        :shipping="shipping"
                                ></cart-totals>
                            </div>
                        </div>
                        <div class="buttons-area">
                            <a href="#" class="back-button" @click.prevent="back">
                                Back
                            </a>
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
    import login from './../components/login';
    import billingBlock from './../components/billing-block';
    import VueGoogleAutocomplete from 'vue-google-autocomplete';

    export default ({
        data: () => ({
            showShipping: false,
            shippingId: "",
            shippingInfo: {
                firstName: "",
                lastName: "",
                email: "",
                company: "",
                street: "",
                apartment: "",
                country: {
                    code: (Vue.localStorage.get('shippingCountryCode')) ? Vue.localStorage.get('shippingCountryCode') : "",
                    name: (Vue.localStorage.get('shippingCountryName')) ? Vue.localStorage.get('shippingCountryName') : ""
                },
                state: "",
                city: "",
                postcode: "",
                phone: ""
            }
        }),
        components: {
            cartTotals,
            login,
            billingBlock,
            VueGoogleAutocomplete
        },
        props: {
            userAuth: String,
            orderId: Number,
            billing: Object,
            countries: Array,
            shipping: String
        },
        computed: {
            googleCountry() {
                return this.shippingInfo.country.code;
            }
        },
        updated() {
            if (this.isShipping) {
                this.shippingInfo.country.name = (Vue.localStorage.get('shippingCountryName')) ? Vue.localStorage.get('shippingCountryName') : "";
                this.shippingInfo.country.code = (Vue.localStorage.get('shippingCountryCode')) ? Vue.localStorage.get('shippingCountryCode') : "";
            }
        },
        methods: {
            saveCountries() {
                Vue.localStorage.set('shippingCountryName', this.shippingInfo.country.name);
                Vue.localStorage.set('shippingCountryCode', this.shippingInfo.country.code);
                this.$emit('updateCountry');
            },
            getAddressData(value) {

                this.shippingInfo.street = value.route;
                this.shippingInfo.apartment = value.street_number;
                this.shippingInfo.country.name = value.country;
                this.countries.forEach(key => {
                    if (key.name == value.country) {
                        this.shippingInfo.country.code = key.code;
                    }
                });
                this.saveCountries();
                this.shippingInfo.state = value.administrative_area_level_1;
                this.shippingInfo.city = value.locality;
                this.shippingInfo.postcode = value.postal_code;

                this.$nextTick(() => {
                    this.$refs.street.update(value.route)
                })
            },
            getCountries() {
                this.$emit('updateCountry', this.shippingInfo.country);
            },
            next() {
                let data = {
                    step: 'third',
                    billing: this.billing,
                    orderId: this.orderId
                };

                if (!this.showShipping) return this.$emit('next', data);

                this.$validator.validateAll().then((result) => {
                    if (result) {

                        let url = `/api/checkout/shipping/${this.orderId}`;
                        if (this.shippingId != "") url = `/api/checkout/shipping/${this.orderId}/${this.shippingId}`;

                        axios.post(url, this.shippingInfo).then(
                                response => {
                                    this.shippingId = response.data.data.shipping.data.id;
                                    this.$emit('next', data);
                                    return;
                                },
                                error => console.log('error')
                        );
                    }
                });
            },
            back() {
                let data = {
                    step: 'first',
                    progress: 1,
                };
                this.$emit('back', data);
            }
        }
    })

</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */
    {
        opacity: 0;
    }
</style>