<template>
    <div class="checkout">
        <!--<login></login>-->
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
                                               v-validate data-vv-rules="required" v-model="billingInfo.firstName"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your first name.</span>
                                    </div>
                                    <div class="form-field-wrapper" :class="{'error': errors.has('bg_last_name') }">
                                        <label for="bdLastName">
                                            Last name
                                        </label>
                                        <input id="bdLastName" class="form-field" name="bg_last_name" type="text"
                                               v-validate data-vv-rules="required" v-model="billingInfo.lastName"
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
                                               v-model="billingInfo.company"
                                        />
                                    </div>
                                    <div class="form-field-wrapper" :class="{'error': errors.has('bg_email') }">
                                        <label for="bdEmail">
                                            Email address
                                        </label>
                                        <input id="bdEmail" class="form-field" name="bg_email" type="email"
                                               v-validate data-vv-rules="required|email" v-model="billingInfo.email"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your email.</span>
                                    </div>
                                    <div class="form-field-wrapper"
                                         :class="{'error': errors.has('bg_street_address') }"
                                         v-if="this.isShipping">
                                        <label for="bdStreetAddress">
                                            Street address
                                        </label>
                                        <!--<input id="bdStreetAddress" class="form-field" name="bg_street_address"
                                               type="text" placeholder="House number and street name"
                                               v-validate data-vv-rules="required" v-model="billingInfo.street"
                                        />-->
                                        <vue-google-autocomplete
                                                ref="street"
                                                id="map"
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

                                    <div class="form-field-wrapper"
                                         v-if="this.isShipping">
                                        <label for="bdApartments">
                                            Apartment, suite, unit etc.
                                            <span>
                                                    (optional)
                                                </span>
                                        </label>
                                        <input id="bdApartments" class="form-field" name="bd_apartments" type="text"
                                               placeholder="Apartment, suite, unit etc. (optional)"
                                               v-model="billingInfo.apartment"/>
                                    </div>
                                    <div class="form-field-wrapper half-field"
                                         v-if="this.isShipping">
                                        <label for="bdCountry">
                                            Country
                                        </label>
                                        <!-- <input id="bdCountry" class="form-field" name="bd_country" type="text" /> -->
                                        <select id="bdCountry" class="form-field" name="bd_country"
                                                v-model="billingInfo.country" @change="saveCountries">
                                            <option value="">Select a country...</option>
                                            <option value="" v-for="country in countries" :value="country">
                                                {{ country.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-field-wrapper half-field"
                                         :class="{'error': errors.has('bg_city') }"
                                         v-if="this.isShipping">
                                        <label for="bdTownCity">
                                            Town / City
                                        </label>
                                        <input id="bdTownCity" class="form-field" name="bg_city" type="text"
                                               v-validate data-vv-rules="required" v-model="billingInfo.city"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your city.</span>
                                    </div>
                                    <div class="form-field-wrapper half-field"
                                         :class="{'error': errors.has('bd_state') }"
                                         v-if="this.isShipping">
                                        <label for="bdState">
                                            State / County
                                        </label>

                                        <div>
                                            <input id="bdState" class="form-field" name="bd_state" type="text"
                                                   v-model="billingInfo.state"
                                            />
                                        </div>
                                        <!--<div v-else>
                                            <select id="bdState" class="form-field" name="bd_state"
                                                    v-validate data-vv-rules="required"
                                                    v-model="billingInfo.state">
                                                <option value="">Select a option...</option>
                                                <option value="" v-for="state in states" :value="state">{{ state }}
                                                </option>
                                            </select>
                                        </div>-->
                                        <span class="error-massage"
                                              style="display: none">Please enter your state.</span>
                                    </div>
                                    <div class="form-field-wrapper half-field"
                                         :class="{'error': errors.has('bg_post_zip') }"
                                         v-if="this.isShipping">
                                        <label for="bdZipCode">
                                            Postcode / ZIP
                                        </label>
                                        <input id="bdZipCode" class="form-field" name="bg_post_zip" type="text"
                                               v-validate data-vv-rules="required" v-model="billingInfo.postcode"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your postcode.</span>
                                    </div>
                                    <div class="form-field-wrapper half-field"
                                         :class="{'error': errors.has('bg_phone') }">
                                        <label for="bdPhone">
                                            Phone
                                        </label>
                                        <input id="bdPhone" class="form-field" name="bg_phone" type="text"
                                               v-validate data-vv-rules="required" v-model="billingInfo.phone"
                                        />
                                        <span class="error-massage"
                                              style="display: none">Please enter your phone.</span>
                                    </div>
                                    <div class="form-field-wrapper">
                                        <input id="bdCreateAccount" class="form-checkbox-field" name="bd_create_account"
                                               type="checkbox" @change="createUser = !createUser"/>
                                        <label for="bdCreateAccount" class="checkbox">
                                            Create an account?
                                        </label>
                                    </div>
                                    <div class="create-account-block" v-if="createUser">
                                        <p>
                                            Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.
                                        </p>
                                        <div class="form-field-wrapper"
                                             :class="{'error': errors.has('bd_create_pass')}">
                                            <label for="bdCreatePass">
                                                Create account password
                                            </label>
                                            <input id="bdCreatePass" class="form-field" name="bd_create_pass"
                                                   type="text" placeholder="Password"
                                                   v-model="password" v-validate data-vv-rules="required"/>
                                            <span class="error-massage"
                                                  style="display: none">Please enter your password.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-review-block-wrapper">
                                <cart-totals
                                        :products="products"
                                        :subTotal="subTotal"
                                        :total="total"
                                        :shipping="shipping"
                                        :isShipping="isShipping"
                                        :discount="discount"
                                        :coupon="coupon"
                                ></cart-totals>
                            </div>
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
    import login from './../components/login';
    import VueGoogleAutocomplete from 'vue-google-autocomplete';

    export default ({

        data: () => ({
            result: "",
            billingId: "",
            createUser: false,
            password: "",
            billingInfo: {
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
        props: {
            cartId: Number,
            products: Array,
            subTotal: String,
            total: String,
            shipping: Number,
            countries: Array,
            states: Array,
            isShipping: Boolean,
            discount: String,
            coupon: String
        },
        components: {
            cartTotals,
            login,
            VueGoogleAutocomplete
        },
        computed: {
           googleCountry() {
               return this.billingInfo.country.code;
           }
        },
        methods: {
            saveCountries() {
                Vue.localStorage.set('shippingCountryName', this.billingInfo.country.name);
                Vue.localStorage.set('shippingCountryCode', this.billingInfo.country.code);
            },
            getAddressData(value) {
                console.log(value);

                this.billingInfo.street = value.route;
                this.billingInfo.apartment = value.street_number;
                this.billingInfo.country.name = value.country;
                this.countries.forEach(key => {
                    if(key.name == value.country) {
                        this.billingInfo.country.code = key.code;
                    }
                });
                this.saveCountries();
                this.billingInfo.state = value.administrative_area_level_1;
                this.billingInfo.city = value.locality;
                this.billingInfo.postcode = value.postal_code;

                this.$nextTick(() => {
                    this.$refs.street.update(value.route)
                })
            },
            next() {
                this.$validator.validateAll().then((result) => {
                    if (result) {

                        let url = `/api/checkout/billing/${this.cartId}`;
                        if (this.billingId != "") url = `/api/checkout/billing/${this.cartId}/${this.billingId}`;
                        let body = {
                            ...this.billingInfo,
                            password: this.password
                        };
                        axios.post(url, body).then(
                                response => {
                                    this.billingId = response.data.data.billing.data.id;
                                    let data = {
                                        step: 'second',
                                        billing: this.billingInfo,
                                        orderId: response.data.data.id,
                                        password: this.password
                                    };
                                    this.$emit('next', data);
                                    return;
                                },
                                error => console.log('error')
                        );
                    }
                });
            }
        }
    })

</script>
