<template>
  <v-app id="forgot" class="primary">
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
        </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4 lg4>
            <v-alert :value="error" dismissible type="error">
                {{ err_message }}
            </v-alert>
            <v-card class="elevation-1 pa-3">
              <v-card-text>
                <div class="layout column align-center">
                    <img :src="this.tenant.logo" :alt="this.tenant.companyname" width="120" height="120">
                    <h3 class="flex my-4 primary--text align-center">Forgot your password?</h3>
                </div>
                <v-form>
                    <v-text-field append-icon="person" name="login" label="Email Address" type="text" v-model="email"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn block color="primary" @click="forgotpassword" :loading="loading">Send Password Reset Link</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
    import auth from '../../auth.js'
    export default {
        data: () => ({
            email: null,
            error: false,
            loading: false,
            err_message: ''
        }),
        computed:  {
            tenant() {
                return this.$store.state.tenant
            }
        },
        methods: {
            Login () {
                this.$router.push({ path: '/login' });
            },
            Register () {
                this.$router.push({ path: '/register' });
            },
            forgotpassword () {
                this.loading = true;
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
                {
                    auth.forgotpassword(this, this.email);
                    return (true);
                }
                this.error = true;
                this.loading = false;
                this.err_message = 'Invalid Email supplied.';
            }
        }
    };
</script>

<style scoped lang="css">
    #forgot {
        height: 50%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        content: "";
        z-index: 0;
    }
</style>
