
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
const Vue             = require('vue');
const VueRouter       = require('vue-router');
const VueResource     = require('vue-resource');

// Vue.transition('left', {
//     enterClass: 'slideInLeft',
//     leaveClass: 'slideOutLeft'
// });

import App from './components/v-app.vue';
import Home from './components/v-home.vue';
import Register from './components/v-register.vue';
import Signin from './components/v-signin.vue';
import DashBoard from './components/v-dashboard.vue';
import Admin from './components/admin/v-admin.vue';

import Keen from 'keen-ui';

Vue.use(Keen);
Vue.use(VueRouter);
// let editor = require("vue-html5-editor");
// let options = {
//     //global component name
//     name: "vue-html5-editor",
//     //custom icon class of built-in modules,default using font-awesome
//     icons: {
//         text: "fa fa-pencil",
//         color: "fa fa-paint-brush",
//         font: "fa fa-font",
//         align: "fa fa-align-justify",
//         list: "fa fa-list",
//         link: "fa fa-chain",
//         unlink: "fa fa-chain-broken",
//         tabulation: "fa fa-table",
//         image: "fa fa-file-image-o",
//         hr: "fa fa-minus",
//         eraser: "fa fa-eraser",
//         undo: "fa-undo fa",
//         "full-screen": "fa fa-arrows-alt",
//         info: "fa fa-info",
//     },
//     //config image module
//     image: {
//         //Url of the server-side,default null and convert image to base64
//         server: null,
//         //the name for file field in multipart request
//         fieldName: "image",
//         //max file size
//         sizeLimit: 512 * 1024,
//         // default true,if set to true,the image will resize by localResizeIMG (https://github.com/think2011/localResizeIMG)
//         compress: true,
//         //follows are options of localResizeIMG
//         width: 1600,
//         height: 1600,
//         quality: 80,
//         //handle response data，return image url
//         uploadHandler(responseText){
//             //default accept json data like  {ok:false,msg:"unexpected"} or {ok:true,data:"image url"}
//             var json = JSON.parse(responseText)
//             if (!json.ok) {
//                 alert(json.msg)
//             } else {
//                 return json.data
//             }
//         }
//     },
//     //default en-us, en-us and zh-cn are built-in
//     language: "fr-fr",
//     i18n: {
//         //specify your language here
//         "fr-fr": {
//             "align": "Alignement",
//             "image": "Image",
//             "list": "Liste",
//             "link": "Lien",
//             "unlink": "Délier",
//             "table": "Table",
//             "font": "Font",
//             "full screen": "Plein écran",
//             "text": "Text",
//             "eraser": "Erase",
//             "info": "Info",
//             "color": "Couleur",
//             "please enter a url": "Entrer une URL",
//             "create link": "Créer un lien",
//             "bold": "Gras",
//             "italic": "Italique",
//             "underline": "Souligner",
//             "strike through": "strike through",
//             "subscript": "subscript",
//             "superscript": "superscript",
//             "heading": "Entête",
//             "font name": "Nom de la fonte",
//             "font size": "Taille de la fonte",
//             "left justify": "Justifié à gauche",
//             "center justify": "Justifié au centre",
//             "right justify": "Justifié à droite",
//             "ordered list": "Liste ordonnée",
//             "unordered list": "Liste non ordonnée",
//             "fore color": "Couleur",
//             "background color": "Couleur de l'arrière plan",
//             "row count": "Nombre de ligne",
//             "column count": "Nombre de colonne",
//             "save": "Sauvegarder",
//             "upload": "Télécharger",
//             "progress": "Progression",
//             "unknown": "Inconnu",
//             "please wait": "Attendez",
//             "error": "Erreur",
//             "abort": "Annuler",
//             "reset": "Reset"
//         }
//     },
//     //the modules you don't want
//     hiddenModules: [],
//     //keep only the modules you want and customize the order.
//     //can be used with hiddenModules together
//     visibleModules: [
//         "text",
//         "color",
//         "font",
//         "align",
//         "list",
//         "link",
//         "unlink",
//         "tabulation",
//         "image",
//         "hr",
//         "eraser",
//         "undo",
//         "full-screen",
//         "info",
//     ],
//     //extended modules
//     modules: {
//         //omit,reference to source code of build-in modules
//     }
// };
// Vue.use(editor, options);
// export default Vue;

let routes = [
    {
        name: 'welcome',
        path: '/',
        component: App
    }, {
        name: 'home',
        path: '/home',
        component: Home
    }, {
        name: 'dashboard',
        path: '/dashboard',
        component: DashBoard
    }, {
        name: 'register',
        path: '/register',
        component: Register
    }, {
        name: 'signin',
        path: '/signin',
        component: Signin
    }, {
        name: 'admin_dashboard',
        path: '/admin',
        component: Admin
    }, {
        name: 'admin_categories_index',
        path: '/admin-categories-index',
        component: require('./components/admin/categories/index.vue')
    }, {
        name: 'admin_categories_edit',
        path: '/admin-categories-edit/:categoryId',
        component: require('./components/admin/categories/edit.vue')
    }, {
        name: 'admin_categories_new',
        path: '/admin-categories-new',
        component: require('./components/admin/categories/new.vue')
    }, {
        name: 'admin_articles_index',
        path: '/admin-articles-index',
        component: require('./components/admin/articles/index.vue')
    }, {
        name: 'admin_articles_new',
        path: '/admin-articles-new',
        component: require('./components/admin/articles/new.vue')
    }, {
        name: 'admin_articles_edit',
        path: '/admin-articles-edit/:articleId/:albumId?',
        component: require('./components/admin/articles/edit.vue')
    }, {
        name: 'admin_albums_index',
        path: '/admin-albums-index',
        component: require('./components/admin/albums/index.vue')
    }, {
        name: 'admin_albums_new',
        path: '/admin-albums-new/:articleId?',
        component: require('./components/admin/albums/new.vue')
    }, {
        name: 'admin_albums_edit',
        path: '/admin-albums-edit/:albumId',
        component: require('./components/admin/albums/edit.vue')
    }
];
export const router = new VueRouter({
    mode: 'history',
    routes
});
Vue.use(VueResource);
// Vue.use(router);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
// console.log(document.getElementsByName('csrf-token')[0].getAttribute('content'));
Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
Vue.http.options.root = 'http://localhost';
let app = new Vue({
    el: "#app",
    router,
    Keen,
    render: h => h(App)
}).$mount('#app');
export default app;

// router.start(App, '#app');
