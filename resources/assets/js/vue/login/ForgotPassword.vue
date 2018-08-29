<template>

    <div class="container">

        <br /><br /><br /><br />

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <h3 class="card-header">
                        Forgot your password?
                    </h3>

                    <div class="form-gap"></div>

                    <div class="card-body">
                        <div class="text-center">
                            <h3>
                                <font-awesome-icon icon="lock" size="4x" />
                            </h3>

                            <div class="alert alert-danger" v-if="error">
                                <p>There was an error, unable to reset your password based on those credentials.
                                    Kindly try again.
                                </p>
                            </div>
                            <p>
                                Kindly input the Email address you used to register / log into to your account
                                We'll send you an email with instructions to choose a new password.
                            </p>
                            <form class="form" autocomplete="off" v-on:submit="forgotpassword">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon">@</div>
                                    </div>
                                    <input type="email" id="email" class="form-control" placeholder="Email Address" v-model="email" required>
                                </div>

                                <p style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary right">
                                        Send Password Reset Link
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>
    import auth from '../../auth.js'

    export default {
        data() {
            return {
                email: null,
                error: false,
            }
        },
        methods: {
            forgotpassword(event) {
                event.preventDefault();
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
                {
                    auth.forgotpassword(this, this.email);
                    return (true);
                }
                this.error = true;
                alert('Invalid Email supplied.');
            }
        }
    }
</script>
