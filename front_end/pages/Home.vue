<template>
    <v-app id="home">
        <v-toolbar dark color="primary" dense>
            <a href="/home" class="d-flex router-link-active">
                <img :src="this.tenant.logo" height='38px' width='38px'>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/home">
                <v-toolbar-title class="white--text"> Welcome to {{this.tenant.companyname}} </v-toolbar-title>
            </a>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn flat @click="Login">Login</v-btn>
                <v-btn flat @click="Register">Register</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-container fluid fill-height>
            <v-layout align-center justify-center>
                <div class="text-md-center">
                    <h1 class="mainheader"> {{this.tenant.companyname}} </h1>
                    <br />
                    <h2 class="my-3 headline"> {{this.tenant.catchphase}} </h2>
                </div>
            </v-layout>
        </v-container>
    </v-app>
</template>

<script>
    import auth from '../auth.js'
    export default {
        computed:  {
            tenant() {
                return this.$store.state.tenant
            }
        },
        methods: {
            Login() {
                this.$router.push({ path: '/login' });
            },
            Register() {
                this.$router.push({ path: '/register' });
            }
        },
        mounted: function() {
            if (location.pathname.toLocaleLowerCase().includes("/password/reset/"))
            {
                auth.mountresetcomponents();
            }
            this.$nextTick(function () {
                auth.check();
            });
        }
    }
</script>

<style lang="css">
  h1 {
    font-size: 150px;
    font-weight: 700;
    color: #252932;
    line-height: 150px;
    text-shadow: rgba(61, 61, 61, 0.3) 1px 1px, rgba(61, 61, 61, 0.2) 2px 2px, rgba(61, 61, 61, 0.3) 3px 3px;
  }
</style>
