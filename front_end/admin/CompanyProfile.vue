<template>
  <div id="page-steppers">
    <v-container grid-list-xl fluid>
        <v-layout row wrap>
            <v-flex sm12>
                <v-stepper v-model="step">
                    <v-stepper-header>
                        <v-stepper-step step="1" :complete="step > 1">
                            Company Details
                        </v-stepper-step>
                        <v-divider></v-divider>
                        <v-stepper-step step="2" :complete="step > 2">
                            Theme Settings
                        </v-stepper-step>
                        <v-divider></v-divider>
                        <v-stepper-step step="3">
                            Official Documents
                        </v-stepper-step>
                    </v-stepper-header>
                    <v-stepper-items>
                    <v-stepper-content step="1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="companyname" class="col-4 col-form-label"> Company Name <i style="color:red;">*</i> </label>
                                    <div class="col-8">
                                        <input id="companyname" name="companyname" v-model="registration.companyname" placeholder="Company Name" class="form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="catchphase" class="col-4 col-form-label"> Catch Phase </label>
                                    <div class="col-8">
                                        <input id="catchphase" name="catchphase" v-model="registration.catchphase" placeholder="Catch Phase" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label"> Official Email <i style="color:red;">*</i> </label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="Email" v-model="registration.email" class="form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label"> Website </label>
                                    <div class="col-8">
                                        <input id="website" name="website" placeholder="Website" v-model="registration.website" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="publicinfo" class="col-4 col-form-label"> Public Info </label>
                                    <div class="col-8">
                                        <textarea id="publicinfo" placeholder="Public Info" name="publicinfo" v-model="registration.publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LogoUpload" class="col-4 col-form-label"> Logo </label>
                                    <div class="col-8 input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="float-left previewImg">
                                                <img :src="logo" class="img-responsive center-block" alt="Logo holder" style="width:36px;height:36px;" id="imgPreview" name="imgPreview">
                                            </div>
                                            &nbsp;&nbsp;
                                            <span class="input-group-text">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                        </div>
                                        <div class="upload-btn-wrapper">
                                            <button id="uploadInfo" name="uploadInfo"  style="color:black;" class="btn">Choose your Logo</button>
                                            <input type="file" v-on:change="onLogoChange" class="form-control" accept="image/*" id="LogoUpload" name="LogoUpload" placeholder="Choose your Logo">
                                        </div>
                                        <div class="float-right">
                                            <button id="Btnupload" name="Btnupload" class="btn btn-success btn-block" disabled @click="upload">
                                                Upload
                                                <v-icon right dark>cloud_upload</v-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <v-btn color="primary" @click.native="step = 2">Continue</v-btn>
                    </v-stepper-content>
                    <v-stepper-content step="2">
                        <theme-settings v-on:ColorOptions="getColorOptions"></theme-settings>
                        <v-btn color="primary" @click.native="step = 1"> Previous </v-btn>
                        <v-btn color="primary" @click.native="step = 3"> Continue </v-btn>
                    </v-stepper-content>
                    <v-stepper-content step="3">
                        <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
                        <v-btn color="primary" @click.native="step = 2"> Previous</v-btn>
                        <v-btn id="SaveData" color="primary" @click="submit">Save</v-btn>
                    </v-stepper-content>
                    </v-stepper-items>
                </v-stepper>
            </v-flex>
        </v-layout>
    </v-container>
  </div>
</template>

