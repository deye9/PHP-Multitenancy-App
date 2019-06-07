<template>
    <div id="page-alerts">
        <v-container grid-list-xl fluid>
            <v-layout row wrap>
                <v-flex sm12 md12>
                    <v-widget title="Roles">
                        <div slot="widget-content" style="max-height:320px; overflow-y:auto;">
                            <v-list two-line v-for="(role, index) in userRoles" :key="role.id">
                                <v-list-tile>
                                    <v-list-tile-action @click="toggle(index)">
                                        <v-checkbox></v-checkbox>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            <v-edit-dialog :return-value.sync="role.name" lazy @save="save(index)">
                                                <span style="text-decoration: underline dashed blue;">{{ role.name.toUpperCase() }}</span>
                                            <v-text-field slot="input" v-model="role.name" :rules="[max25chars]"
                                                label="Edit" single-line counter></v-text-field>
                                            </v-edit-dialog>
                                        </v-list-tile-title>
                                        <v-list-tile-sub-title> Created On: {{ role.created_at }}. </v-list-tile-sub-title>
                                    </v-list-tile-content>
                                    <v-list-tile-action @click="modify(index, role.userCount)">
                                        <v-list-tile-action-text>{{role.userCount}} user(s)</v-list-tile-action-text>
                                        <v-icon v-if="!role.userCount" color="red lighten-1">
                                            delete
                                        </v-icon>
                                    </v-list-tile-action>
                                </v-list-tile>
                                <v-divider></v-divider>
                            </v-list>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" v-model="roleName" placeholder="Enter Role Name" aria-label="Enter Role Name" aria-describedby="role-button">
                                <div class="input-group-append">
                                    <button type="button" class="btn primary" id="role-button" @click="addRole" style="color:white;">Add Role</button>
                                </div>
                            </div>
                        </div>
                    </v-widget>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    var requestInit = {
        mode: "cors",
        method: "GET",
        cache: "no-cache",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json; charset=utf-8",
            "Authorization": 'Token ' + sessionStorage.getItem('id_token')
        }
    };
    import VWidget from '../components/VWidget';
    export default {
        components: {
            VWidget
        },
        data: () => ({
            userRoles: [],
            roleName: null,
            selectedRoles: [],
            max25chars: v => v.length <= 30 || 'Input too long!',
        }),
        computed: {},
        methods: {
            toggle (index) {
                alert('checkbox');
                // const i = this.selected.indexOf(index)

                // if (i > -1) {
                //     this.selected.splice(i, 1)
                // } else {
                //     this.selected.push(index)
                // }
            },
            async addRole() {
                if (this.$data.roleName !== null) {
                    return await fetch('/graphql',
                    {
                        method: 'POST',
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/json; charset=utf-8",
                            "Authorization": 'Token ' + sessionStorage.getItem('id_token')
                        },
                        body: '{"query":"mutation { createRole(input: {name: \\\"' + this.$data.roleName + '\\\"}) { id, created_at }}"}'
                    })
                        .then(res => res.json())
                        .then(json => {
                            this.$data.userRoles.push({
                                userCount: 0,
                                userInRole: false,
                                name: this.$data.roleName,
                                id: json.data.createRole.id,
                                created_at: json.data.createRole.created_at
                            });
                            this.$data.roleName = null;
                            this.$store.commit('Snackbar', {color: 'primary', text: 'Role has been successfully added.', show: true})
                        })
                        .catch(err => this.$store.commit('Snackbar', {color: 'error', text: err, show: true}));
                } else {
                    this.$store.commit('Snackbar', {color: 'error', text: 'Role name cannot be empty.', show: true});
                }
            },
            async modify (index, userCount) {
                const selectedRole = this.$data.userRoles[index];
                if (userCount <= 0) {
                    return await fetch('/graphql',
                    {
                        method: 'POST',
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/json; charset=utf-8",
                            "Authorization": 'Token ' + sessionStorage.getItem('id_token')
                        },
                        body: '{"query":"mutation { deleteRole(input: {id: ' + selectedRole.id + '}) { id }}"}'
                    })
                        .then(res => res.json())
                        .then(json => {
                            this.$data.userRoles.splice(index, 1);
                            this.$store.commit('Snackbar', {color: 'primary', text: 'Role has been successfully removed.', show: true})
                        })
                        .catch(err => this.$store.commit('Snackbar', {color: 'error', text: err, show: true}));
                }
            },
            async save (index) {
                const selectedRole = this.$data.userRoles[index];
                return await fetch('/graphql',
                {
                    method: 'POST',
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json; charset=utf-8",
                        "Authorization": 'Token ' + sessionStorage.getItem('id_token')
                    },
                    body: '{"query":"mutation { updateRole(input: {id:' + selectedRole.id + ',name: \\\"' + selectedRole.name + '\\\"}) { id }}"}'
                })
                    .then(res => res.json())
                    .then(json => this.$store.commit('Snackbar', {color: 'primary', text: 'Role Name has been successfully updated.', show: true}))
                    .catch(err => this.$store.commit('Snackbar', {color: 'error', text: err, show: true}));
            }
        },
        created() {
            var myRequest = new Request('/graphql?query=query {getUserRoles{id, name, userCount, created_at}}', requestInit);
            return fetch(myRequest)
                .then(res => res.json())
                .then(json => this.$data.userRoles = json.data.getUserRoles)
                .catch(err => this.$store.commit('Snackbar', {color: 'error', text: err, show: true}));
        }
    };
    // Issue a get command to get the roles and associated permissions.
            // query {acl{id,name,permissions{id,name,title,group,icon,component}}}

            // query acl {
            //   acl {
            //   	id
            //     name
            //     created_at
            //     updated_at
            //     permissions {
            //       id
            //       name
            //       title
            //       group
            //       icon
            //     }
            //   }
            // }
</script>
