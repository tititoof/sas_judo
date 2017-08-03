
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
const Vue           = require('vue');
import VueRouter  from 'vue-router';
import routes     from './routes/routes';
import App        from './components/v-app.vue';
import Keen       from 'keen-ui';
import axios      from 'axios';
import store      from './store'
import VueLazyImage from "vue-lazy-images";
import ToggleButton from 'vue-js-toggle-button'
Vue.use(VueRouter);
Vue.use(Keen);
Vue.use(VueLazyImage)
Vue.use(ToggleButton)

export const router = new VueRouter({
    mode: 'history',
    routes
});

var my_axios = axios.create({
  baseURL: 'http://localhost',
  headers: {
      'X-CSRF-TOKEN': document.getElementsByName('csrf-token')[0].getAttribute('content'),
      'Authorization': 'Bearer ' + localStorage.getItem('id_token')
  },

});

Vue.prototype.$http = my_axios;

export const app = new Vue({
    router,
    Keen,
    store,
    render: h => h(App)
}).$mount('#app');
