
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
const Vue             = require('vue');
const VueRouter       = require('vue-router');
const VueResource     = require('vue-resource');
import App from './components/v-app.vue';
import Home from './components/v-home.vue';
import Register from './components/v-register.vue';
import Signin from './components/v-signin.vue';
import DashBoard from './components/v-dashboard.vue';
import Admin from './components/admin/v-admin.vue';

import Keen from 'keen-ui';
Vue.use(Keen);
Vue.use(VueRouter);

let routes = [
    {
        name: 'home',
        path: '/',
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
    }, {
        name: 'admin_seasons_index',
        path: '/admin-seasons-index',
        component: require('./components/admin/seasons/index.vue')
    }, {
        name: 'admin_seasons_new',
        path: '/admin-seasons-new',
        component: require('./components/admin/seasons/new.vue')
    }, {
        name: 'admin_seasons_edit',
        path: '/admin-seasons-edit',
        component: require('./components/admin/seasons/edit.vue')
    }, {
        name: 'admin_judo_event_index',
        path: '/admin-judo-event-index',
        component: require('./components/admin/judo_events/index.vue')
    }, {
        name: 'admin_judo_event_new',
        path: '/admin-judo-event-new/:startAt?',
        component: require('./components/admin/judo_events/new.vue')
    }, {
        name: 'admin_judo_event_edit',
        path: '/admin-judo-event-edit/:id',
        component: require('./components/admin/judo_events/edit.vue')
    }, {
        name: 'admin_users_index',
        path: '/admin_users_index',
        component: require('./components/admin/users/index.vue')
    }
];
export const router = new VueRouter({
    mode: 'history',
    routes
});
Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
Vue.http.options.root = 'http://localhost';

export const app = new Vue({
    router,
    Keen,
    render: h => h(App)
}).$mount('#app');
// export default app;

