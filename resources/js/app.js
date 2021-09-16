window.Vue = require('vue').default;

import Vue from 'vue'
import App from './vue/components/app'
import VueRouter from 'vue-router'

import { routes } from './routes';

Vue.use(VueRouter)

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
