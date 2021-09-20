require('./bootstrap');
window.Vue = require('vue').default;

import Vue from 'vue'
import VueApexCharts from 'vue-apexcharts'
import App from './vue/components/app'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'

import { routes } from './routes';

Vue.use(VueApexCharts)
Vue.use(VueRouter)
Vue.use(VueAxios, axios)

Vue.component('apexchart', VueApexCharts)

export const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    components: { App },
    router
})
