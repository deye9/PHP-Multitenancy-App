<template>

    <div class="content">

        <h2 class="text-center">Register Your Tenant</h2>

        <hr />

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">
                    <label for="schoolname" class="col-md-12 control-label field-label-responsive"> Tenant Name </label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="schoolname" id="schoolname" placeholder="Enter your Tenant Name" tabindex="1" required v-model.trim="schoolname" @blur="isvalid" />
                            <div class="input-group-append">
                                <span class="input-group-text" id="urlspan">.{{url}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-12 control-label field-label-responsive"> Email Address </label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" v-model="email" name="email" class="form-control" id="email" placeholder="you@example.com" required >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cemail" class="col-md-12 control-label field-label-responsive"> Confirm Email Address </label>
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" name="cemail" v-model="cemail" class="form-control" id="cemail" placeholder="you@example.com" required >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-12 control-label field-label-responsive"> Password </label>
                    <div class="col-md-12">
                        <div class="form-group has-danger pass_show">
                            <div class="input-group">
                                <input type="password" name="password" v-model="password" class="form-control" id="password" placeholder="Password" @focus="isfocused" @blur="isblured" @keyup="keymonitor" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="passwordconfirm" class="col-md-12 control-label field-label-responsive"> Confirm Password </label>
                    <div class="col-md-12">
                        <div class="form-group has-danger pass_show">
                            <div class="input-group">
                                <input type="password" name="passwordconfirm" v-model="passwordconfirm" class="form-control" id="passwordconfirm" placeholder="Password" @focus="isfocused" @blur="isblured" @keyup="keymonitor" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <h3 class="dark-grey text-center underline"> Disclaimer </h3>

                <p>
                    By clicking on <strong>"Register"</strong> you agree to {{title}}'s <strong>Policies</strong> which includes our
                    Terms of Use and Privacy policies.
                </p>

                <p>
                    While rare, each school is to draft out her respective Terms of Use and Privacy Policies.
                    Failure to draft it will result in the school been blacklisted from {{title}}.
                </p>

                <p>
                    <strong>{{title}}</strong> will not be held responsible for any action should you fail to setup your Terms of Use and Privacy Policies.
                </p>

                <hr />

                <div id="pswd_info">
                    <h4>Password must meet requirements</h4>
                    <ul>
                        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                        <li id="number" class="invalid">At least <strong>one number</strong></li>
                        <li id="length" class="invalid">Be at least <strong>6 characters</strong></li>
                        <li id="space" class="invalid">Must <strong> use [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
                    </ul>
                </div>

                <button id="RegSchool" type="button" class="btn btn-primary float-right" disabled @click="RegisterSchool">Register</button>
            </div>

        </div>

    </div>

</template>

<script>
    export default {
        data: function() {
            return {
                email: '',
                cemail: '',
                password: '',
                schoolname: '',
                passwordconfirm: '',
                profile: {
                    isAvailableURL: 'api/tenant/isavailable/',
                    schoolRegistration: 'api/tenant/registerschool',
                    emailsError: 'Emails do not match. Kindly correct it.',
                    passwordError: 'Passwords do not match. Kindly correct it.',
                    isavailableError: 'Unfortunately we are unable to determine the status of your request. Please check your data and re-try. Thanks.'
                }
            }
        },
        props: {
            url: String,
            title: String
        },
        methods: {
            isfocused() {
		        $('#pswd_info').show();
            },
            isblured() {
                $('#pswd_info').hide();
                $('#space').removeClass('valid').addClass('invalid');
                $('#number').removeClass('valid').addClass('invalid');
                $('#length').removeClass('valid').addClass('invalid');
                $('#letter').removeClass('valid').addClass('invalid');
                $('#capital').removeClass('valid').addClass('invalid');
            },
            isvalid() {
                // Disable the submit button by default here.
                document.getElementById("RegSchool").disabled = true;

                if (!schoolname.value && schoolname.value !== '') {
                    Notify(js_schoolerp.toastType.Error, 'School Name cannot be empty');
                    return false;
                }

                this.$http.get(this.profile.isAvailableURL + schoolname.value).then((response) => {
                    if (response.body.status.toLowerCase() === 'success') {
                        document.getElementById("RegSchool").disabled = false;
                        document.getElementById("urlspan").style.color = 'black';
                        document.getElementById("urlspan").style.backgroundColor = 'skyblue';
                        Notify(js_schoolerp.toastType.Info, response.body.message);
                    } else {
                        document.getElementById("urlspan").style.color = 'white';
                        document.getElementById("urlspan").style.backgroundColor = 'red';
                        Notify(js_schoolerp.toastType.Error, response.body.message);
                    }
                }, (error) => {
                        document.getElementById("urlspan").style.color = 'white';
                        document.getElementById("urlspan").style.backgroundColor = 'red';
                        if (error.hasOwnProperty("body")) {
                            Notify(js_schoolerp.toastType.Error, error.body.message);
                        } else {
                            Notify(js_schoolerp.toastType.Error, this.profile.isavailableError);
                        }
                });
            },
            keymonitor(event) {
                var pswd = document.getElementById(event.srcElement.id).value;

                //validate the length
                if (pswd.length < 6 ) {
                    $('#length').removeClass('valid').addClass('invalid');
                } else {
                    $('#length').removeClass('invalid').addClass('valid');
                }

                //validate letter
                if ( pswd.match(/[A-z]/) ) {
                    $('#letter').removeClass('invalid').addClass('valid');
                } else {
                    $('#letter').removeClass('valid').addClass('invalid');
                }

                //validate capital letter
                if ( pswd.match(/[A-Z]/) ) {
                    $('#capital').removeClass('invalid').addClass('valid');
                } else {
                    $('#capital').removeClass('valid').addClass('invalid');
                }

                //validate number
                if ( pswd.match(/\d/) ) {
                    $('#number').removeClass('invalid').addClass('valid');
                } else {
                    $('#number').removeClass('valid').addClass('invalid');
                }

                //validate space
                if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
                    $('#space').removeClass('invalid').addClass('valid');
                } else {
                    $('#space').removeClass('valid').addClass('invalid');
                }
            },
            RegisterSchool() {
                // Disable the submit button by default and change the text.
                document.getElementById("RegSchool").disabled = true;
                document.getElementById("RegSchool").innerHTML = "Registering " + schoolname.value + ".";

                if (!email) {
                    Notify(js_schoolerp.toastType.Error, this.profile.emailsError);
                    return false;
                }

                if (!password) {
                    Notify(js_schoolerp.toastType.Error, this.profile.emailsError);
                    return false;
                }

                if (email.value !== cemail.value) {
                    Notify(js_schoolerp.toastType.Error, this.profile.emailsError);
                    return false;
                }

                if (password.value !== passwordconfirm.value) {
                    Notify(js_schoolerp.toastType.Error, this.profile.passwordError);
                    return false;
                }

                var schooldata = {
                    "email": email.value,
                    "name": schoolname.value,
                    "password": password.value
                };

                this.$http.post(this.profile.schoolRegistration, schooldata).then((response) => {
                    this.$store.commit('response', {
                            status: response.body.status,
                            message: response.body.message
                        }
                    );
                }, (error) => {
                    this.$store.commit('response', {
                            status: 'Error',
                            message: error.body
                        }
                    );

                    // Enable the submit button by default here.
                    document.getElementById("RegSchool").disabled = false;
                });
            },
        },
    }
</script>

<style>
    #pswd_info {
        background: #dfdfdf none repeat scroll 0 0;
        color: #fff;
    }

    #pswd_info h4{
        background: black none repeat scroll 0 0;
        display: block;
        font-size: 14px;
        letter-spacing: 0;
        padding: 17px 0;
        text-align: center;
        text-transform: uppercase;
    }

    #pswd_info ul {
        list-style: outside none none;
    }

    #pswd_info ul li {
        padding: 10px 45px;
    }

    .valid {
        color: green;
        line-height: 21px;
        padding-left: 22px;
    }

    .invalid {
        color: red;
        line-height: 21px;
        padding-left: 22px;
    }

    #pswd_info::before {
        background: #dfdfdf none repeat scroll 0 0;
        content: "";
        transform: rotate(45deg);
        width: 25px;
    }

    #pswd_info {
        display:none;
    }
</style>
