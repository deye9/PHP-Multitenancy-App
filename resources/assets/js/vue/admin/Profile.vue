<style>

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
        </div>

    </div>

</template>

<script>
    import auth from '../../auth.js'

    export default {
        data: function() {
            return {
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
