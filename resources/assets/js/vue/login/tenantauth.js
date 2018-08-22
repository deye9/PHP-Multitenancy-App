import Vue from 'vue';
import App from './App.vue';
import Home from './Home.vue';
import Signin from './Signin.vue';
import VueRouter from 'vue-router';
import Register from './Register.vue';
import VueResource from 'vue-resource';
import Dashboard from './Dashboard.vue';
import { library } from '../components/@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '../components/@fortawesome/vue-fontawesome';
import { faSignInAlt, faUserPlus, faHome, faSignOutAlt } from '../components/@fortawesome/free-solid-svg-icons';

Vue.use(VueRouter);
Vue.use(VueResource);

library.add(faSignInAlt, faUserPlus, faHome, faSignOutAlt);

Vue.config.productionTip = false;
Vue.http.options.root = 'https://pentaville.erp.dev/';
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
Vue.http.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('id_token');

Vue.component('font-awesome-icon', FontAwesomeIcon);

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
        }
    ]
});

new Vue({
    el: '#app',
    router: router,
    render: app => app(App)
});
