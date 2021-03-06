import * as types from '../mutation-types'

const state = {
    user: {
        authenticated:  false,
        idAdmin:        false,
        isDebug:        false,
        profile:        null
    },
    error: false,

    errorBasic: "Une erreur est survenue.",
    showLoader: false
}

const getters = {
    contextError: (state) => {
        return state.error
    },
    isRegistred: (state) => {
        return state.user.authenticated
    },
    isAdmin: (state) => {
        if ( (state.user.hasOwnProperty('profile')) && (state.user.profile !== null) && (state.user.profile.hasOwnProperty('data')) ) {
            return (state.user.profile.data.is_admin == 1)
        }
        return 0
            
    },
    getUserId: (state) => {
        
        return state.user.profile.data.id;
    },
    checkIsAdmin: (state) => {
        return (getters) => {
            if ( (state.user.hasOwnProperty('profile')) && (state.user.profile !== null)) {
                return getters.checkProperty('is_admin')
            }
            return false;
        }
    },
    checkIsDebug: (state) => {
        return (getters) => {
            if ( (state.user.hasOwnProperty('profile')) && (state.user.profile !== null)) {
                return getters.checkProperty('is_debug')
            }
            return false;
        }
    },
    checkProperty: (state) => {
        return (property) => {
            if (state.user.profile.data.hasOwnProperty(property)) {
                return (state.user.profile.data[property] == 1) ? true : false;
            }
            return false;
        }
    },
    checkDebug: (state) => {
        return (response, formElements, getters) => {
            if ("undefined" !== typeof formElements) {
                return getters.formErrors(response.data, formElements);
            }
            if ( (response.hasOwnProperty("data")) && (response.data.hasOwnProperty('message')) ) {
                return state.errorBasic + response.data.message + '(' + response.data.code + ')';
            }
        }
    },
    formErrors: (state) => {
        return (response, formElements) => {
            let errors  = "<br/>"
            let data    = response
            if ("undefined" === data[formElements[0]['name']]) {
                data    = response.data
            }
            
            formElements.forEach( (element) => {
                if ('undefined' !== typeof data[element.name]) {
                    data[element.name].forEach(
                        error => {
                            switch(error) {
                                case "validation.required":
                                    errors += element.human + " obligatoire(s).<br/>"
                                    break
                                case "validation.integer":
                                    errors += element.human + " doit être un entier.<br/>"
                                    break
                                case "validation.email":
                                    errors += element.human + " doit être une adresse mail valide.<br/>"
                                    break
                                default:
                                    errors += 'Erreur non gérée'
                                    break
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
    },
    [types.SET_LOADER]: (state, value) => {
        state.showLoader = value
    }
}

const actions = {
    register({ commit, state }, { context, name, email, password, password_confirm, router }) {
        context.$http.post(
            'api/register',
            { name: name, email: email, password: password, 'password_confirmation': password_confirm }
        ).then(
            (response) => {
                commit(types.CHANGE_CONTEXT_ERROR, false)
                window.localStorage.removeItem('id_token')
                window.localStorage.setItem('id_token', response.data.meta.token)
                context.$http.defaults.headers['Authorisation'] = 'Bearer ' + window.localStorage.getItem('id_token');
                commit(types.LOGIN, response.data)
                // context.$emit('sas-success', 'Compte créé, vous pouvez vous connecter avec vos identifiants.')
                router.push({ name: 'home', params: { 'menu': 'reload' } })
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
                    router.push({ name: 'home', params: { 'menu': 'reload' } })
                }
            )
        }
    },
    signin({ commit, state }, { context, email, password, router }) {
        context.$http.post(
            'api/signin', { email: email, password: password }
        ).then(
            (response) => {
                const data = response.data
                commit(types.CHANGE_CONTEXT_ERROR, false)
                window.localStorage.setItem('id_token', response.data.meta.token);
                context.$http.defaults.headers['Authorization'] = 'Bearer ' + window.localStorage.getItem('id_token')
                commit(types.LOGIN, data)
                router.go(-1)
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
        router.push({ name: 'home', params: { 'menu': 'reload' } });
    },
    showError({ state, rootState, commit, dispatch, getters }, { response, formElements, vue }) {
        if (getters.checkIsDebug(getters)) {
            vue.$emit('sas-errors', getters.checkDebug(response, formElements, getters));
        } else {
            vue.$emit('sas-snackbar', state.errorBasic);
        }
    },
    showContactError({ state, rootState, commit, dispatch, getters }, { response, formElements, vue }) {
        vue.$emit('sas-errors', getters.checkDebug(response, formElements, getters));
    },
    startLoader({ state, commit, getters }) {
        commit(types.SET_LOADER, true)
    },
    stopLoader({ state, commit, getters }) {
        commit(types.SET_LOADER, false)
    }

}

export default {
    state,
    getters,
    actions,
    mutations
}
