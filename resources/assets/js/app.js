/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueLadda from 'vue-ladda';
import { library } from './vue/components/@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from './vue/components/@fortawesome/vue-fontawesome';
import { faExclamationTriangle, faSpinner, faThumbsUp, faHandPointLeft, faHome, faSearch } from './vue/components/@fortawesome/free-solid-svg-icons';

window.Vue = require('vue');
window.Vuex = require('vuex');
window.VueRouter = require('vue-router');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
library.add(faExclamationTriangle, faThumbsUp, faSpinner, faHandPointLeft, faHome, faSearch);
Vue.config.productionTip = false;

Vue.use(Vuex);
Vue.use(require('vue-resource'));
Vue.component('vue-ladda', VueLadda);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('app-info', require('./vue/rootcomponents/Info.vue'));
Vue.component('app-default', require('./vue/rootcomponents/Default.vue'));
Vue.component('app-school', require('./vue/rootcomponents/NewSchool.vue'));
Vue.component('app-notification', require('./vue/rootcomponents/Notification.vue'));

var appData = {
  activeview: 'default'
};

var store = new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  state: {
    status: '',
    message: '',
  },
  mutations: {
    response (state, payload) {
      state.message = payload.message;
      state.status = payload.status.toLowerCase();

      // Automatically Load the notification page whenever called.
      app.setActiveView('notification');
      //appData.activeview = 'notification';
    }
  }
});

var app = new Vue({
  el: '#app',
  data: appData,
  store,
  methods: {
    setActiveView: function (value) {
      this.$root.activeview = value;
    },
  }
});