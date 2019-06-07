import router from './router';
import Vue from './main.js';

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
        var Menu = {};
        this.user.profile = data.data;
        this.user.authenticated = true;
        var _roles = data.data.user.roles;
        return true;

        // $.each(_roles, function(key, value) {
        //     // Get all Unique Parent Names
        //     var _permissions = value.permissions;
        //     var UniqueParentNames = $.unique(_permissions.map(function (d) {
        //         return d.parent_name;
        //     }));

        //     // Get all child menu associated with the parent and log into an array.
        //     $.each(UniqueParentNames, function( key, value ) {
        //         var localMenuScope = [];
        //         localMenuScope.push($.map(_permissions, function( a, index ) {
        //             if (a.parent_name.toLowerCase() === value.toLowerCase())
        //             return [ a.name ];
        //         }));
        //         Menu[value] = localMenuScope;
        //     });
        // });

        // // Add the Dashboard and Profile Menu option automatically.
        // var HtmlMenu = '<div class="sidebar-sticky">';
        // HtmlMenu += '<ul class="nav flex-column"><li class="nav-item">';
        // HtmlMenu += '<a class="nav-link" href="javascript:null" @click="LoadComponent(\'Dashboard\')">';
        // HtmlMenu += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>';
        // HtmlMenu += 'Dashboard <span class="sr-only">(current)</span>';
        // HtmlMenu += '</a></li>';

        // HtmlMenu += '<li class="nav-item"><a class="btn btn-link float-left nav-link" href="#/profile">';
        // HtmlMenu += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
        // HtmlMenu += 'Profile';
        // HtmlMenu += '</a></li></ul>';

        // // Build out the Menu String.
        // $.each(Menu, function( key, value ) {
        //     HtmlMenu += '<button class="accordion"> ' + toPascalCase(key) + ' </button>\n';
        //     HtmlMenu += '<div class="panel">\n';
        //     HtmlMenu += '<ul class="nav flex-column mb-2">\n';
        //     $.each(value[0], function(_key, _value) {
        //         HtmlMenu += '<li class="nav-item">\n';
        //         HtmlMenu += '<a class="nav-link" href="javascript:null">\n';
        //         HtmlMenu += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>\n';
        //         HtmlMenu += toPascalCase(_value) + '\n';
        //         HtmlMenu += '</a>\n';
        //         HtmlMenu += '</li>\n';
        //     });
        //     HtmlMenu += '</ul>\n';
        //     HtmlMenu += '</div>\n';
        // });
        // HtmlMenu += '</div>';
        // sessionStorage.setItem("permittedMenu", HtmlMenu);
    },
    check() {
        // var token = sessionStorage.getItem('id_token');
        // if (token !== null) {
        //     Vue.http.get(actions.check + token).then((response) => {
        //         this.buildmenu(response.data);
        //     });
        // }
    },
    mountresetcomponents() {
        router.push({
            name: 'Reset'
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
        ).then((response) => {
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
            Vue.http.headers.common['Authorization'] = 'Token ' + sessionStorage.getItem('id_token');

            this.buildmenu(response.data);

            if (response.data.meta.IsAdmin === true && response.data.meta.IsProfileValid === false) {
                // Redirect to force admin to setup profile.
                router.push({
                    name: 'admin/company_profile'
                });
            } else if (response.data.meta.IsAdmin === false && response.data.meta.IsProfileValid === false) {
                // Deny access till profile is valid.
                router.push({
                    name: 'AccessDenied'
                });
            } else {
                // We are good here.
                router.push({
                    name: 'Dashboard'
                });
            }
        }, (response) => {
            context.error = true;
        });
    },
    forgotpassword(context, email) {
        Vue.http.post(actions.forgotpassword, { email: email }).then((response) => {
            context.error = false;

            router.push({
                name: 'Login'
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
                name: 'Login'
            });
        }, (response) => {
            context.error = true;
        });
    },
    signout() {
        sessionStorage.removeItem('id_token');
        sessionStorage.removeItem('permittedMenu');

        this.user.profile = null;
        this.user.authenticated = false;

        router.push({
            name: 'Login'
        });
    }
};