<script>
    var button = document.getElementById("Btnupload");
    import gql from 'graphql-tag';
    import VWidget from '../components/VWidget';
    import ThemeSettings from '../components/ThemeSettings';
    export default {
        apollo: {
            // Query with parameters
            registration() {
                return {
                    query: gql`query getCompanyProfile($details: String!) { registration(key: $details) { id, value }}`,
                    variables() {
                        return {
                            details: "Company Profile",
                        }
                    },
                    update(data) {
                        this.$data.id = data.registration.id;
                        return JSON.parse(data.registration.value)
                    },
                    error(error) {
                        this.$store.commit('Snackbar', {color: 'error', text: 'We\'ve got an error!\n' + error, show: true});
                    },
                }
            },
        },
        components: {
            VWidget,
            ThemeSettings
        },
        data: () => ({
            id: 0,
            step: 1,
            cloudinary: {
                cloudName: 'deye9',
                resourceType: 'image',
                uploadPreset: 'qwh6athb'
            },
            registration: {
                logo: null,
                email: null,
                website: null,
                publicinfo: null,
                catchphase: null,
                companyname: null,
                theme: {
                    themeColor: null,
                    sideBarOption: null,
                },
            }
        }),
        computed: {
            logo() {
                return (this.$data.registration.logo === null) ? '/images/question_mark.svg' : this.$data.registration.logo ;
            },
            tenant() {
                return this.$store.state.tenant;
            },
            clUrl() {
                return `https://api.cloudinary.com/v1_1/${this.cloudinary.cloudName}/${this.cloudinary.resourceType}/upload`
            },
        },
        methods:{
            upload() {
                var button = document.getElementById("Btnupload");
                button.disabled = true;

                if (this.$data.registration.logo !== null)
                {
                    const formData = new FormData()
                    formData.append('file', this.$data.registration.logo);
                    formData.append('upload_preset', this.cloudinary.uploadPreset);
                    formData.append('tags', this.cloudinary.resourceType + "'s for " + this.tenant.companyname);

                    axios.post(this.clUrl, formData)
                        .then(response => {
                            if (response.status === 200) {
                                this.registration.logo = response.data.secure_url;
                                this.$store.commit('updatetenant', this.$data.registration);
                                this.$store.commit('Snackbar', {color: 'primary', text: 'Image has been successfully uploaded.', show: true});
                            }
                    })
                } else {
                    this.$store.commit('Snackbar', {color: 'error', text: 'Kindly select a valid image to upload.', show: true});
                }
            },
            // Triggered when `ColorOptions` event is emitted by the child.
            getColorOptions (value) {
                this.registration.theme.themeColor = value.themeColor;
                this.registration.theme.sideBarOption = value.sideBarOption;
            },
            onLogoChange(e) {
                var Rlogo = this.$data.registration;
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                var file = files[0];
                var allowed_mimeTypes = "image/";
                var file_type = file.type.split('/')[0] + "/";
                if (allowed_mimeTypes.toLowerCase().indexOf(file_type) === -1)
                {
                    this.$store.commit('Snackbar', {color: 'error', text: 'Only Image file formats are allowed.', show: true});
                    return false;
                }
                var reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function(event) {
                    var logo = document.getElementById('imgPreview');
                    logo.style.width = '36px';
                    logo.style.height = '36px';
                    logo.src = event.target.result;
                    Rlogo.logo = event.target.result;
                }.bind(Rlogo);

                var button = document.getElementById("Btnupload");
                button.removeAttribute("disabled");
                document.getElementById('uploadInfo').innerText = document.getElementById("LogoUpload").value;
            },
            //upload() {
                // if (this.$data.registration.logo !== null)
                // {
                //     axios.post('/api/base64upload', {image: this.$data.registration.logo})
                //         .then(response => {
                //             if (response.data.success) {
                //                 this.registration.logo = response.data.filename;
                //                 this.$store.commit('updatetenant', this.$data.registration);
                //                 this.$store.commit('Snackbar', {color: 'primary', text: response.data.success, show: true});
                //             }
                //         }
                //     );
                // } else {
                //     this.$store.commit('Snackbar', {color: 'error', text: 'Kindly select a valid image to upload.', show: true});
                // }
            //},
            submit() {
                var button = document.getElementById("SaveData");
                button.disabled = true;

                // Call to the graphql mutation
                if (this.$data.id >= 1) {
                    this.$apollo.mutate({
                        // Mutation Query
                        mutation: gql`mutation($label: UpdateMetadataInput!) { updateMetadata(input: $label) { id, key, value } }`,
                        // Parameters
                        variables: {
                            label: {'id': this.$data.id, key: "Company Profile", value: JSON.stringify(this.$data.registration)}
                        },
                        // Optimistic UI. Will be treated as a 'fake' result as soon as the request is made so that the UI can react quickly and the user be happy
                        optimisticResponse: {
                            __typename: 'Mutation',
                            updateMetadata: {
                                id: 1,
                                key: 'Company Profile',
                                value: '',
                                __typename: 'Metadata',
                            },
                        },
                    }).then((data) => {
                        this.$store.commit('Snackbar', {color: 'primary', text: 'Profile has been successfully setup.', show: true});
                    }).catch((error) => {
                        this.$store.commit('Snackbar', {color: 'error', text: 'An error occurred while setting up your profile. Kindly try again.', show: true});
                    });
                } else {
                    this.$apollo.mutate({
                        // Mutation Query
                        mutation: gql`mutation($label: CreateMetadataInput!) { createMetadata(input: $label) { id, key, value } }`,
                        // Parameters
                        variables: {
                            label: {key: "Company Profile", value: JSON.stringify(this.$data.registration)}
                        },
                        // Optimistic UI. Will be treated as a 'fake' result as soon as the request is made so that the UI can react quickly and the user be happy
                        optimisticResponse: {
                            __typename: 'Mutation',
                            createMetadata: {
                                id: 0,
                                key: 'Company Profile',
                                value: '',
                                __typename: 'Metadata',
                            }
                        },
                    }).then((data) => {
                        button.disabled = false;
                        this.$store.commit('Snackbar', {color: 'primary', text: 'Profile has been successfully setup.', show: true});
                    }).catch((error) => {
                        button.disabled = false;
                        this.$store.commit('Snackbar', {color: 'error', text: 'An error occurred while setting up your profile. Kindly try again.', show: true});
                    });
                }
            }
        },
    };
</script>

<style lang="stylus" scoped>
    .btn {
        line-height: 1.7;
    }

    .upload-btn-wrapper {
        width: 70%;
        overflow: hidden;
        position: relative;
        display: inline-block;
        border: 1px solid gray;
        background-color: #e9ecef;
    }

    .upload-btn-wrapper input[type=file] {
        top: 0;
        left: 0;
        opacity: 0;
        font-size: 100px;
        position: absolute;
    }
</style>
