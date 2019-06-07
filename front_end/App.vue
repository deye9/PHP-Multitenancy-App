<template>
  <div id="appRoot">
    <template v-if="!$route.meta.public">
      <v-app id="inspire" class="app">
        <app-drawer class="app--drawer"></app-drawer>
        <app-toolbar class="app--toolbar"></app-toolbar>
        <v-content>
          <!-- Page Header -->
          <page-header v-if="$route.meta.breadcrumb"></page-header>
          <div class="page-wrapper">
            <router-view></router-view>
          </div>
           <!-- App Footer -->
          <v-footer height="auto" class="white pa-3 app--footer">
             <span class="caption text-center"> &copy; {{ new Date().getFullYear() }} {{this.tenant.companyname}}</span>
            <!-- <v-spacer></v-spacer>
            <span class="caption mr-1"> Make With Love </span> <v-icon color="pink" small>favorite</v-icon> -->
          </v-footer>
        </v-content>
        <!-- Go to top -->
        <app-fab></app-fab>
      </v-app>
    </template>
    <template v-else>
      <transition>
        <keep-alive>
          <router-view></router-view>
        </keep-alive>
      </transition>
    </template>
    <v-snackbar :timeout="3000" bottom right :color="snackbar.color" v-model="snackbar.show">
      {{ snackbar.text }}
      <v-btn dark flat @click.native="snackbar.show = false" icon>
        <v-icon>close</v-icon>
      </v-btn>
    </v-snackbar>
  </div>
</template>
<script>
    import AppDrawer from './components/AppDrawer';
    import AppToolbar from './components/AppToolbar';
    import AppFab from './components/AppFab';
    import PageHeader from './components/PageHeader';
    import AppEvents from  './event';
    export default {
        components: {
            AppDrawer,
            AppToolbar,
            AppFab,
            PageHeader,
        },
        data: () => ({
            expanded: true,
        }),
        computed:  {
            snackbar() {
                return this.$store.state.snack;
            },
            tenant() {
                return this.$store.state.tenant
            }
        },
        created () {
            AppEvents.forEach(item => {
                this.$on(item.name, item.callback);
            });
            window.getApp = this;
        },
        methods: {
        },
    };
</script>

<style lang="stylus" scoped>
  .setting-fab
    top:50%!important;
    right:0;
    border-radius:0
  .page-wrapper
    min-height:calc(100vh - 64px - 50px - 81px );
</style>
