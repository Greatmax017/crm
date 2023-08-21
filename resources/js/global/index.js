import Vue from 'vue'
import AnimatedIcon from './AnimatedIcon'

Vue.component('animated-icon', 
    () => import('./AnimatedIcon')
)