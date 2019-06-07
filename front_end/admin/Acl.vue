<template>
    <div id="page-alerts">
        <v-container grid-list-xl fluid>
            <v-layout row wrap>
                <v-flex sm12 md12>
                    <v-widget title="Setup Access Control via Roles">
                        <div slot="widget-content">
                            <v-combobox label="Select Role" autocomplete required :items="userRoles"
                            item-text="name" item-value="id" v-model="selectedRole" return-object
                            v-on:change="getPermissions"></v-combobox>

                            <div px5 my4>
                                <div class="row">
                                    <div class="dual-list list-left col-md-5">
                                        <div class="jumbotron">
                                            <p class="text-center"><strong id="usersTitle"> Role Permissions </strong></p>

                                            <div class="row">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text fa fa-search"></span>
                                                    </div>
                                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                                </div>
                                            </div>
                                            <ul class="list-group in_role" style="max-height: 250px; overflow-y: scroll;"></ul>
                                        </div>
                                    </div>

                                    <div class="list-arrows col-md-1 text-center">
                                        <button class="btn move-left primary" fab dark small @click="AllocatePermissions('move-left', '.available_menus')">
                                            <span class="fas fa-chevron-left"></span>
                                        </button>

                                        <button class="btn move-right primary" fab dark small @click="AllocatePermissions('move-right')">
                                            <span class="fas fa-chevron-right"></span>
                                        </button>
                                    </div>

                                    <div class="dual-list list-right col-md-5">
                                        <div class="jumbotron">
                                            <p class="text-center"><strong> Available Menu's </strong></p>
                                            <div class="row">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="SearchDualList" @keyup="SearchList('SearchDualList', '.available_menus');" class="form-control" placeholder="search" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text fa fa-search"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <v-list dense expand class="available_menus" style="max-height: 250px; overflow-y: scroll;">
                                                <template v-for="(item, i) in menus">
                                                    <!--group with subitems-->
                                                    <v-list-group v-if="item.items" :key="item.name" :group="item.group" :prepend-icon="item.icon" no-action="no-action">
                                                        <v-list-tile slot="activator" ripple="ripple">
                                                            <v-list-tile-content>
                                                                <v-list-tile-title>
                                                                    {{ item.title }}
                                                                </v-list-tile-title>
                                                            </v-list-tile-content>
                                                        </v-list-tile>
                                                        <template v-for="(subItem, i) in item.items">
                                                            <!--sub group-->
                                                            <v-list-group v-if="subItem.items" :key="subItem.name" :group="subItem.group" sub-group="sub-group">
                                                                <v-list-tile slot="activator" ripple="ripple">
                                                                    <v-list-tile-content>
                                                                        <v-list-tile-title>{{ subItem.title }}</v-list-tile-title>
                                                                    </v-list-tile-content>
                                                                </v-list-tile>
                                                                <v-list-tile v-for="(grand, i) in subItem.children" :key="i" :to="genChildTarget(item, grand)" :href="grand.href" ripple="ripple">
                                                                    <v-list-tile-content>
                                                                        <v-list-tile-title>{{ grand.title }}</v-list-tile-title>
                                                                    </v-list-tile-content>
                                                                </v-list-tile>
                                                            </v-list-group>
                                                            <!--child item-->
                                                            <v-list-tile :title="subItem.title" @click.prevent='toggle(subItem, `chk_${subItem.name.replace(/ /g,"_")}`)' v-else :key="i" :href="subItem.href" :disabled="subItem.disabled" :target="subItem.target" ripple="ripple">
                                                                <v-list-tile-action style="margin-top:12px;">
                                                                    <v-checkbox v-bind:id='`chk_${subItem.name.replace(/ /g,"_")}`' :data-menu="subItem.title" :data-parent="item.title"></v-checkbox>
                                                                </v-list-tile-action>
                                                                <v-list-tile-content>
                                                                    <v-list-tile-title><span>{{ subItem.title }}</span></v-list-tile-title>
                                                                </v-list-tile-content>
                                                                <v-list-tile-action v-if="subItem.action">
                                                                    <v-icon :class="[subItem.actionClass || 'success--text']">{{ subItem.action }}</v-icon>
                                                                </v-list-tile-action>
                                                            </v-list-tile>
                                                        </template>
                                                    </v-list-group>
                                                    <v-subheader v-else-if="item.header" :key="i">{{ item.header }}</v-subheader>
                                                    <v-divider v-else-if="item.divider" :key="i"></v-divider>
                                                    <!--top-level link-->
                                                    <v-list-tile :title="item.title" @click.prevent='toggle(item, `chk_${item.name.replace(/ /g,"_")}`)' v-else :href="item.href" ripple="ripple" :disabled="item.disabled" :target="item.target" rel="noopener" :key="item.name">
                                                        <v-list-tile-action style="margin-top:12px;">
                                                            <v-checkbox v-bind:id='`chk_${item.name.replace(/ /g,"_")}`' :data-menu="item.title" data-parent="self"></v-checkbox>
                                                        </v-list-tile-action>
                                                        <v-list-tile-action v-if="item.icon">
                                                            <v-icon>{{ item.icon }}</v-icon>
                                                        </v-list-tile-action>
                                                        <v-list-tile-content>
                                                            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                                                        </v-list-tile-content>
                                                        <v-list-tile-action v-if="item.subAction">
                                                            <v-icon class="success--text">{{ item.subAction }}</v-icon>
                                                        </v-list-tile-action>
                                                    </v-list-tile>
                                                </template>
                                            </v-list>
                                        </div>
                                    </div>
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
    import menu from '../api/menu';
    import VWidget from '../components/VWidget';

    export default {
        components: {
            VWidget,
        },
        data: () => ({
            menus: menu,
            userRoles: [],
            selectedRole: null,
        }),
        computed: { },
        methods: {
            toggle (_item, _ctrl) {
                // // Check if the checkbox is checked and set the checked state.
                // const IsChecked = document.getElementById(_ctrl).checked;
                // document.getElementById(_ctrl).checked = !IsChecked; //.setAttribute('aria-checked', !IsChecked);

                this.$nextTick(() => {
                    let elt = document.getElementById(_ctrl);
                    if(elt.checked) {
                        document.getElementById(_ctrl).checked = false;
                    } else {
                        document.getElementById(_ctrl).checked = true;
                    }
                });
                // '`chk_${subItem.name.replace(/ /g,"_")}`'

                // const i = this.selected.indexOf(index)

                // if (i > -1) {
                //     this.selected.splice(i, 1)
                // } else {
                //     this.selected.push(index)
                // }
            },
             titleCase (str) {
                return str.toLowerCase().split(' ').map(function(word) {
                    return (word.charAt(0).toUpperCase() + word.slice(1));
                }).join(' ');
            },
            SearchList(_Ctrl, searchIn) {
                const searchText = this.titleCase(document.getElementById(_Ctrl).value);

                // Get all objects within the container we are searching.
                const container = document.querySelector(searchIn);

                // Place all Anchors inside an Array using the Array Spread Operator
                const anchorContainer = [...container.querySelectorAll("div > a")];

                // Show all elements.
                anchorContainer.forEach(filter => {
                    filter.parentElement.style.display = "block";
                });

                // Get all Valid and Invalid Anchors
                const valid = anchorContainer.filter(anchors => anchors.title.includes(searchText));
                const invalid = anchorContainer.filter(anchors => anchors.title.indexOf(searchText) === -1);

                // Hide all anchors that don't match.
                invalid.forEach(filter => {
                    filter.parentElement.style.display = "none";

                    // Hide all elements based on ClassName.
                    if (filter.parentElement.parentElement.className === 'v-list__group__items v-list__group__items--no-action')
                    {
                        filter.parentElement.parentElement.parentElement.style.display = "none";
                    }
                });

                // Display all valid Anchors.
                valid.forEach(filter => {
                    filter.parentElement.style.display = "block";
                    filter.parentElement.parentElement.parentElement.style.display = "block";
                });

                document.getElementsByClassName('v-list available_menus v-list--dense theme--light')[0].style.dispay = "block";
            },
            AllocatePermissions(_Direction, searchIn) {
                if (_Direction.toLowerCase() === 'move-left') {
                    var chkBoxes = document.querySelectorAll('[aria-checked="true"]');
                    console.log(chkBoxes);
                } else if(_Direction.toLowerCase() === 'move-right') {

                }
                // move-right, move-left
                // $('.list-arrows button').click(function () {
                //     var $button = $(this), actives = '';
                //     if ($button.hasClass('move-left')) {
                //         actives = $('.list-right ul li.active');
                //         actives.clone().appendTo('.list-left ul');
                //         actives.remove();
                //     } else if ($button.hasClass('move-right')) {
                //         actives = $('.list-left ul li.active');
                //         actives.clone().appendTo('.list-right ul');
                //         actives.remove();
                //     }
                // });
            },
            getPermissions() {
                console.log(this.$data.selectedRole);
            },
            genChildTarget (item, subItem) {
                if (subItem.href) return;

                if (subItem.component) {
                    return {
                        name: subItem.component,
                    };
                }

                return { name: `${item.group}/${(subItem.name)}` };
            },
        },
        created() {
            var myRequest = new Request('/graphql?query=query {getUserRoles{id, name, userCount, created_at}}', requestInit);
            return fetch(myRequest)
                .then(res => res.json())
                .then(json => this.$data.userRoles = json.data.getUserRoles)
                .catch(err => this.$store.commit('Snackbar', {color: 'error', text: 'An error occurred while retrieving registered Roles. Kindly try again.', show: true}));
        }
    };
</script>

<style scoped>
    .dual-list .list-group {
            margin-top: 8px;
        }
        .list-left li, .list-right li {
            cursor: pointer;
        }
        .list-arrows {
            padding-top: 100px;
        }
            .list-arrows button {
                margin-bottom: 20px;
            }
</style>
