<template>

    <section class="login-block">
        <br /><br />
        <div class="container">

            <div class="row">

                <div class="col-md-4 login-sec border">

                    <h2 class="text-center">Login Now</h2>

                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, unable to sign in with those credentials.</p>
                    </div>

                    <form class="login-form form" autocomplete="off" v-on:submit="signin">

                        <div class="form-group">
                            <label for="email" class="control-label">E-Mail Address</label>
                            <input type="email" id="email" class="form-control" placeholder="username@email.com" v-model="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div>
                                <input type="password" id="password" class="form-control" v-model="password" required>
                            </div>
                        </div>

                        <div class="form-check">
                            <button type="submit" class="btn btn-login float-right"> Sign In </button>
                        </div>

                        <br />

                        <a class="btn btn-link" href="password.request">
                            Forgot Your Password?
                        </a>

                    </form>

                </div>

                <div class="col-md-8 banner-sec border">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="/images/pexels-photo.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="/images/people-coffee-tea-meeting.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

</template>

<script>
    import auth from './auth.js';

    export default {
        data() {
            return {
                email: null,
                error: false,
                password: null,
            }
        },
        methods: {
            signin(event) {
                event.preventDefault()
                auth.signin(this, this.email, this.password)
            }
        }
    }
</script>

<style scoped>
    /* @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"); */
    .login-block {
        height: 100vh;
        /* background: #DE6262; */
        /* fallback for old browsers */
        /* background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262); */
        /* Chrome 10-25, Safari 5.1-6 */
        /* background: linear-gradient(to bottom, #FFB88C, #DE6262); */
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        /* float: left; */
        /* width: 100%; */
        padding: 50px 0;
    }

    .banner-sec {
        background: url(/images/pexels-photo.jpg) no-repeat left bottom;
        background-size: cover;
        min-height: 500px;
        border-radius: 0 10px 10px 0;
        padding: 0;
    }

    .container {
        background: #fff;
        border-radius: 10px;
        /* box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1); */
    }

    .carousel-inner {
        border-radius: 0 10px 10px 0;
    }

    .carousel-caption {
        text-align: left;
        left: 5%;
    }

    .login-sec {
        padding: 50px 30px;
        position: relative;
    }

    .login-sec .copy-text {
        position: absolute;
        width: 80%;
        bottom: 20px;
        font-size: 13px;
        text-align: center;
    }

    .login-sec .copy-text i {
        color: #FEB58A;
    }

    .login-sec .copy-text a {
        color: #E36262;
    }

    .login-sec h2 {
        margin-bottom: 30px;
        font-weight: 800;
        font-size: 30px;
        color: #DE6262;
    }

    .login-sec h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FEB58A;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
        margin-left: auto;
        margin-right: auto
    }

    .btn-login {
        background: #DE6262;
        color: #fff;
        font-weight: 600;
    }

    .banner-text {
        width: 70%;
        position: absolute;
        bottom: 40px;
        padding-left: 20px;
    }

    .banner-text h2 {
        color: #fff;
        font-weight: 600;
    }

    .banner-text h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FFF;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
    }

    .banner-text p {
        color: #fff;
    }
</style>
