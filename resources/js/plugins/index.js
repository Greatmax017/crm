import Vue from 'vue'
import Axios from './axios'
import Helper from './helper'

Vue.use(Axios)
Vue.use(Helper)

export default {
	Axios,
	Helper
}