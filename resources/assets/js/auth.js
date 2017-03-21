// import {app} from './app.js';
import {router} from './app.js';

export default {
    user: {
        authenticated: false,
        profile: null
    },
    register(context, name, email, password, password_confirm) {
        context.$http.post('api/register', { name: name, email: email, password: password, 'password_confirmation': password_confirm })
            .then(response => {
                context.success = true
            }, response => {
                context.reponse = response.data;
                context.error   = true;
            });
    },
    check(app) {
        if (localStorage.getItem('id_token') !== null) {
            app.$http.get('api/user').then(
                (response) => {
                    this.user.authenticated = true;
                    this.user.profile       = response.data.data;
                }, (response) => {
                    this.user.authenticated = false;
                }
            );
        }
    },
    signin(context, email, password) {
        context.$http.post('api/signin', { email: email, password: password })
            .then(response => {
                context.error = false;
                localStorage.setItem('id_token', response.data.meta.token);
                context.$http.headers.common['Authorisation'] = 'Bearer ' + localStorage.getItem('id_token');
                this.user.authenticated     = true;
                this.user.profile           = response.data.data;
                this.user.profile.is_admin  = false;
                router.push({ name: 'dashboard' })
            }, response => {
                context.error = true;
            })
    },
    signout() {
        localStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.profile       = null;
        router.push({ name: 'home' });
    },
    checkIsAdmin() {
        const _self = this;
        if ( (_self.user.hasOwnProperty('profile')) && (_self.user.profile !== null)) {
            if (_self.user.profile.hasOwnProperty('is_admin')) {
                return (_self.user.profile.is_admin == 1) ? true : false;
            }
        }
        return false;
    }
}
