
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import global from './global'
import plugins from './plugins'

// Components
import Login from './components/login/Main'

Vue.component('login', Login)

new Vue({
	plugins,
	el: '#app'
})