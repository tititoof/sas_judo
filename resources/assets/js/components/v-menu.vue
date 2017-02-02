<template>
    <div>
        <sidebar
                :is-visible.sync="sideBarIsVisible"
                :menu="sideBarMenu"
                class="animated sidebar-menu"
                transition="left"
        >
        </sidebar>
        <ui-toolbar type="colored"
                    text-color="white" flat
                    :loading="loading"
                    :brand="siteTitle"
                    :show-brand="true"
                    @nav-icon-clicked="menuClick">
            <div slot="actions">
                <ui-button
                        v-if="auth.user.authenticated"
                        type="clear"
                        color="white"
                        icon="account_circle"
                        has-dropdown-menu
                        :menu-options="menu"
                        :text="auth.user.profile.name"
                        dropdown-position="bottom right"
                        @menu-option-selected="userButtonSelected"
                >
                </ui-button>
                <ui-button
                        type="clear"
                        color="white"
                        text="Se Connecter"
                        v-link="{ name: 'signin' }"
                        v-if="!auth.user.authenticated"
                >
                </ui-button>
                <ui-button
                        type="clear"
                        color="white"
                        text="S'enregister"
                        v-link="{ name: 'register' }"
                        v-if="!auth.user.authenticated"
                >
                </ui-button>
            </div>
        </ui-toolbar>
    </div>
</template>
<script>
    import sidebar from './v-sidebar.vue';
    import Vue from './../app.js';
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
                sideBarIsVisible: false,
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
                    text: 'Paramètres'
                }, {
                    id: 'disconnect',
                    text: 'Déconnexion'
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
             const _self = this;
             _self.$broadcast('v-sidebar:toggle');
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
         }
     }
    }
</script>