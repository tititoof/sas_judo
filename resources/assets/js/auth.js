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
            () => {
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
                () => {
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
            context.$http.defaults.headers['Authorisation'] = 'Bearer ' + localStorage.getItem('id_token');
            _self.user.authenticated     = true;
            _self.user.profile           = response.data.data;
            _self.user.isAdmin           = response.data.data.is_admin;
            _self.user.isDebug           = response.data.data.is_debug;
            router.push({ name: 'home' })
          },
          () => {
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
            return _self.checkProperty('is_admin')
        }
        return false;
    },
    checkIsDebug() {
        const _self = this;
        if ( (_self.user.hasOwnProperty('profile')) && (_self.user.profile !== null)) {
            return _self.checkProperty('is_debug')
        }
        return false;
    },
    checkProperty(property) {
        const _self = this;
        if (_self.user.profile.hasOwnProperty(property)) {
            return (_self.user.profile[property] == 1) ? true : false;
        }
    },
    showError(response, formElements) {
        const _self = this;
        if (_self.checkIsDebug()) {
            return _self.checkDebug(response, formElements)
        } else {
            return 'sas-snackbar', _self.errorBasic;
        }
    },
    checkDebug(response, formElements) {
        const _self = this;
        if ("undefined" !== typeof formElements) {
            return _self.formErrors(response, formElements);
        }
        if ( (response.hasOwnProperty("data")) && (response.data.hasOwnProperty('message')) ) {
            return _self.errorBasic + response.data.message + '(' + response.data.code + ')';
        }
    },
    formErrors(response, formElements) {
        const _self = this;
        let errors  = "<br/>";
        formElements.forEach( (element) => {
            if ('undefined' !== typeof response.data[element.name]) {
                response.data[element.name].forEach(
                    error => {
                        switch(error) {
                            case "validation.required":
                                errors += element.human + " obligatoire(s).<br/>";
                                break;
                            case "validation.integer":
                                errors += element.human + " doit être un entier.<br/>";
                                break;
                            default: 
                                errors += 'Erreur non gérée';
                                break;
                        }
                    }
                );
                
            }
        });
        return _self.errorBasic + errors;
    }
    
}
