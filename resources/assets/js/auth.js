import {router} from './app.js';

export default {
    user: {
        authenticated:  false,
        idAdmin:        false,
        profile:        null
    },
    errorBasic: "Une erreur est survenue.",
    register(context, name, email, password, password_confirm) {
        context.$http.post(
            'api/register',
            { name: name, email: email, password: password, 'password_confirmation': password_confirm }
        ).then(
            (response) => {
                context.success = true
            },
            (response) => {
                context.reponse = response.data;
                context.error   = true;
            }
        );
    },
    check(app) {
        const _self = this;
        if (localStorage.getItem('id_token') !== null) {
            app.$http.get(
                'api/user'
            ).then(
                (response) => {
                    _self.user.authenticated = true;
                    _self.user.isAdmin       = response.data.data.is_admin;
                    _self.user.isDebug       = response.data.data.is_debug;
                    _self.user.profile       = response.data.data;
                    app.$emit('sas-admin', 'Mise à jour utilisateur');
                },
                (response) => {
                    _self.user.authenticated = false;
                    _self.user.isAdmin       = false;
                    _self.user.isDebug       = false;
                    app.$emit('sas-admin', 'Mise à jour utilisateur');
                }
            );
        }
    },
    signin(context, email, password) {
      const _self = this;
      context.$http.post(
          'api/signin', { email: email, password: password }
      ).then(
          (response) => {
            context.error = false;
            localStorage.setItem('id_token', response.data.meta.token);
            context.$http.headers.common['Authorisation'] = 'Bearer ' + localStorage.getItem('id_token');
            _self.user.authenticated     = true;
            _self.user.profile           = response.data.data;
            _self.user.isAdmin           = response.data.data.is_admin;
            _self.user.isDebug           = response.data.data.is_debug;
            router.push({ name: 'home' })
          },
          (response) => {
            context.error = true;
          }
      );
    },
    signout() {
        localStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.isAdmin       = false;
        this.user.isDebug       = false;
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
    },
    checkIsDebug() {
        const _self = this;
        if ( (_self.user.hasOwnProperty('profile')) && (_self.user.profile !== null)) {
            if (_self.user.profile.hasOwnProperty('is_debug')) {
                return (_self.user.profile.is_debug == 1) ? true : false;
            }
        }
        return false;
    },
    showError(response, formElements) {
        const _self = this;
        if (_self.checkIsDebug()) {
            if ("undefined" !== typeof formElements) {
                return _self.formErrors(response, formElements);
            }
            if ( (response.hasOwnProperty("data")) && (response.data.hasOwnProperty('message')) ) {
                return _self.errorBasic + response.data.message + '(' + response.data.code + ')';
            }
        } else {
            return 'sas-snackbar', _self.errorBasic;
        }
    },
    formErrors(response, formElements) {
        const _self = this;
        let errors  = "<br/>";
        formElements.forEach((element) => {
            if ('undefined' !== typeof response.data[element.name]) {
                response.data[element.name].forEach(
                    error => {
                        switch(error) {
                            case "validation.required":
                                errors += element.human + " obligatoire.<br/>";
                                break;
                            case "validation.integer":
                                errors += element.human + " doit être un entier.<br/>";
                                break;
                            
                        }
                    }
                );
                
            }
        });
        return _self.errorBasic + errors;
    }
    
}
