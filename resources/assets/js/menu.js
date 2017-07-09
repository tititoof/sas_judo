import Vue from './app.js';
import {router} from './app.js';

export default {
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
    }],
    menuClick: function() {
        var _self = this;
        _self.$broadcast('v-sidebar:toggle');
    },
    userButtonSelected: function(option) {
        console.log('user button selected !!!', option.id);
        switch(option.id) {
            case 'disconnect':

                break;
        }
    },
    calendriersAction: function() {
        console.log('Action !!!!');
    }
}