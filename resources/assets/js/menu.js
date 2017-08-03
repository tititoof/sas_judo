import Vue from './app.js';
import {router} from './app.js';

export default {
    loading: false,
    siteTitle: "SAS Judo Jujitsu",
    sideBarIsVisible: false,
    sideBarMenu: [],
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
        switch(option.id) {
            case 'disconnect':

                break;
        }
    },
    calendriersAction: function() {
    }
}