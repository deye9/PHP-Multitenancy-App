import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import {
    App, Home, Reset, Signin, Profile,
    Register, Dashboard, ForgotPassword, library, FontAwesomeIcon
} from './imports.js';

Vue.use(VueRouter);
Vue.use(VueResource);

Vue.config.productionTip = false;
Vue.config.devtools = vue_devtools;
Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.http.options.root = 'https://pentaville.erp.dev/';
Vue.http.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('id_token');
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');

export default Vue;

export var router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/signin',
            name: 'login',
            component: Signin
        },
        {
            path: '/forgotpassword',
            name: 'forgotpassword',
            component: ForgotPassword
        },
        {
            path: '/reset',
            name: 'reset',
            component: Reset
        },
        {
            path: '/profile',
            name: 'profile',
            component: Profile
        }
    ]
});

new Vue({
    el: '#app',
    router: router,
    render: app => app(App)
});
