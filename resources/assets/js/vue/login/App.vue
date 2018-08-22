<style scoped>
    body {
        font-size: 0.875rem;
    }

    nav a {
        color:White;
    }

    nav a:hover {
        color: chocolate;
    }

    /* Navbar */
    .navbar-brand {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, 0.25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.25);
    }

    .navbar .form-control {
        padding: 0.75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.1);
    }

    .form-control-dark:focus {
        color:#495057;
        background-color: #fff;
        outline: 0;
        border: 1px solid #ced4da;
        /* border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.25); */
    }
</style>

<template>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow" v-if="!auth.user.authenticated">
                    <router-link :to="{ name: 'home' }" class="navbar-brand" title="Change to school Logo and get School Name" >
                        <font-awesome-icon icon="home" size="1x" />
                        <img src="/images/bootstrap-solid.svg" width="30" height="20" class="d-inline-block align-top" alt="" />
                    </router-link>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <router-link to="signin" class="nav-link">
                                Login
                                <font-awesome-icon icon="sign-in-alt" size="1x" />
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="register" class="nav-link">
                                Register
                                <font-awesome-icon icon="user-plus" size="1x" />
                            </router-link>
                        </li>
                    </ul>
                </nav>

                <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow" v-if="auth.user.authenticated">
                    <router-link :to="{ name: 'dashboard' }" class="navbar-brand col-sm-3 col-md-2 mr-0" title="Change to school Logo and get School Name" >
                        <font-awesome-icon icon="home" size="1x" />
                        Company name
                    </router-link>
                    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                    <ul class="navbar-nav px-3">
                        <li class="nav-item text-nowrap">
                            <a href="javascript:void(0)" class="nav-link" v-on:click="signout">
                                Sign out
                            </a>
                        </li>
                    </ul>
                        <!-- <li class="nav-item" v-if="auth.user.authenticated">
                            <a href="javascript:void(0)"  class="nav-link" v-on:click="signout">
                                Sign out
                                <font-awesome-icon icon="sign-out-alt" size="1x" />
                            </a>
                        </li> -->
                        <!-- <li class="nav-item" v-if="auth.user.authenticated">
                            Hi, {{ auth.user.profile.name.toUpperCase() }}
                        </li> -->
                </nav>
            </div>
        </div>
        <router-view style="color:black;"></router-view>
    </div>
</template>

<script>
    import auth from './auth.js'
    export default {
        data() {
            return {
                auth: auth
            };
        },
        methods: {
            signout() {
                auth.signout()
            }
        },
        mounted: function () {
            this.$nextTick(function () {
                auth.check()
            });
        }
    }
</script>
