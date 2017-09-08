<template>
    <div class="main-div">
        <div id="loader-background"
            v-show="showLoader"
            transition="modal"
            >
            <div id="loader"></div>
        </div>
        <my-menu></my-menu>
        <div
            id="toto"
            style="background-color: #cccccc"
            v-bar="{ preventParentScroll: false, scrollThrottle: 30, }"
            >
            <div class="col-md-10" style="height: 100vh">
                <div class="wrapper-page">
                    <ui-alert
                        @dismiss="showAlert = false"
                        type="error"
                        v-show="showAlert"
                        >
                        <p v-html="errorAlert"></p>
                    </ui-alert>
                    <router-view
                        v-on:sas-snackbar="showSnackBar"
                        v-on:sas-errors="showAlertError"
                        >
                    </router-view>
                </div>
            </div>
        </div>
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
    import myMenu       from './v-menu.vue';
    import Keen         from 'keen-ui';
    import { router }   from './../app.js';
    import { my_axios } from './../app.js';
    import { mapGetters } from 'vuex';
    export default {
        data() {
            return {
                position: "left",
                queueSnackbars: true,
                showAlert: false,
                errorAlert: '',
                showLoader: false,
            }
        },
        computed:
            mapGetters({ isRegistred: 'isRegistred', isAdmin: 'isAdmin' })
        ,
        methods: {
            signout() {
                auth.signout()
            },
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
            },
            setAxiosInterceptors() {
                const _self = this;
                // Add a request interceptor
                my_axios.interceptors.request.use(function (config) {
                    // Do something before request is sent
                    _self.showLoader = true
                    return config;
                }, function (error) {
                    _self.showLoader = false
                    // Do something with request error
                    return Promise.reject(error);
                });

                // Add a response interceptor
                my_axios.interceptors.response.use(function (response) {
                    // Do something with response data
                    _self.showLoader = false
                    return response;
                }, function (error) {
                    _self.showLoader = false
                    // Do something with response error
                    return Promise.reject(error);
                });
            }
        },
        components: {
            myMenu
        },

        mounted: function() {
            const _self = this;
            _self.$nextTick(function () {
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.setAxiosInterceptors()
            });
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
        border-top: 8px solid #787878;
        border-right: 8px solid #419641;
        border-bottom: 8px solid #787878;
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
</style>
