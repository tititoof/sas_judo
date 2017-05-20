
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
const Vue         = require('vue');
let VueResource = require('vue-resource');
import VueRouter  from 'vue-router';
import routes     from './routes/routes';
import App        from './components/v-app.vue';
import Keen       from 'keen-ui';

Vue.use(VueRouter);
Vue.use(Keen);

export const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN']   = document.getElementsByName('csrf-token')[0].getAttribute('content');
Vue.http.headers.common['Authorization']  = 'Bearer ' + localStorage.getItem('id_token');
Vue.http.options.root = 'http://localhost';

export const app = new Vue({
    // http: {
    //     root: 'http://localhost',
    //     headers: {
    //         Authorization: 'Bearer ' + localStorage.getItem('id_token'),
    //         'X-CSRF-TOKEN': document.getElementsByName('csrf-token')[0].getAttribute('content')
    //     }
    // },
    router,
    Keen,
    render: h => h(App)
}).$mount('#app');
