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
        </v-toolbar>
        <v-container fluid fill-height>
            <v-layout align-center justify-center>
                <div class="text-md-center">
                    <h1>Registration Page.</h1>
                </div>
            </v-layout>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        computed:  {
            tenant() {
                return this.$store.state.tenant
            }
        },
        methods: {
            Login () {
                this.$router.push({ path: '/login' });
            }
        }
    };
</script>
