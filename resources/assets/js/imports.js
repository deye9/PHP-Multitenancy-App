import App from './vue/login/App.vue';
import Home from './vue/login/Home.vue';
import Reset from './vue/login/Reset.vue';
import Signin from './vue/login/Signin.vue';
import Register from './vue/login/Register.vue';
import Dashboard from './vue/login/Dashboard.vue';
import ForgotPassword from './vue/login/ForgotPassword.vue';
import { library } from './vue/components/@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from './vue/components/@fortawesome/vue-fontawesome';
import { faSignInAlt, faUserPlus, faHome, faSignOutAlt, faLock } from './vue/components/@fortawesome/free-solid-svg-icons';

library.add(faSignInAlt, faUserPlus, faHome, faSignOutAlt, faLock);

export {
    App,
    Home,
    Reset,
    Signin,
    library,
    Register,
    Dashboard,
    ForgotPassword,
    FontAwesomeIcon
};
