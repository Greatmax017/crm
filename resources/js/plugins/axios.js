import axios from 'axios'
import auth from '../api/auth'

export default {
	install(Vue, options) {
		const axiosInstance = axios.create({
			baseURL: process.env.VUE_APP_BASE_URL
		})

		const resources = {
			auth: auth(axiosInstance)
		}
		
		Vue.prototype.$axios = axiosInstance
		Vue.prototype.$req = resources
	}
}