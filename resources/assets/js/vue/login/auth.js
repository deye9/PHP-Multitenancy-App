import Vue from './tenantauth.js';
import {router} from './tenantauth.js';

var actions = {
    check: 'api/user?token=',
    signinuser: 'api/signin',
    registeruser: 'api/registeruser',
    resetpassword: 'api/resetpassword',
    forgotpassword: 'api/forgotpassword',
    emailsError: 'Emails do not match. Kindly correct it.',
    passwordError: 'Passwords do not match. Kindly correct it.',
    isavailableError: 'Unfortunately we are unable to determine the status of your request. Please check your data and re-try. Thanks.'
};

export default {
    user: {
        profile: null,
        authenticated: false
    },
    buildmenu(data) {
        this.user.profile = data.data;
        this.user.authenticated = true;
        // var json = JSON.stringify(response.data.access.menu).replace(/\\/g, "").replace(/"{"/g, '{"').replace(/}"/g, '}');
        // json = JSON.parse(json);
        // console.log(json);
    },
    check() {
        var token = sessionStorage.getItem('id_token');
        if (token !== null) {
            Vue.http.get(actions.check + token).then((response) => {
                this.buildmenu(response.data);
            });
        }
    },
    mountresetcomponents() {
        router.push({
            name: 'reset'
        });
    },
    register(context, name, email, password) {
        Vue.http.post(
            this.registeruser,
            {
                name: name,
                email: email,
                password: password
            }
        ).then(response => {
            context.success = true;
        }, response => {
            context.error = true;
            context.response = response.data;
        });
    },
    signin(context, email, password) {
        Vue.http.post(actions.signinuser, { email: email, password: password }).then((response) => {
            context.error = false;

            sessionStorage.setItem('id_token', response.data.meta.token);
            Vue.http.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('id_token');

            this.buildmenu(response.data);

            router.push({
                name: 'dashboard'
            });
        }, (response) => {
            context.error = true;
        });
    },
    forgotpassword(context, email) {
        Vue.http.post(actions.forgotpassword, { email: email }).then((response) => {
            context.error = false;

            router.push({
                name: 'login'
            });
        }, (response) => {
            context.error = true;
        });
    },
    reset(context, email, password, password_confirmation) {
        if (password !== password_confirmation) {
            context.error = true;
            return (false);
        }
        var token = location.pathname.replace('/password/reset/', '');

        Vue.http.post(actions.resetpassword, { email: email, password: password, password_confirmation: password_confirmation, token: token }).then((response) => {
            context.error = false;

            router.push({
                name: 'login'
            });
        }, (response) => {
            context.error = true;
        });
    },
    signout() {
        sessionStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.profile = null;

        router.push({
            name: 'home'
        });
    }
}
