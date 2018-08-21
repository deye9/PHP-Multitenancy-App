import Vue from './tenantauth.js';
import {router} from './tenantauth.js';

var actions = {
    signinuser: 'api/signin',
    registeruser: 'api/registeruser',
    emailsError: 'Emails do not match. Kindly correct it.',
    passwordError: 'Passwords do not match. Kindly correct it.',
    isavailableError: 'Unfortunately we are unable to determine the status of your request. Please check your data and re-try. Thanks.'
};

export default {
    user: {
        profile: null,
        authenticated: false
    },
    check() {
        let token = localStorage.getItem('id_token');
        if (token !== null) {
            Vue.http.get(
                'api/user?token=' + token
            ).then(response => {
                this.user.authenticated = true;
                this.user.profile = response.data.data;
            });
        };
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
            localStorage.setItem('id_token', response.data.meta.token);
            Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');

            this.user.authenticated = true;
            this.user.profile = response.data.data;

            router.push({
                name: 'dashboard'
            });
        }, (response) => {
            context.error = true;
        });
    },
    signout() {
        localStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.profile = null;

        router.push({
            name: 'home'
        });
    }
}
