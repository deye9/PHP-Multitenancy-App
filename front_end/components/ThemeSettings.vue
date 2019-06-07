<template>
<div id="themeSetting">
  <v-toolbar color="blue" dark>
    <v-toolbar-title>
        Color Options
    </v-toolbar-title>
  </v-toolbar>
  <v-container>
    <v-layout column>
      <v-flex>
        <div class="color-option">
          <v-layout wrap>
            <label class="color-option--label flex xs6 pa-1" v-for="(option,index) in themeColorOptions" :key="index">
                <h4>{{option.key}}</h4>
              <input type="radio" name="color" v-bind:value="option.key" v-model="themeColor">
              <span class="color-option--item bg">
                <span class="overlay">
                  <span class="material-icons">check</span>
                </span>
                <span class="color-option--item--header sideNav" :class="option.value.sideNav"></span>
                <span class="color-option--item--header mainNav" :class="option.value.mainNav"></span>
                <span class="sideMenu" :class="option.value.sideManu"></span>
              </span>
            </label>
          </v-layout>
        </div>
        <div class="theme-options">
            <v-toolbar color="blue" dark>
                <v-toolbar-title>
                    Sidebar Option
                </v-toolbar-title>
            </v-toolbar>
          <v-divider></v-divider>
          <div class="my-3">
            <v-btn-toggle v-model="sideBarOption">
              <v-btn flat value="dark">
                Dark
              </v-btn>
              <v-btn flat value="light">
                Light
              </v-btn>
            </v-btn-toggle>
          </div>
        </div>
      </v-flex>
    </v-layout>
  </v-container>
</div>
</template>

<script>
    import colors from 'vuetify/es5/util/colors';
    export default {
        data () {
            return {
                colorCode: '',
                colors: colors,
                themeColor: null,
                sideBarOption: null,
            };
        },
        methods: { },
        computed: {
            themeColorOptions () {
                return [
                    {
                    key: 'blue',
                    value: {
                        sideNav: 'blue',
                        mainNav: 'blue',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'lightBlue',
                    value: {
                        sideNav: 'blue',
                        mainNav: 'white',
                        sideManu: 'blue lighten-1'
                    }
                    },
                    {
                    key: 'teal',
                    value: {
                        sideNav: 'teal',
                        mainNav: 'teal',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'red',
                    value: {
                        sideNav: 'red',
                        mainNav: 'red',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'orange',
                    value: {
                        sideNav: 'orange',
                        mainNav: 'orange',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'purple',
                    value: {
                        sideNav: 'purple',
                        mainNav: 'purple',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'indigo',
                    value: {
                        sideNav: 'indigo',
                        mainNav: 'indigo',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'cyan',
                    value: {
                        sideNav: 'cyan',
                        mainNav: 'cyan',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'pink',
                    value: {
                        sideNav: 'pink',
                        mainNav: 'pink',
                        sideManu: 'white'
                    }
                    },
                    {
                    key: 'green',
                    value: {
                        sideNav: 'green',
                        mainNav: 'green',
                        sideManu: 'white'
                    }
                    }
                ];
            },
            tenant() {
                return this.$store.state.tenant
            },
        },
        watch: {
            themeColor: {
                handler (val) {
                    if (val !== null) {
                        this.colorCode = this.colors[val].base;
                        this.$vuetify.theme.primary = this.colors[val].base;
                        this.$emit('ColorOptions', {themeColor: this.themeColor + '[' + this.colorCode + ']', sideBarOption: this.sideBarOption});
                    }
                },
                immediate: true
            },
            sideBarOption: {
                handler (val) {
                    this.$store.commit('updatetenant', {sideBarOption: val});
                    this.$emit('ColorOptions', {themeColor: this.themeColor + '[' + this.colorCode + ']', sideBarOption: val});
                },
                immediate: true,
            }
        },
        created() {
            var theme = this.tenant.theme.themeColor;
            this.$data.sideBarOption = this.tenant.theme.sideBarOption;
            this.$data.themeColor = theme.slice(0, theme.indexOf("["));
        }
    };
</script>

<style lang="stylus" scoped>
.color-option
  &--label
    position: relative
    display: block
    cursor: pointer
    & input[type="radio"]
      display:none
      &+span
        position: relative
        &>.overlay
          display: none;
          position: absolute
          top: 0;
          bottom: 0;
          right: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0,0,0,.3);
          text-align: center;
          line-height: 30px;
          color: #fff;
      &:checked+span>.overlay
        display:block
    & .bg
      background-color: #f1f1f1
  &--item
    overflow: hidden;
    display: block;
    box-shadow: 0 0 2px rgba(0,0,0,.1);
    margin-bottom: 15px;
    &--header
      height: 10px
    &>span
      display: block;
      float: left;
      width: 50%;
      height: 20px;
</style>
