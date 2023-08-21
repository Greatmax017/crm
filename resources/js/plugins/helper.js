import dayjs from 'dayjs'

export default {
	install(Vue, options) {
		
		const helpers = {
			round(number) {
				return Math.round(number / 100) * 100
			},
	        cutText(text, length) {
	            if (text.split(' ').length > 1) {
	                let string = text.substring(0, length)
	                let splitText = string.split(' ')
	                splitText.pop()
	                return splitText.join(' ') + '...'
	            } else {
	                return text
	            }
	        },
	        formatDate(date, format) {
	            return dayjs(date).format(format)
	        },
	        capitalizeFirstLetter(string) {
	            if (string) {
	                return string.charAt(0).toUpperCase() + string.slice(1)
	            }
	        },
	        onlyNumber(number) {
	            if (number) {
	                return number.replace(/(?!-)[^0-9]/g, '')
	            } else {
	                return ''
	            }
	        },
	        formatCurrency(number) {
	            if (number) {
	                let formattedNumber = number.toString().replace(/(?!-)[^0-9]/g, '')
	                let rest = formattedNumber.length % 3
	                let currency = formattedNumber.substr(0, rest)
	                let thousand = formattedNumber.substr(rest).match(/\d{3}/g)
	                let separator
	                
	                if (thousand) {
	                    separator = rest ? '.' : ''
	                    currency += separator + thousand.join('.')
	                }

	                return currency
	            } else {
	                return ''
	            }
	        },
	        timeAgo(time) {
	            let date = new Date((time || "").replace(/-/g,"/").replace(/[TZ]/g," ")),
	                diff = (((new Date()).getTime() - date.getTime()) / 1000),
	                dayDiff = Math.floor(diff / 86400)

	            if (isNaN(dayDiff) || dayDiff < 0 || dayDiff >= 31)
	                return dayjs(time).format("MMMM DD, YYYY")

	            return dayDiff == 0 && (
	                diff < 60 && "just now" ||
	                diff < 120 && "1 minute ago" ||
	                diff < 3600 && Math.floor( diff / 60 ) + " minutes ago" ||
	                diff < 7200 && "1 hour ago" ||
	                diff < 86400 && Math.floor( diff / 3600 ) + " hours ago") ||
	                dayDiff == 1 && "Yesterday" ||
	                dayDiff < 7 && dayDiff + " days ago" ||
	                dayDiff < 31 && Math.ceil( dayDiff / 7 ) + " weeks ago"
	        },
	        diffTimeByNow(time) {
	            let startDate = dayjs(dayjs().format('YYYY-MM-DD HH:mm:ss').toString())
	            let endDate = dayjs(dayjs(time).format('YYYY-MM-DD HH:mm:ss').toString())
	            
	            let duration = dayjs.duration(endDate.diff(startDate))
	            let milliseconds = Math.floor(duration.asMilliseconds())

	            let days = Math.round(milliseconds / 86400000)
	            let hours = Math.round((milliseconds % 86400000) / 3600000)
	            let minutes = Math.round(((milliseconds % 86400000) % 3600000) / 60000)
	            let seconds = Math.round((((milliseconds % 86400000) % 3600000) % 60000) / 1000)

	            if (seconds < 30 && seconds >= 0) {
	                minutes += 1
	            }

	            return {
	                days: days.toString().length < 2 ? '0' + days : days,
	                hours: hours.toString().length < 2 ? '0' + hours : hours,
	                minutes: minutes.toString().length < 2 ? '0' + minutes : minutes,
	                seconds: seconds.toString().length < 2 ? '0' + seconds : seconds
	            }
	        },
	        serialize(obj, prefix) {
	        	let str = [], p
	        	for (p in obj) {
	        		if (obj.hasOwnProperty(p)) {
	        			var k = prefix ? prefix + "[" + p + "]" : p,
	        			v = obj[p]
	        			str.push((v !== null && typeof v === "object") ?
	        				helpers.serialize(v, k) :
	        				encodeURIComponent(k) + "=" + encodeURIComponent(v))
	        		}
	        	}
	        	return str.join("&")
	        },
			isset(obj) {
				return obj !== undefined ? Object.keys(obj).length : false
			},
			assign(obj) {
				return JSON.parse(JSON.stringify(obj))
			},
			delay(time) {
				return new Promise((resolve, reject) => {
					setTimeout(() => { resolve() }, time)
				})
			},
			getErrorClasses(err, field) {
				if (helpers.isset(err)) {
					return helpers.isset(err[field])
				}
			}
	    }

		for (const [key, helper] of Object.entries(helpers)) {
			Vue.prototype[`$${key}`] = helper
		}
	}
}
