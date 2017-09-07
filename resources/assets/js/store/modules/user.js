import * as types from '../mutation-types'

const state = {
    user: {
        authenticated:  false,
        idAdmin:        false,
        isDebug:        false,
        profile:        null
    },
    error: false,

    errorBasic: "Une erreur est survenue."
}

const getters = {
    contextError: (state) => {
        return state.error
    },
    isRegistred: (state) => {
        return state.user.authenticated
    },
    isAdmin: (state) => {
        return (state.user.profile.data.is_admin == 1)
    },
    getUserId: (state) => {
        return state.user.profile.data.id;
    },
    formErrors: (state) => {
        return (response, formElements) => {
            const _self = this;
            if ("undefined" !== typeof formElements) {
                return _self.formErrors(response, formElements);
            }
            if ( (response.hasOwnProperty("data")) && (response.data.hasOwnProperty('message')) ) {
                return _self.errorBasic + response.data.message + '(' + response.data.code + ')';
            }
        }
    },
    checkIsAdmin: (state) => {
        return (getters) => {
            const _self = this;
            if ( (state.user.hasOwnProperty('profile')) && (state.user.profile !== null)) {
                return getters.checkProperty('is_admin')
            }
            return false;
        }
    },
    checkIsDebug: (state) => {
        return (getters) => {
            const _self = this;
            if ( (state.user.hasOwnProperty('profile')) && (state.user.profile !== null)) {
                return getters.checkProperty('is_debug')
            }
            return false;
        }
    },
    checkProperty: (state) => {
        return (property) => {
            if (state.user.profile.hasOwnProperty(property)) {
                return (state.user.profile[property] == 1) ? true : false;
            }
        }
    },
    checkDebug: (state) => {
        return (response, formElements, getters) => {
            const _self = this;
            if ("undefined" !== typeof formElements) {
                return getters.formErrors(response, formElements);
            }
            if ( (response.hasOwnProperty("data")) && (response.data.hasOwnProperty('message')) ) {
                return state.errorBasic + response.data.message + '(' + response.data.code + ')';
            }
        }
    },
    formErrors: (state) => {
        return (response, formElements) => {
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
            return state.errorBasic + errors;
        }
    }
}

const mutations = {
    [types.LOGIN]: (state, data) => {
        state.user.authenticated = true
        state.user.isAdmin       = (data.is_admin == 1) ? true : false;
        state.user.isDebug       = (data.is_debug == 1) ? true : false;
        state.user.profile       = data;
    },
    [types.LOGOUT]: (state) => {
        state.user.authenticated = false
        state.user.isAdmin       = false;
        state.user.isDebug       = false;
        state.user.profile       = null;
    },
    [types.CHANGE_CONTEXT_ERROR]: (state, value) => {
        state.error = value
    }
}

const actions = {
    register({ commit, state }, { context, name, email, password, password_confirm }) {
        context.$http.post(
            'api/register',
            { name: name, email: email, password: password, 'password_confirmation': password_confirm }
        ).then(
            () => {
                commit(types.CHANGE_CONTEXT_ERROR, false)
            }
        ).catch(
            (response) => {
                context.reponse = response.data;
                commit(types.CHANGE_CONTEXT_ERROR, true)
            }
        )
    },
    check({ commit, state }, { app, router }) {
        if (localStorage.getItem('id_token') !== null) {
            app.$http.get(
                'api/user'
            ).then(
                response => {
                    const data = response.data
                    commit(types.LOGIN, data)
                    app.$emit('sas-admin', 'Mise à jour utilisateur');
                }
            ).catch(
                error => {
                    commit(types.LOGOUT)
                    app.$emit('sas-admin', 'Mise à jour utilisateur');
                    router.push({ name: 'home' })
                }
            )
        }
    },
    signin({ commit, state }, { context, email, password, router }) {
        const _self = this;
        context.$http.post(
            'api/signin', { email: email, password: password }
        ).then(
            (response) => {
                const data = response.data
                commit(types.CHANGE_CONTEXT_ERROR, false)
                localStorage.setItem('id_token', response.data.meta.token);
                context.$http.defaults.headers['Authorisation'] = 'Bearer ' + localStorage.getItem('id_token');
                commit(types.LOGIN, data)
                router.push({ name: 'home' })
            }
        ).catch(
            error => {
                commit(types.CHANGE_CONTEXT_ERROR, true)
            }
        );
    },
    signout({ commit, state }, router) {
        localStorage.removeItem('id_token');
        commit(types.LOGOUT)
        router.push({ name: 'home' });
    },
    showError({ state, rootState, commit, dispatch, getters }, { response, formElements, vue }) {
        if (getters.checkIsDebug(getters)) {
            vue.$emit('sas-errors', vue.checkDebug(response, formElements, getters));
        } else {
            vue.$emit('sas-snackbar', state.errorBasic);
        }
    }

}

export default {
    state,
    getters,
    actions,
    mutations
}
