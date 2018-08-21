<template>

    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-md-8 py-5 border">

                    <h4 class="pb-4">Please fill with your details</h4>

                    <div class="alert alert-danger" v-if="error && !success">
                        <p>There was an error, unable to complete registration.</p>
                    </div>

                    <div class="alert alert-success" v-if="success">
                        <p>Registration completed. You can now sign in.</p>
                    </div>

                    <form class="form-horizontal" autocomplete="off" v-on:submit="register" v-if="!success">

                        <div class="form-row">
                            <div class="form-group col-md-6" v-bind:class="{ 'has-error': error && response.username }">
                                <label for="name">Name</label>
                                <input placeholder="Full Name" type="text" id="name" class="form-control" v-model="name" required>
                                <span class="help-block" v-if="error && response.name">{{ response.name }}</span>
                            </div>

                            <div class="form-group col-md-6" v-bind:class="{ 'has-error': error && response.email }">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" class="form-control" placeholder="username@email.com" v-model="email" required>
                                <span class="help-block" v-if="error && response.email">{{ response.email }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="Mobile No." name="Mobile No." placeholder="Mobile No." class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-6">

                                    <select id="inputState" class="form-control">
                                        <option selected>Choose ...</option>
                                        <option> New Buyer</option>
                                        <option> Auction</option>
                                        <option> Complaint</option>
                                        <option> Feedback</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group" v-bind:class="{ 'has-error': error && response.password }">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
                <span class="help-block" v-if="error && response.password">{{ response.password }}</span>
            </div>
                                    <textarea id="comment" name="comment" cols="40" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                    <label class="form-check-label" for="invalidCheck2">
                                        <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                    </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-row">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 py-5 border bg-primary text-white text-center ">
                    <div class=" ">
                        <div class="card-body">
                            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                            <h2 class="py-3">Registration</h2>
                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.</p>
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
            name: null,
            email: null,
            password: null,
            success: false,
            error: false,
            response: null
        }
    },
    methods: {
        register(event) {
            event.preventDefault();
            auth.register(this, this.name, this.email, this.password);
        }
    }
}
</script>
