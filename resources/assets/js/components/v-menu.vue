<template>
    <div>
        <sidebar
            v-bind:menu="sideBarMenu"
            :visible="sidebarShow"
            ref="sidebar"
            class="animated sidebar-menu"
            transition="left"
            >
        </sidebar>
        <!-- :title="siteTitle" -->
        <ui-toolbar
            type="colored"
            text-color="white"
            @nav-icon-click="menuClick">
            <div>
                <img src="/api/visitor/menu/picture/logo_judo.png" height="30px"/>
                <router-link :to="{ name: 'home' }" class="sas-menu" style="color: #FFFFFF; text-decoration: none">SAS Judo Jujitsu</router-link>
            </div>
            <div slot="actions">
                <template v-if="!auth.user.authenticated">
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
                <template v-if="auth.user.authenticated">
                    <ui-icon-button
                        v-if="auth.user.isAdmin"
                        type="colored"
                        color="green"
                        size="large"
                        icon="more_vert"
                        has-dropdown
                        ref="dropdownAdminButton"
                        >
                        <ui-menu
                            contain-focus
                            has-icons
                            has-secondary-text
                            slot="dropdown"
                            :options="menuAdminOptions"
                            @select="selectAdminMenu"
                            @close="$refs.dropdownAdminButton.closeDropdown()"
                            >
                        </ui-icon-button>
                    </ui-button>
                    <ui-button
                        type="colored"
                        color="green"
                        size="large"
                        icon="account_circle"
                        has-dropdown
                        ref="dropdownButton"
                        >
                        <ui-menu
                            contain-focus
                            has-icons
                            has-secondary-text
                            slot="dropdown"
                            :options="menuOptions"
                            @select="selectUserMenu"
                            @close="$refs.dropdownButton.closeDropdown()"
                            ></ui-menu>
                        <!-- {{ auth.user.profile.name }} -->
                    </ui-button>

                </template>
            </div>
        </ui-toolbar>
    </div>
</template>
<script>
    import sidebar from './v-sidebar.vue';
    import {app} from './../app.js';
    import {router} from './../app.js';
    import Keen from 'keen-ui';
    import auth from '../auth';
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
                menuAdminOptions: [{
                    id: 'admin_categories_index',
                    icon: 'face',
                    label: 'Menus'
                }, {
                    id: 'admin_articles_index',
                    icon: 'face',
                    label: 'Articles'
                }, {
                    id: 'admin_albums_index',
                    icon: 'face',
                    label: 'Albums'
                }, {
                    id: 'admin_judo_event_index',
                    icon: 'face',
                    label: 'Evènements'
                }, {
                    id: 'admin_seasons_index',
                    icon: 'face',
                    label: 'Saisons'
                }, {
                    id: 'admin_users_index',
                    icon: 'face',
                    label: 'Utilisateurs'
                }, {
                    id: 'admin_courses_index',
                    icon: 'face',
                    label: 'Cours'
                }, {
                    id: 'admin_resultats_index',
                    icon: 'face',
                    label: 'Résultats'
                }, {
                    id: 'admin_age_categories_index',
                    icon: 'face',
                    label: "Catégories d'âge"
                }, {
                    id: 'inscriptions_index',
                    icon: 'face',
                    label: 'Inscriptions'
                }]
            }
        },
        components: {
            sidebar
        },
        directives: {
        },
        methods: {
            menuClick: function() {
                this.$refs.sidebar.toggle();
            },
            disconnectAction: function () {
                auth.signout();
            },
            selectUserMenu: function(option) {
                const _self = this;
                switch(option.id) {
                    case 'disconnect':
                        auth.signout();
                        break;
                }
            },
            selectAdminMenu: function(option) {
                const _self = this;
                router.push({ name: option.id });
            },
            calendriersAction: function() {
                console.log('Action !!!!');
            },
            signinAction: function() {
                router.push({ name: 'signin' });
            },
            registerAction: function() {
                router.push({ name: 'register' });
            }
        }
    }
</script>
