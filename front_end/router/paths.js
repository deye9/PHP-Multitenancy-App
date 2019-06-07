export default [
    {
        path: '/',
        meta: {},
        name: 'Root',
        redirect: {
            name: 'Home'
        }
    },
    {
        path: '/',
        meta: {
            public: true,
        },
        redirect: {
            path: '/home'
        }
    },
    {
        path: '*',
        meta: {
            public: true,
        },
        redirect: {
            path: '/404'
        }
    },
    {
        path: '/404',
        meta: {
            public: true,
        },
        name: 'NotFound',
        component: function (resolve) {
            require(['../pages/NotFound.vue'], resolve);
        }
    },
    {
        path: '/403',
        meta: {
            public: true,
        },
        name: 'AccessDenied',
        component: function (resolve) {
            require(['../pages/Deny.vue'], resolve);
        }
    },
    {
        path: '/500',
        meta: {
            public: true,
        },
        name: 'ServerError',
        component: function (resolve) {
            require(['../pages/Error.vue'], resolve);
        }
    },
    {
        path: '/home',
        meta: {
            public: true,
        },
        name: 'Home',
        component: function (resolve) {
            require(['../pages/Home.vue'], resolve);
        }
    },
    {
        path: '/login',
        meta: {
            public: true,
        },
        name: 'Login',
        component: function (resolve) {
            require(['../pages/auth/Login.vue'], resolve);
        }
    },
    {
        path: '/register',
        meta: {
            public: true,
        },
        name: 'Register',
        component: function (resolve) {
            require(['../pages/auth/Register.vue'], resolve);
        }
    },
    {
        path: '/forgotpassword',
        meta: {
            public: true,
        },
        name: 'ForgotPassword',
        component: function (resolve) {
            require(['../pages/auth/ForgotPassword.vue'], resolve);
        }
    },
    {
        path: '/reset',
        meta: {
            public: true,
        },
        name: 'Reset',
        component: function (resolve) {
            require(['../pages/auth/Reset.vue'], resolve);
        }
    },
    {
        path: '/admin/users',
        meta: {
            breadcrumb: true
        },
        name: 'components/users',
        component: function (resolve) {
            require(['../admin/Users.vue'], resolve);
        }
    },
    {
        path: '/admin/roles',
        meta: {
            breadcrumb: true
        },
        name: 'components/roles',
        component: function (resolve) {
            require(['../admin/Roles.vue'], resolve);
        }
    },
    {
        path: '/admin/metadata',
        meta: {
            breadcrumb: true
        },
        name: 'components/metadata',
        component: function (resolve) {
            require(['../admin/Metadata.vue'], resolve);
        }
    },
    {
        path: '/admin/acl',
        meta: {
            breadcrumb: true
        },
        name: 'components/permissions',
        component: function (resolve) {
            require(['../admin/acl.vue'], resolve);
        }
    },
    {
        path: '/admin/branch',
        meta: {
            breadcrumb: true
        },
        name: 'admin/branch',
        component: function (resolve) {
            require(['../admin/branch.vue'], resolve);
        }
    },
    {
        path: '/admin/profile',
        meta: {
            breadcrumb: true
        },
        name: 'admin/company_profile',
        component: function (resolve) {
            require(['../admin/CompanyProfile.vue'], resolve);
        }
    },
    // {
    //     path: '/widgets/social',
    //     meta: {
    //         breadcrumb: true
    //     },
    //     name: 'components/social',
    //     component: function (resolve) {
    //         require(['../pages/widgets/Social.vue'], resolve);
    //     }
    // },
    {
        path: '/dashboard',
        meta: {
            breadcrumb: true
        },
        name: 'Dashboard',
        component: function (resolve) {
            require(['../pages/Dashboard.vue'], resolve);
        }
    },
    // {
    //   path: '/calendar',
    //   meta: { breadcrumb: true },
    //   name: 'Calendar',
    //   component: (a) => import(
    //     /* webpackChunkName: "routes" */
    //     /* webpackMode: "lazy-once" */
    //     require(['..pages/Calendar.vue'], resolve);
    //   }
    // },
    {
        path: '/media',
        meta: {},
        name: 'Media',
        props: (route) => ({
            type: route.query.type
        }),
        component: function (resolve) {
            require(['../pages/Media.vue'], resolve);
        }
    },
    {
        path: '/chat',
        meta: {
            public: true,
        },
        name: 'Chat',
        component: function (resolve) {
            require(['../components/chat/ChatLayout.vue'], resolve);
        },
        redirect: {
            path: '/chat/messaging'
        },
        children: [{
                path: '/chat/messaging/:uuid?',
                meta: {
                    public: true,
                },
                name: 'ChatMessaging',
                props: true,
                components: {
                    default: function (resolve) {
                        require(['../components/chat/ChatMessaging.vue'], resolve);
                    },
                }
            },
            {
                path: '/chat/contact/:uuid?',
                meta: {
                    public: true,
                },
                name: 'ChatContact',
                components: {
                    default: function (resolve) {
                        require(['../components/chat/ChatContact.vue'], resolve);
                    },
                }
            }
        ]
    },
    {
        path: '/mail',
        meta: {
            public: true,
        },
        name: 'Mail',
        component: function (resolve) {
            require(['../components/email/Layout.vue'], resolve);
        },
        redirect: {
            path: '/mail/all'
        },
        children: [{
                path: '/mail/:mailType',
                meta: {
                    public: true,
                },
                name: 'MailIndex',
                component: function (resolve) {
                    require(['../components/email/List.vue'], resolve);
                },
            },
            {
                path: '/mail/0/:uuid',
                meta: {
                    public: true,
                },
                name: 'MailDetail',
                component: function (resolve) {
                    require(['../components/email/Reply.vue'], resolve);
                },
            }
        ]
    },
    {
        path: '/components/alert',
        meta: {
            breadcrumb: true
        },
        name: 'components/alerts',
        component: function (resolve) {
            require(['../pages/ui/Alert.vue'], resolve);
        }
    },
    {
        path: '/components/avatar',
        meta: {
            breadcrumb: true
        },
        name: 'components/avatars',
        component: function (resolve) {
            require(['../pages/ui/Avatar.vue'], resolve);
        }
    },
    {
        path: '/components/badge',
        meta: {
            breadcrumb: true
        },
        name: 'components/badges',
        component: function (resolve) {
            require(['../pages/ui/Badge.vue'], resolve);
        }
    },
    {
        path: '/components/button',
        meta: {
            breadcrumb: true
        },
        name: 'components/buttons',
        component: function (resolve) {
            require(['../pages/ui/Button.vue'], resolve);
        }
    },
    {
        path: '/components/parallax',
        meta: {
            breadcrumb: true
        },
        name: 'components/parallax',
        component: function (resolve) {
            require(['../pages/ui/Parallax.vue'], resolve);
        }
    },
    {
        path: '/components/snackbar',
        meta: {
            breadcrumb: true
        },
        name: 'components/snackbar',
        component: function (resolve) {
            require(['../pages/ui/Snackbar.vue'], resolve);
        }
    },
    {
        path: '/components/chip',
        meta: {
            breadcrumb: true
        },
        name: 'components/chips',
        component: function (resolve) {
            require(['../pages/ui/Chip.vue'], resolve);
        }
    },
    {
        path: '/components/card',
        meta: {
            breadcrumb: true
        },
        name: 'components/cards',
        component: function (resolve) {
            require(['../pages/ui/Cards.vue'], resolve);
        }
    },
    {
        path: '/components/table',
        meta: {
            breadcrumb: true
        },
        name: 'components/tables',
        component: function (resolve) {
            require(['../pages/ui/Tables.vue'], resolve);
        }
    },
    {
        path: '/components/carousel',
        meta: {
            breadcrumb: true
        },
        name: 'components/carousels',
        component: function (resolve) {
            require(['../pages/ui/Carousels.vue'], resolve);
        }
    },
    {
        path: '/components/dialog',
        meta: {
            breadcrumb: true
        },
        name: 'components/dialogs',
        component: function (resolve) {
            require(['../pages/ui/Dialogs.vue'], resolve);
        }
    },
    {
        path: '/components/icon',
        meta: {
            breadcrumb: true
        },
        name: 'components/icons',
        component: function (resolve) {
            require(['../pages/ui/Icon.vue'], resolve);
        }
    },
    {
        path: '/components/progress',
        meta: {
            breadcrumb: true
        },
        name: 'components/progress',
        component: function (resolve) {
            require(['../pages/ui/Progress.vue'], resolve);
        }
    },
    {
        path: '/components/slider',
        meta: {
            breadcrumb: true
        },
        name: 'components/sliders',
        component: function (resolve) {
            require(['../pages/ui/Slider.vue'], resolve);
        }
    },
    {
        path: '/components/tooltip',
        meta: {
            breadcrumb: true
        },
        name: 'components/tooltips',
        component: function (resolve) {
            require(['../pages/ui/Tooltip.vue'], resolve);
        }
    },
    {
        path: '/components/pagination',
        meta: {
            breadcrumb: true
        },
        name: 'components/paginations',
        component: function (resolve) {
            require(['../pages/ui/Pagination.vue'], resolve);
        }
    },
    {
        path: '/pickers/datepicker',
        meta: {
            breadcrumb: true
        },
        name: 'pickers/datepicker',
        component: function (resolve) {
            require(['../pages/ui/Datepicker.vue'], resolve);
        }
    },
    {
        path: '/components/typography',
        meta: {
            breadcrumb: true
        },
        name: 'components/typography',
        component: function (resolve) {
            require(['../pages/ui/Typography.vue'], resolve);
        }
    },
    {
        path: '/components/color',
        meta: {
            breadcrumb: true
        },
        name: 'components/color',
        component: function (resolve) {
            require(['../pages/ui/Colors.vue'], resolve);
        }
    },
    {
        path: '/pickers/timepicker',
        meta: {
            breadcrumb: true
        },
        name: 'pickers/timepicker',
        component: function (resolve) {
            require(['../pages/ui/Timepicker.vue'], resolve);
        }
    },
    {
        path: '/layout/bottomsheets',
        meta: {
            breadcrumb: true
        },
        name: 'components/bottom-sheets',
        component: function (resolve) {
            require(['../pages/layout/BottomSheets.vue'], resolve);
        }
    },
    {
        path: '/layout/expansion-panel',
        meta: {
            breadcrumb: true
        },
        name: 'components/expansion-panels',
        component: function (resolve) {
            require(['../pages/layout/ExpansionPanels.vue'], resolve);
        }
    },
    {
        path: '/layout/footer',
        meta: {
            breadcrumb: true
        },
        name: 'components/footer',
        component: function (resolve) {
            require(['../pages/layout/Footers.vue'], resolve);
        }
    },
    {
        path: '/layout/timeline',
        meta: {
            breadcrumb: true
        },
        name: 'components/timeline',
        component: function (resolve) {
            require(['../pages/layout/Timeline.vue'], resolve);
        }
    },
    {
        path: '/layout/list',
        meta: {
            breadcrumb: true
        },
        name: 'components/lists',
        component: function (resolve) {
            require(['../pages/layout/Lists.vue'], resolve);
        }
    },
    {
        path: '/layout/toolbar',
        meta: {
            breadcrumb: true
        },
        name: 'components/toolbar',
        component: function (resolve) {
            require(['../pages/layout/Toolbar.vue'], resolve);
        }
    },
    {
        path: '/layout/jumbotron',
        meta: {
            breadcrumb: true
        },
        name: 'components/jumbotrons',
        component: function (resolve) {
            require(['../pages/layout/Jumbotrons.vue'], resolve);
        }
    },
    {
        path: '/layout/menu',
        meta: {
            breadcrumb: true
        },
        name: 'components/menus',
        component: function (resolve) {
            require(['../pages/layout/Menus.vue'], resolve);
        }
    },
    {
        path: '/layout/navigation-drawer',
        meta: {
            breadcrumb: true
        },
        name: 'components/navigation-drawers',
        component: function (resolve) {
            require(['../pages/layout/NavigationDrawers.vue'], resolve);
        }
    },
    {
        path: '/layout/tabs',
        meta: {
            breadcrumb: true
        },
        name: 'components/tabs',
        component: function (resolve) {
            require(['../pages/layout/Tabs.vue'], resolve);
        }
    },
    {
        path: '/forms/basic',
        meta: {
            breadcrumb: true
        },
        name: 'components/basic-forms',
        component: function (resolve) {
            require(['../pages/form/BasicForms.vue'], resolve);
        }
    },
    {
        path: '/forms/selects',
        meta: {
            breadcrumb: true
        },
        name: 'components/selects',
        component: function (resolve) {
            require(['../pages/form/Selects.vue'], resolve);
        }
    },
    {
        path: '/forms/editor',
        meta: {
            breadcrumb: true
        },
        name: 'components/editors',
        component: function (resolve) {
            require(['../pages/form/Editors.vue'], resolve);
        }
    },
    {
        path: '/forms/selection-controls',
        meta: {
            breadcrumb: true
        },
        name: 'components/selection-controls',
        component: function (resolve) {
            require(['../pages/form/SelectionControls.vue'], resolve);
        }
    },
    {
        path: '/forms/text-fields',
        meta: {
            breadcrumb: true
        },
        name: 'components/text-fields',
        component: function (resolve) {
            require(['../pages/form/TextFields.vue'], resolve);
        }
    },
    {
        path: '/forms/steppers',
        meta: {
            breadcrumb: true
        },
        name: 'components/steppers',
        component: function (resolve) {
            require(['../pages/form/Steppers.vue'], resolve);
        }
    },
    {
        path: '/widgets/social',
        meta: {
            breadcrumb: true
        },
        name: 'components/social',
        component: function (resolve) {
            require(['../pages/widgets/Social.vue'], resolve);
        }
    },
    {
        path: '/widgets/post',
        meta: {
            breadcrumb: true
        },
        name: 'components/widget-post',
        component: function (resolve) {
            require(['../pages/widgets/Post.vue'], resolve);
        }
    },
    {
        path: '/widgets/statistic',
        meta: {
            breadcrumb: true
        },
        name: 'components/statistic',
        component: function (resolve) {
            require(['../pages/widgets/Statistic.vue'], resolve);
        }
    },
    {
        path: '/widgets/chart',
        meta: {
            breadcrumb: true
        },
        name: 'components/chart',
        component: function (resolve) {
            require(['../pages/widgets/Chart.vue'], resolve);
        }
    },
    {
        path: '/widgets/list',
        meta: {
            breadcrumb: true
        },
        name: 'components/widget-list',
        component: function (resolve) {
            require(['../pages/widgets/List.vue'], resolve);
        }
    },
];
