<template>
    <div>
        <v-pagination ref="pager" v-model="page" :length="paginationLength" :total-visible="totalVisible" @input="onpageChange" dark circle></v-pagination>

        <v-btn id="saveBtn" :color="saveClass" dark @click="$emit('saveDeferred');" v-show="displaySave">
            {{saveName}}
            <v-icon dark right>{{saveIcon}}</v-icon>
        </v-btn>

        <v-btn id="deleteBtn" :color="deleteClass" dark @click="$emit('deleteDeferred');" v-show="displayDelete">
            {{deleteName}}
            <v-icon dark right>{{deleteIcon}}</v-icon>
        </v-btn>

        <v-btn id="clearBtn" dark @click="clearForm" v-show="displayClear">
            {{clearName}}
            <v-icon right>{{clearIcon}}</v-icon>
        </v-btn>
    </div>
</template>

<script>
    import gql from 'graphql-tag';
    export default {
        props: {
            dataset: {
                type: Object,
                default: null
            },
            saveClass: {
                type: String,
                default: 'primary'
            },
            deleteName: {
                type: String,
                default: 'Delete'
            },
            deleteIcon: {
                type: String,
                default: 'delete'
            },
            deleteClass: {
                type: String,
                default: 'error'
            },
            clearName: {
                type: String,
                default: 'Clear'
            },
            clearIcon: {
                type: String,
                default: 'remove_circle'
            },
            displaySave: {
                type: Boolean,
                default: false
            },
            TotalRecords: {
                default: 0,
                type: Number
            }
        },
        data: () => ({
            page: 1,
            saveIcon: 'save',
            displayClear: false,
            displayDelete: false,
            saveName: 'Add Record'
        }),
        computed: {
            totalVisible() {
                if (this.TotalRecords <= 9) {
                    return this.TotalRecords;
                } else {
                    return 10;
                }
            },
            paginationLength() {
                return this.TotalRecords;
            }
        },
        methods: {
            clearForm() {
                this.$data.page = 1;
                this.$emit('clearDeferred');
                this.$data.saveIcon = "save";
                this.$data.displayClear = false;
                this.$data.displayDelete = false;
                this.$data.saveName = "Add Record";
            },
            onpageChange(pageNos) {
                this.$data.saveIcon = "update";
                this.$data.displayClear = true;
                this.$data.displayDelete = true;
                this.$emit('pageChanged', pageNos);
                this.$data.saveName = "Update Record";
            }
        },
        reset() {
            document.getElementById('clearBtn').click();
        },
        toggleSave() {
            if (document.getElementById('saveBtn').disabled == false) {
                document.getElementById('saveBtn').disabled = true;
            } else {
                document.getElementById('saveBtn').disabled = false;
            }
        },
        toggleDelete() {
            if (document.getElementById('deleteBtn').disabled == false) {
                document.getElementById('deleteBtn').disabled = true;
            } else {
                document.getElementById('deleteBtn').disabled = false;
            }
        }
    }
</script>
