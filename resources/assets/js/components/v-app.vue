<template>
    <div class="main-div"
        :style="[{ 'background-image': 'url(' + backgroundImage + ')' }, {'background-size': 'cover' }]"
        >
        <div id="loader-background"
            v-show="showLoader"
            transition="modal"
            >
            <div id="loader"></div>
        </div>
        <my-menu></my-menu>
        <template>
            <v-bar wrapper="wrapper"
                vBar=""
                vBarInternal=""
                hBar=""
                hBarInternal="">
                <!-- your content -->
                <div class="col-md-12">
                    <div class="wrapper-page">
                        <ui-alert
                            @dismiss="showAlert = false"
                            type="error"
                            v-show="showAlert"
                            >
                            <p v-html="errorAlert"></p>
                        </ui-alert>
                        <ui-alert
                            @dismiss="showSuccessAlert = false"
                            type="success"
                            v-show="showSuccessAlert"
                            >
                            <p v-html="successAlert"></p>
                        </ui-alert>
                        <router-view
                            v-on:sas-snackbar="showSnackBar"
                            v-on:sas-errors="showAlertError"
                            v-on:sas-success="showAlertSuccess"
                            >
                        </router-view>
                    </div>
                </div>
            </v-bar>
        </template>
        <ui-snackbar-container
            ref="snackbarContainer"
            :position="position"
            :queue-snackbars="queueSnackbars"
            transition="slideUp"
            >
        </ui-snackbar-container>
    </div>
</template>
<script>
    import myMenu           from './v-menu.vue';
    import Keen             from 'keen-ui';
    import { router }       from './../app.js';
    import { my_axios }     from './../app.js';
    import { mapGetters }   from 'vuex';
    import baseURL          from './../baseUrl/baseUrl'
    import VBar from 'v-bar'
    export default {
        data() {
            return {
                position:           "left",
                queueSnackbars:     true,
                showAlert:          false,
                errorAlert:         '',
                showLoader:         false,
                showSuccessAlert:   false,
                successAlert:       '',
                backgroundImage:    'http://localhost/api/visitor/menu/background',
                heightClient:       0
            }
        },
        computed:
            mapGetters({ isRegistred: 'isRegistred', isAdmin: 'isAdmin' })
        ,
        methods: {
            showSnackBar(msg) {
                const _self = this;
                _self.$refs.snackbarContainer.createSnackbar({
                    message: msg,
                    actionColor: 'accent',
                    duration: 5000
                });
            },
            showAlertError(errors) {
                const _self = this;
                _self.errorAlert    = errors;
                _self.showAlert     = true;
                if (_self.errorAlert.length == 0) {
                    _self.showAlert = false
                }
                setTimeout(function() {
                    _self.showAlert = false
                }, 20000)
            },
            showAlertSuccess(message) {
                const _self = this;
                _self.successAlert      = message;
                _self.showSuccessAlert  = true;
                setTimeout(function() {
                    _self.showSuccessAlert  = false;
                }, 10000)
            },
            setAxiosInterceptors() {
                const _self = this;
                // Add a request interceptor
                my_axios.interceptors.request.use(function (config) {
                    // Do something before request is sent
                    _self.showLoader = true
                    return config;
                }, function (error) {
                    // Do something with request error
                    _self.showLoader = false
                    return Promise.reject(error);
                });

                // Add a response interceptor
                my_axios.interceptors.response.use(function (response) {
                    // Do something with response data
                    _self.showLoader = false
                    return response;
                }, function (error) {
                    // Do something with response error
                    _self.showLoader = false
                    return Promise.reject(error);
                });
            },
            getFirstRoute() {
                const _self = this
                _self.$http.get('api/visitor/menu').then(
                    (response) => {
                        const data = response.data.data;
                        switch(data[0].type) {
                            case 'NewsFactory':
                                router.push({ name: 'visitor_news', params: { 'menu': data[0].id, 'page': 1 } });
                                break;
                            case 'ArticlesFactory':
                                router.push({ name: 'visitor_news', params: { 'menu': data[0].id, 'page': 1 } });
                                break;
                            case 'ResultatsFactory':
                                router.push({ name: 'visitor_results', params: { 'menu': data[0].id } });
                                break;
                            default:
                                break;
                        }
                    }
                ).catch(
                    error   => {
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                );
            },
            getLastPage() {
                const _self     = this
                let lasturiEl   = document.getElementById('olduri'),
                    lasturi     = lasturiEl.dataset.uri
                if ( (lasturi == "null") || (lasturi == null) ) {
                    _self.getFirstRoute()
                }
                router.push(lasturi)
            }
        },
        components: {
            myMenu, VBar
        },

        mounted: function() {
            const _self = this;
            _self.$nextTick(function () {
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.setAxiosInterceptors()
                _self.getLastPage()
                _self.$el.clientHeight
                _self.backgroundImage = baseURL + '/api/visitor/menu/background'
            });
        },
        watch: {
            '$route.params.menu'(newId, oldId) {
                const _self = this;
                if (newId == 'reload') {
                    _self.getFirstRoute()
                }
            }
        }
    }
</script>
<style>
    .section-ui-snackbar {
        .preview-pane {
            position: relative;
            height: 148px;
            border: 2px solid #777;
        }
        .preview-controls {
            margin-top: 24px;
            max-width: 400px;
        }
        .ui-button {
            margin-top: 16px;
        }
        .ui-textbox,
        .ui-radio-group {
            margin-bottom: 18px;
        }
        .ui-switch {
            margin-bottom: 8px;
        }
    }
    #loader-background {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        background: #f3f3f3;
        z-index: 1050;
        transition: all .3s ease;
    }
    /* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1001;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #f2f2f2;
        border-right: 8px solid #419641;
        border-bottom: 8px solid #f2f2f2;
        border-left: 8px solid #419641;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 0.3s;
        animation-name: animatebottom;
        animation-duration: 0.3s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
    }

    .modal-enter, .modal-leave {
        opacity: 0;
    }

    .modal-enter #loader-background,
    .modal-leave #loader-background {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .wrapper {
        height: 90vh;
        width: 98vw;
    }
</style>
