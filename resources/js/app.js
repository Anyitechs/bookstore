require('./bootstrap');

import Vue from 'vue'

import App from './components/App.vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './route';

Vue.use(VueRouter);

Vue.prototype.axios = axios;

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
