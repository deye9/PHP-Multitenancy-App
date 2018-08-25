<style scoped>
    .form-gap {
        padding-top: 70px;
    }
</style>

<template>

    <div class="container">

        <br /><br /><br /><br />

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <h3 class="card-header">
                        Reset Password
                    </h3>

                    <div class="card-body">

                        <div class="alert alert-danger" v-if="error">
                            <p>There was an error, unable to reset your password based on those credentials.
                                Kindly try again.
                            </p>
                        </div>

                        <form class="form" autocomplete="off" v-on:submit="resetpassword">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" placeholder="Email Address" v-model="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" v-model="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>
    import auth from './auth.js';

    export default {
        data() {
            return {
                email: null,
                error: false,
                password: null,
                password_confirmation: null
            }
        },
        methods: {
            resetpassword(event) {
                event.preventDefault();
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
                {
                    auth.reset(this, this.email, this.password, this.password_confirmation);
                    return (true);
                }
                this.error = true;
                alert('Invalid Email supplied.');
            }
        }
    }
</script>
