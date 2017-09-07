
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
import VueRouter    from 'vue-router';
import routes       from './routes/routes';
import App          from './components/v-app.vue';
import Keen         from 'keen-ui';
import axios        from 'axios';
import store        from './store'
import VueLazyImage from "vue-lazy-images";
import ToggleButton from 'vue-js-toggle-button'
import Vuebar       from 'vuebar';
import Vue2Filters  from 'vue2-filters'
import Vueditor     from 'vueditor'
import VueTimepicker from 'vue2-timepicker'

import 'vueditor/dist/style/vueditor.min.css'

let config = {
    toolbar: [
        'removeFormat', 'undo', 'redo', '|', 'element', 'fontName', 'fontSize', 'foreColor', 'backColor', 'divider', 'bold', 'italic', 'underline', 'strikeThrough',
        'link', 'unLink', 'divider', 'subscript', 'superscript', 'divider', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',
        '|', 'indent', 'outdent', 'insertOrderedList', 'insertUnorderedList', '|', 'emoji', 'picture', 'table', '|', 'fullscreen', 'sourceCode', 'markdown'
    ],
    fontName: [
        {val: 'arial black'},
        {val: 'times new roman'},
        {val: 'Courier New'}
    ],
    fontSize: [
        '12px', '14px', '16px', '18px', '20px', '24px', '28px', '32px', '36px'
    ],
    uploadUrl: '',
    id: '',
    classList: []
};

Vue.use(Vueditor, config);

Vue.use(Vuebar)
Vue.use(VueRouter)
Vue.use(Keen)
Vue.use(VueLazyImage)
Vue.use(ToggleButton)
Vue.use(Vue2Filters)
Vue.use(VueTimepicker)

export const router = new VueRouter({
    mode: 'history',
    routes
});

let my_axios = axios.create({
  baseURL: 'http://127.0.0.1:8000',
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
