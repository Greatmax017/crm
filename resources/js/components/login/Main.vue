<template>
    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
        <div class="intro-x mt-8">
            <form @keyup.enter="login">
                <input v-model="form.email" type="text" class="intro-x login__input input input--lg border border-gray-300 block" :class="{ 'border-theme-6': $getErrorClasses(errorMessages, 'email') }" placeholder="Email">
                <div v-if="$isset(errorMessages)" class="w-5/6 text-theme-6 mt-2" v-for="message in errorMessages.email">{{ message }}</div>
                <input v-model="form.password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" :class="{ 'border-theme-6': $getErrorClasses(errorMessages, 'password') }" placeholder="Password">
                <div v-if="$isset(errorMessages)" class="w-5/6 text-theme-6 mt-2" v-for="message in errorMessages.password">{{ message }}</div>
            </form>
        </div>
        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
            <div class="flex items-center mr-auto">
                <input v-model="form.remember_me" type="checkbox" class="input border mr-2" id="remember-me">
                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
            </div>
            <a href="">Forgot Password?</a>
        </div>
        <div class="intro-x mt-5 xl:mt-8 flex justify-center xl:justify-start">
            <button @click="login" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
                <template v-if="!requestState">Login</template>
                <animated-icon v-else icon="oval" color="white" class="w-5 h-5 block mx-auto"></animated-icon>
            </button>
            <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign up</button>
        </div>
        <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
            By signin up, you agree to our <br> <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a>
        </div>
    </div>
</template>

<script>
	export default {
        data() {
			return {
				form: {
					email: 'letz@left4code.com',
                    password: 'password',
                    remember_me: false
				},
				requestState: false,
				errorMessages: []
			}
		},
        methods: {
			async login() {
                this.requestState = true
                await this.$delay(1000)
                
                this.$req.auth.login(this.form).then(async res => {
					window.location.href = '/page/side-menu/dashboard'
				}).catch(err => {
					this.requestState = false
                    this.form.password = ''
                    this.errorMessages = err.response.data.errors

                    if (err.response.data.message == 'Wrong email or password.') {
                        this.errorMessages = {
                            'password': [
                                'Sorry, your password was incorrect.'
                            ]
                        }
                    }
				})
			}
        },
        mounted() {
            if (window.location !== window.parent.location) {
                window.top.location.href = 'http://letz.left4code.com/'
            }
        }
    }
</script>