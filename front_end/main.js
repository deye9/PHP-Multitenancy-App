import Vue from 'vue';
import Vuex from 'vuex';
import App from './App';
import axios from 'axios';
import './theme/default.css';
import Vuetify from 'vuetify';
import router from './router';
//import './theme/default.styl';
import VeeValidate from 'vee-validate';
import Truncate from 'lodash.truncate';
import VueResource from 'vue-resource';
import 'font-awesome/css/font-awesome.css';
import colors from 'vuetify/es5/util/colors';
import { ApolloClient } from 'apollo-client';
import { HttpLink } from 'apollo-link-http';
import { InMemoryCache } from 'apollo-cache-inmemory';
import VueApollo from 'vue-apollo';
import 'material-design-icons-iconfont/dist/material-design-icons.css'; // Ensure you are using css-loader

Vue.config.devtools = true;
Vue.config.productionTip = false;

// Global filters
window.axios = axios;
Vue.filter('truncate', Truncate);
Vue.use(Vuex);
Vue.use(VueApollo);
Vue.use(VueResource);
Vue.use(VeeValidate, { fieldsBagName: 'formFields' });

var matches = _tenant.theme.themeColor.match(/\[(.*?)\]/);
Vue.use(Vuetify, {
    theme: {
        primary: matches[1],
    },
    options: {
        themeVariations: ['primary', 'secondary', 'accent'],
        extra: {
            mainToolbar: {
                color: 'primary',
            },
            sideToolbar: {},
            sideNav: 'primary',
            mainNav: 'primary lighten-1',
            bodyBg: '',
        }
    }
});

Vue.http.options.crossOrigin = true;
// Vue.http.options.root = 'https://erp.dev/';
// Vue.http.headers.common['Access-Control-Allow-Origin'] = 'https://erp.dev';
//Vue.http.headers.common['Accept-Encoding'] = 'gzip';
Vue.http.headers.common['Accept'] = 'application/json';
Vue.http.headers.common['Content-Type'] = 'application/json';
//Vue.http.headers.common['Access-Control-Request-Method'] = '*';
Vue.http.headers.common['Authorization'] = 'Token ' + sessionStorage.getItem('id_token');
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');

// Bootstrap application components
export default Vue;

const store = new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',
    state: {
        status: '',
        message: '',
        snack: {
            show: false,
            text: '',
            color: '',
        },
        tenant: _tenant
    },
    mutations: {
        Snackbar (state, payload) {
            state.snack.show = true;
            state.snack.text = payload.text;
            state.snack.color = payload.color;
        },
        updatetenant (state, payload) {
            if (payload.sideBarOption) {
                state.tenant.theme.sideBarOption = payload.sideBarOption;
            } else {
                state.tenant.logo = payload.logo;
                state.tenant.companyname = payload.companyname;
            }
        },
        response (state, payload) {
          state.message = payload.message;
          state.status = payload.status.toLowerCase();
          // Automatically Load the notification page whenever called.
          // app.setActiveView('notification');
          //appData.activeview = 'notification';
        }
    }
});

const httpLink = new HttpLink({
    // You should use an absolute URL here
    uri: '/graphql',
});

// Create the apollo client
const apolloClient = new ApolloClient({
    link: httpLink,
    //shouldBatch: true,
    addTypename: false,
    connectToDevTools: true,
    cache: new InMemoryCache({
        addTypename: false
    }),
});

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
});

/* eslint-disable no-new */
new Vue({
    el: '#app',
    store,
    router: router,
    apolloProvider,
    components: { App },
    template: '<App/>',
    apolloProvider
});
