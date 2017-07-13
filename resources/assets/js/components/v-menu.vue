<template>
    <div v-on:sas-admin="checkMenuAdmin">
        <sidebar
            v-bind:menu="sideBarMenu"
            ref="sidebar"
            class="animated sidebar-menu"
            transition="left"
            >
        </sidebar>
        <sidebar-right
            v-bind:menu="sideBarMenuAdmin"
            ref="sidebarRight"
            class="animated sidebar-menu"
            transition="right"
            >
        </sidebar-right>
        <ui-toolbar
            type="colored"
            text-color="white"
            @nav-icon-click="menuClick"
            >
            <div>
                <img src="/api/visitor/menu/picture/logo_judo.png" height="30px"/>
                <router-link :to="{ name: 'home' }" class="sas-menu" style="color: #FFFFFF; text-decoration: none">SAS Judo Jujitsu</router-link>
            </div>
            <div slot="actions">
                <template v-if="auth.user.authenticated">
                    <ui-button
                        type="colored"
                        color="green"
                        size="large"
                        icon="account_circle"
                        has-dropdown
                        ref="dropdownButton"
                        @click.prevent="checkMenuAdmin"
                        >
                        <ui-menu
                            contain-focus
                            has-icons
                            has-secondary-text
                            slot="dropdown"
                            :options="menuOptions"
                            @select="selectUserMenu"
                            @close="$refs.dropdownButton.closeDropdown()"
                            >
                        </ui-menu>
                    </ui-button>
                    <ui-icon-button
                        v-if="auth.user.isAdmin"
                        type="colored"
                        color="green"
                        size="large"
                        icon="more_vert"
                        @click.prevent="clickMenuAdmin"
                        >
                    </ui-icon-button>
                </template>
                <template v-else>
                    <ui-icon-button
                        type="colored"
                        icon="input"
                        size="small"
                        @click.prevent="signinAction()"
                        ref="signinButton"
                        >
                    </ui-icon-button>
                    <ui-icon-button
                        type="colored"
                        icon="fiber_new"
                        size="small"
                        ref="registerButton"
                        @click.prevent="registerAction()"
                        >
                    </ui-icon-button>
                </template>
            </div>
        </ui-toolbar>
    </div>
</template>
<script>
    import sidebar      from './v-sidebar.vue';
    import sidebarRight from './sidebar/v-sidebar-right.vue';
    import {app}        from './../app.js';
    import {router}     from './../app.js';
    import Keen         from 'keen-ui';
    import auth         from '../auth';
    export default {
        name: 'myMenu',
        data() {
            return {
                auth: auth,
                loading: false,
                siteTitle: "SAS Judo Jujitsu",
                sidebarShow: false,
                sideBarMenu: [],
                menuOptions: [{
                    id: 'settings',
                    icon: 'face',
                    label: 'Paramètres'
                }, {
                    type: 'divider'
                }, {
                    id: 'disconnect',
                    icon: 'exit_to_app',
                    label: 'Déconnexion'
                }],
                sideBarMenuAdmin: [{
                    id: 'admin_categories_index',
                    text: 'Menus'
                }, {
                    id: 'admin_articles_index',
                    text: 'Articles'
                }, {
                    id: 'admin_albums_index',
                    text: 'Albums'
                }, {
                    id: 'admin_judo_event_index',
                    text: 'Evènements'
                }, {
                    id: 'admin_seasons_index',
                    text: 'Saisons'
                }, {
                    id: 'admin_users_index',
                    text: 'Utilisateurs'
                }, {
                    id: 'admin_courses_index',
                    text: 'Cours'
                }, {
                    id: 'admin_resultats_index',
                    text: 'Résultats'
                }, {
                    id: 'admin_age_categories_index',
                    text: "Catégories d'âge"
                }, {
                    id: 'inscriptions_index',
                    text: 'Inscriptions'
                }]
            }
        },
        components: {
            sidebar, sidebarRight
        },
        directives: {
        },
        methods: {
            index() {
                // if (auth.checkIsAdmin()) {
                //     _self.menuOptions = _self.menuOptions.concat(_self.menuAdminOptions);
                // }
            },
            checkMenuAdmin() {
                const _self = this;
                _self.index();
            },
            clickMenuAdmin() {
                this.$refs.sidebarRight.toggle();
            },
            menuClick: function() {
                this.$refs.sidebar.toggle();
            },
            disconnectAction: function () {
                auth.signout();
            },
            selectUserMenu: function(option) {
                switch(option.id) {
                    case 'disconnect':
                        auth.signout();
                        break;
                }
            },
            selectAdminMenu: function(option) {
                router.push({ name: option.id });
            },
            calendriersAction: function() {
            },
            signinAction: function() {
                router.push({ name: 'signin' });
            },
            registerAction: function() {
                router.push({ name: 'register' });
            }
        },
        mounted() {
            this.$nextTick(function() {
               const _self = this;
               auth.check(_self);
               _self.index();
            });
        }
    }
</script>
