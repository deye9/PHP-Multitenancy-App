import Vue from 'vue';
import App from './App.vue';
import Home from './Home.vue';
import Signin from './Signin.vue';
import VueRouter from 'vue-router';
import Register from './Register.vue';
import VueResource from 'vue-resource';
import Dashboard from './Dashboard.vue';

Vue.use(VueRouter);
Vue.use(VueResource);

// Vue.http.options.root = 'https://boise.erp.dev/';
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
            path: '/register',
            name: 'register',
            component: Register
        }
    ]
});

new Vue({
    el: '#app',
    router: router,
    render: app => app(App)
});
