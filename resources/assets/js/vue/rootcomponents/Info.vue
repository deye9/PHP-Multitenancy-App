<template>

    <div class="content">

        <div v-if="infoview === 'moreInfo'">

            <div class="card-deck">

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('staffManagement')">Lorem ipsum</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('studentManagement')">Lorem ipsum</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('admissionProcess')">Lorem ipsum</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

            </div>

            <br />

            <div class="card-deck">

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('questionBank')">Lorem ipsum</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('libraryManagement')">Lorem ipsum</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('communication')">Lorem ipsum</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <div v-if="infoview === 'staffManagement'" class="container">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Lorem ipsum</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right" title="Back to previous page.">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

        <div v-if="infoview === 'studentManagement'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Lorem ipsum</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

        <div v-if="infoview === 'admissionProcess'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Lorem ipsum</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

        <div v-if="infoview === 'questionBank'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Lorem ipsum</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

        <div v-if="infoview === 'libraryManagement'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Lorem ipsum</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

        <div v-if="infoview === 'communication'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Lorem ipsum</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

    </div>

</template>

<script>
    export default {
        data: function() {
            return {
                infoview: 'moreInfo'
            }
        },
        methods: {
            loadComponent(value) {
                if (value.toLowerCase() === 'default') {
                    //         title: String,
                    // catchphase: String
                    location.reload();
                }
                this.infoview = value;
            },
        },
    }
</script>

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
