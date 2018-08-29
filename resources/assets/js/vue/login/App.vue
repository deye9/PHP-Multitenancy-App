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

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather, .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: 0.75rem;
        text-transform: uppercase;
    }

    /* Content */
    [role="main"] {
        padding-top: 48px; /* Space for fixed navbar */
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
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
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar" v-if="auth.user.authenticated">
                <div class="sidebar-sticky" v-html="PermitedMenus"></div>
            </nav>
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <router-view class="col-md-10" style="color:black;"></router-view>
            </main>
        </div>
    </div>
</template>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<script>
    import auth from '../../auth.js'
    export default {
        data() {
            return {
                auth: auth,
                PermitedMenus: ''
            };
        },
        methods: {
            signout() {
                auth.signout()
            }
        },
        mounted: function () {
            if (location.pathname.toLocaleLowerCase().includes("/password/reset/"))
            {
                auth.mountresetcomponents();
            }
            this.$nextTick(function () {
                auth.check();
            });
        },
        updated: function() {
            if (auth.user.authenticated) {
                this.PermitedMenus = sessionStorage.getItem('permittedMenu');
            }
        }
    }
</script>
