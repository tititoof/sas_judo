import app from './app.js';
import {router} from './app.js';

export default {
    user: {
        authenticated: false,
        profile: null
    },
    register(context, name, email, password) {
        app.$http.post('api/register', { name: name, email: email, password: password })
            .then(response => {
                context.success = true
            }, response => {
                context.reponse = response.data;
                context.error   = true;
            });
    },
    check() {
        if (localStorage.getItem('id_token') !== null) {
            app.$http.get('api/user').then(
                (response) => {
                    this.user.authenticated = true;
                    this.user.profile       = response.data.data;
                }, (response) => {
                    this.user.authenticated = false;
                })
        }
    },
    signin(context, email, password) {
        app.$http.post('api/signin', { email: email, password: password })
            .then(response => {
                context.error = false;
                localStorage.setItem('id_token', response.data.meta.token);
                Vue.http.headers.common['Authorisation'] = 'Bearer ' + localStorage.getItem('id_token');
                this.user.authenticated = true;
                this.user.profile       = response.data.data;
                router.go({ name: 'dashboard' })
            }, response => {
                context.error = true;
            })
    },
    signout() {
        localStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.profile = null;
        router.go({ name: 'home' })
    }
}