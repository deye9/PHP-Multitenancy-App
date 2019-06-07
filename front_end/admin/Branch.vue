<template>
    <div id="page-alerts">
        <v-container grid-list-xl fluid>
            <v-layout row wrap>
                <v-flex lg12>
                    <v-widget title="Branch Offices...">
                        <div slot="widget-header-action">
                            <v-btn fab dark small color="primary" @click="clearFormData">
                                <v-icon>add</v-icon>
                            </v-btn>
                        </div>
                        <div slot="widget-content">
                            <v-layout wrap justify-space-around align-center class="ma-0">
                                <v-form ref="form" lazy-validation>
                                    <v-layout row wrap>
                                        <v-flex sm6 lg6>
                                            <v-text-field id="branchurl" class="tolower" :suffix="setDomain" label="Url" v-model="branch.branchUrl" :hint="`https://${this.tenant.companyname.toLowerCase()}_${branch.branchUrl}${setDomain}`" v-validate="'required'" data-vv-name="branchUrl" :error-messages="errors.collect('branchUrl')" required></v-text-field>
                                        </v-flex>
                                        <v-flex sm6 lg6>
                                            <v-text-field label="Branch Name" v-model="branch.branchName" v-validate="'required'" data-vv-name="branchName" :error-messages="errors.collect('branchName')" required></v-text-field>
                                        </v-flex>

                                        <v-flex sm6 lg6>
                                            <v-combobox label="Parent Office" autocomplete required :items="offices" item-text="value" item-value="id" v-model="branch.ReportsTo" return-object></v-combobox>
                                        </v-flex>
                                        <v-flex sm6 lg6>
                                            <v-combobox label="Currency" autocomplete required :items="currencies" v-model="branch.currency"
                                            item-text="name" item-value="symbol" :hint="`${branch.currency.name}, ${branch.currency.symbol}`" persistent-hint return-object></v-combobox>
                                        </v-flex>

                                        <v-flex sm6 lg6>
                                            <v-text-field label="Email" v-validate="'required|email'" data-vv-name="email" :error-messages="errors.collect('email')" v-model="branch.email" required></v-text-field>
                                        </v-flex>
                                        <v-flex sm6 lg6>
                                            <v-text-field label="Phone" name="Phone" placeholder="+(###) ###-####-####" v-validate="'required'" data-vv-name="phone" :error-messages="errors.collect('phone')" v-model="branch.phone" return-masked-value mask="+(###) ###-####-####" required></v-text-field>
                                        </v-flex>

                                        <v-flex sm6 lg6>
                                            <v-combobox label="Country" autocomplete required :items="countries" v-model="branch.country"
                                            item-text="country" item-value="abbr" :hint="`${branch.country.country}, ${branch.country.abbr}`" persistent-hint return-object></v-combobox>
                                        </v-flex>
                                        <v-flex sm6 lg6>
                                            <v-text-field label="State" v-validate="'required'" data-vv-name="state" :error-messages="errors.collect('state')" v-model="branch.state" required></v-text-field>
                                        </v-flex>

                                        <v-flex sm6 lg6>
                                            <v-menu ref="startTime" :close-on-content-click="false" v-model="startTimeMenu" transition="scale-transition" offset-y full-width :nudge-bottom="-24" max-width="290px" :return-value.sync="branch.startTime">
                                            <v-text-field slot="activator" label="Resumption Time" v-model="branch.startTime" append-icon="access_time" readonly v-validate="'required'" data-vv-name="startTime" :error-messages="errors.collect('startTime')" required></v-text-field>
                                            <v-time-picker v-model="branch.startTime">
                                                <v-spacer></v-spacer>
                                                <v-btn flat color="primary" @click="startTimeMenu = false">Cancel</v-btn>
                                                <v-btn flat color="primary" @click="$refs.startTime.save(branch.startTime)">OK</v-btn>
                                            </v-time-picker>
                                            </v-menu>
                                        </v-flex>
                                        <v-flex sm6 lg6>
                                            <v-menu ref="endTime" lazy :close-on-content-click="false" v-model="endTimeMenu" transition="scale-transition" offset-y full-width :nudge-bottom="-24" max-width="290px" :return-value.sync="branch.endTime">
                                            <v-text-field slot="activator" label="Closing Time" v-model="branch.endTime" append-icon="access_time" readonly v-validate="'required'" data-vv-name="endTime" :error-messages="errors.collect('endTime')" required></v-text-field>
                                            <v-time-picker v-model="branch.endTime" >
                                                <v-spacer></v-spacer>
                                                <v-btn flat color="primary" @click="endTimeMenu = false">Cancel</v-btn>
                                                <v-btn flat color="primary" @click="$refs.endTime.save(branch.endTime)">OK</v-btn>
                                            </v-time-picker>
                                            </v-menu>
                                        </v-flex>
                                        </v-layout>
                                    </v-form>
                            </v-layout>
                        </div>
                        <div slot="widget-footer-action">
                            <footer-toolbar :TotalRecords="branches.length" @pageChanged="onpageChange" displaySave
                                v-on:saveDeferred="saveFormData" v-on:deleteDeferred="deleteFormData" v-on:clearDeferred="clearFormData">
                            </footer-toolbar>
                        </div>
                    </v-widget>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    import gql from 'graphql-tag';
    import Countries from '../api/country';
    import Currencies from '../api/currencies';
    import VWidget from '../components/VWidget';
    import FooterToolbar from '../components/helpers/Footer';

    export default {
        apollo: {
            branchesDataset: {
                query: gql`query getBranchDetails($details: String!) {filterbykey(key: $details) { id, value }}`,
                variables() {
                    return {
                        details: "branch",
                    }
                },
                update(data) {
                    this.$data.branches = data.filterbykey;
                },
                error(error) {
                    this.$store.commit('Snackbar', {color: 'error', text: 'Unable to retrieve Branch Offices.', show: true});
                }
            },
            officessDataset: {
                query: gql`query getBranchSummary { getbranches { id, value }}`,
                update(data) {
                    this.$data.offices = data.getbranches;
                },
                error(error) {
                    this.$store.commit('Snackbar', {color: 'error', text: 'Unable to retrieve Branch Offices Summary.', show: true});
                }
            },
        },
        components: {
            VWidget,
            FooterToolbar
        },
        data: () => ({
            id: 0,
            page: 1,
            offices: [],
            branches: [],
            branch: {
                phone: null,
                email: null,
                state: null,
                endTime: null,
                startTime: null,
                branchUrl: null,
                branchName: null,
                ReportsTo: { id: 0, value: "Head Office" },
                country: { 'country': 'Nigeria', 'abbr': 'NG'},
                currency: { symbol: '₦', name: 'Nigerian Naira' },
            },
            modal: false,
            endTimeMenu: false,
            startTimeMenu: false,
            countries: Countries,
            currencies: Currencies,
        }),
        computed:  {
            tenant() {
                return this.$store.state.tenant
            },
            setDomain() {
                var str = window.location.hostname.split(".");
                return '.' + str.splice(1,2).join(".").toLowerCase();
            },
            getOfficeSummary() {
                this.$apollo.query({
                    query: gql`query getBranchSummary { getbranches { id, value }}`,
                }).then(result => this.$data.offices = result.data.getbranches);
            }
        },
        methods: {
            closeDialog() {
                this.$parent.isActive = false;
            },
            clearFormData() {
                this.$data.id = 0;
                this.$data.page = 1;
                for (var key in this.branch) {
                    if (key !== 'currency')
                    {
                        this.branch[key] = null;
                    } else {
                        this.currency = { name: 'Nigerian Naira', symbol: '₦' };
                    }
                }
                FooterToolbar.reset();
                document.getElementById('branchurl').focus();
                this.$apollo.queries.officessDataset.refetch();
                this.$apollo.queries.branchesDataset.refetch();
                document.getElementById('branchurl').readOnly = false;
            },
            saveFormData() {
                FooterToolbar.toggleSave();

                // Call to the graphql mutation
                if (this.$data.id >= 1) {
                    this.$apollo.mutate({
                        // Mutation Query
                        mutation: gql`mutation($label: UpdateMetadataInput!) { updateMetadata(input: $label) { id, key, value } }`,
                        // Parameters
                        variables: {
                            label: {'id': this.$data.id, key: "Branch", value: JSON.stringify(this.$data.branch)}
                        },
                        // Optimistic UI. Will be treated as a 'fake' result as soon as the request is made so that the UI can react quickly and the user be happy
                        optimisticResponse: {
                            __typename: 'Mutation',
                            updateMetadata: {
                                id: this.$data.id,
                                key: 'Branch',
                                value: '',
                                __typename: 'Metadata',
                            },
                        },
                    }).then((data) => {
                        this.clearFormData();
                        FooterToolbar.toggleSave();
                        this.$store.commit('Snackbar', {color: 'primary', text: 'Branch has been successfully updated.', show: true});
                    }).catch((error) => {
                        FooterToolbar.toggleSave();
                        this.$store.commit('Snackbar', {color: 'error', text: error.message.replace("GraphQL error: ", ''), show: true});
                    });
                } else {
                    this.$apollo.mutate({
                        // Mutation Query
                        mutation: gql`mutation($label: CreateMetadataInput!) { createMetadata(input: $label) { id, key, value } }`,
                        // Parameters
                        variables: {
                            label: {key: "Branch", value: JSON.stringify(this.$data.branch)}
                        },
                        // Optimistic UI. Will be treated as a 'fake' result as soon as the request is made so that the UI can react quickly and the user be happy
                        optimisticResponse: {
                            __typename: 'Mutation',
                            createMetadata: {
                                id: 0,
                                key: 'Branch',
                                value: '',
                                __typename: 'Metadata',
                            }
                        },
                    }).then((data) => {
                        this.clearFormData();
                        FooterToolbar.toggleSave();
                        this.$store.commit('Snackbar', {color: 'primary', text: 'Branch has been successfully registered.', show: true});
                    }).catch((error) => {
                        FooterToolbar.toggleSave();
                        this.$store.commit('Snackbar', {color: 'error', text: error.message.replace("GraphQL error: ", ''), show: true});
                    });
                }
            },
            deleteFormData() {
                FooterToolbar.toggleDelete();

                this.$apollo.mutate({
                    // Mutation Query
                    mutation: gql`mutation($label: DeleteMetadataInput!) { deleteMetadata(input: $label) { id } }`,
                    // Parameters
                    variables: {
                        label: {'id': this.$data.id}
                    },
                    // Optimistic UI. Will be treated as a 'fake' result as soon as the request is made so that the UI can react quickly and the user be happy
                    optimisticResponse: {
                        __typename: 'Mutation',
                        deleteMetadata: {
                            id: this.$data.id,
                            key: 'Branch',
                            value: '',
                            __typename: 'Metadata',
                        },
                    },
                }).then((data) => {
                    this.clearFormData();
                    FooterToolbar.toggleDelete();
                    this.$store.commit('Snackbar', {color: 'primary', text: 'Branch has been successfully updated.', show: true});
                }).catch((error) => {
                    FooterToolbar.toggleDelete();
                    this.$store.commit('Snackbar', {color: 'error', text: error.message.replace("GraphQL error: ", ''), show: true});
                });
            },
            onpageChange(pageNos) {
                this.$data.page = pageNos - 1;
                document.getElementById('branchurl').readOnly = true;
                this.$data.id = this.$data.branches[this.$data.page]['id'];
                this.$data.branch = JSON.parse(this.$data.branches[this.$data.page]['value']);
            }
        },
    };
</script>

<style scoped>
    .tolower{
        text-transform: lowercase;
    }
</style>
