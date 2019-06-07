<style>
    .tabs {
        position: relative;
        height: 180px;
        display: block;
        margin: 1em auto 0;
        width: 460px;
    }

    .tab {
        float: left;
    }

    .tab label {
        cursor: pointer;
        background: #c69;
        font-size: 1.2em;
        border-radius: 5px 5px 0 0;
        padding: .5em 1em;
    }

    .tab [type=radio] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }

    .tab [type=radio]:focus + label {
        outline: 2px dotted #000;
    }

    .tab [type=radio]:checked ~ label {
        background: #c99;
    }

    .tab [type=radio]:checked ~ label ~ .content {
        z-index: 1;
    }
</style>

<template>

    <div class="container">

        <br /><br /><br /><br />

        <div v-if="!isAdmin" style="color:black;">
            <h1>
                Not an ADMIN
            </h1>
        </div>

        <div v-if="isAdmin" style="color:black;">
            <h1>
                Admin
            </h1>

<div id="app">
  <v-app id="inspire">
    <v-stepper v-model="e1">
      <v-stepper-header>
        <v-stepper-step :complete="e1 > 1" step="1">Name of step 1</v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 2" step="2">Name of step 2</v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step step="3">Name of step 3</v-stepper-step>
      </v-stepper-header>

      <v-stepper-items>
        <v-stepper-content step="1">
          <v-card
            class="mb-5"
            color="grey lighten-1"
            height="200px"
          ></v-card>

          <v-btn
            color="primary"
            @click="e1 = 2"
          >
            Continue
          </v-btn>

          <v-btn flat>Cancel</v-btn>
        </v-stepper-content>

        <v-stepper-content step="2">
          <v-card
            class="mb-5"
            color="grey lighten-1"
            height="200px"
          ></v-card>

          <v-btn
            color="primary"
            @click="e1 = 3"
          >
            Continue
          </v-btn>

          <v-btn flat>Cancel</v-btn>
        </v-stepper-content>

        <v-stepper-content step="3">
          <v-card
            class="mb-5"
            color="grey lighten-1"
            height="200px"
          ></v-card>

          <v-btn
            color="primary"
            @click="e1 = 1"
          >
            Continue
          </v-btn>

          <v-btn flat>Cancel</v-btn>
        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>
  </v-app>
</div>
        </div>
    </div>

</template>

<script>
    import auth from '../../auth.js'

    export default {
        data: function() {
            return {
                e1: 0,
                isAdmin: false
            }
        },
        created: function () {
            var _roles = auth.user.profile.user.roles;
            var obj = _roles[_roles.findIndex(x => x.name == 'admin')];

            if (typeof obj !== "undefined") {
                this.isAdmin = true;
            }
        }
    }
</script>
