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
        <ui-toolbar
            :title="siteTitle"
            type="colored"
            text-color="white"
            @nav-icon-click="menuClick">
            <div slot="actions">
                <ui-button
                    type="secondary"
                    size="large"
                    @click.prevent="signinAction()"
                    ref="signinButton"
                    v-if="!auth.user.authenticated"
                    >
                Se Connecter
                </ui-button>
                <ui-button
                    type="secondary"
                    size="large"
                    ref="registerButton"
                    @click.prevent="registerAction()"
                    v-if="!auth.user.authenticated"
                    >
                S'enregister
                </ui-button>
                <ui-button
                    v-if="auth.user.authenticated"
                    type="secondary"
                    color="white"
                    size="large"
                    icon="account_circle"
                    dropdown-position="bottom right"
                    @click.prevent="disconnectAction()"
                    >
                {{ auth.user.profile.name }}
                </ui-button>
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
                sideBarMenu: [{
                    id: "toto",
                    text: "Les news",
                    link: "news"
                }, {
                    id: "toto",
                    text: "Adhérents",
                    link: "adherents"
                }, {
                    id: "toto",
                    text: "Le bureau",
                    link: "bureau"
                }, {
                    id: "toto",
                    text: "Bons moments",
                    link: "bonsmoment"
                }, {
                    id: "toto",
                    text: "Compétitions",
                    link: "competitions"
                }, {
                    id: "toto",
                    text: "Calendriers",
                    link: "calendriers"
                }, {
                    id: "toto",
                    text: "Plannings des cours",
                    link: "plannings"
                }, {
                    id: "toto",
                    text: "Cotisations",
                    link: "cotisations"
                }, {
                    id: "toto",
                    text: "Modalités d'inscription",
                    link: "modalitesInscription"
                }, {
                    id: "toto",
                    text: "Résultats",
                    link: "resultats"
                }],
                menu: [{
                    id: 'settings',
                    label: 'Paramètres'
                }, {
                        type: 'divider'
                }, {
                    id: 'disconnect',
                    label: 'Déconnexion'
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
            userButtonSelected: function(option) {
                const _self = this;
                switch(option.id) {
                    case 'disconnect':
                        auth.signout();
                        break;
                }
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
