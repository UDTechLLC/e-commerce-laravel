<template>
    <div class="customer-login-block-wrapper">
        <div class="wrapper">
            <div class="customer-login-block">
                <div class="customer-login-info">
                    Returning customer?
                    <a class="showlogin" href="#" @click.prevent="show = !show">
                        Click here to login
                    </a>
                </div>
                <transition name="fade">
                <form class="customer-login-form" v-if="show" name="customer_login_form" action="" method="post">
                    <p>
                        If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.
                    </p>
                    <div class="form-field-wrapper">
                        <label for="userEmail">
                            Username or email
                            <span class="required">*</span>
                        </label>
                        <input id="userEmail" class="form-field" type="text" v-model="email"/>
                    </div>
                    <div class="form-field-wrapper">
                        <label for="userPassword">
                            Password
                            <span class="required">*</span>
                        </label>
                        <input id="userPassword" class="form-field" type="password" v-model="password" />
                    </div>
                    <div class="clear"></div>
                    <div class="form-submit-wrapper">
                        <input class="login-button button" name="login" value="Login" type="submit" @click.prevent="login" />
                        <label class="rememberme-wrapper">
                            <input class="remember-me-checkbox" name="rememberme" id="rememberme" value="forever" type="checkbox" />
                            <span>Remember me</span>
                        </label>
                    </div>
                    <div class="lost-password-wrapper">
                        <a href="#">Lost your password?</a>
                    </div>
                    <div class="clear"></div>
                </form>
                </transition>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">

    export default ({
        data: () => ({
            show: false,
            email: "",
            password: ""
        }),
        methods: {
            login() {
                let data = {
                    email: this.email,
                    password: this.password
                };

                axios.post(`/api/auth/login`, data).then(
                        response => this.$EventBus.$emit('login', response),
                        error => console.log(error)
                )
            }
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