<template>
    <div class="main-div">
        <my-menu></my-menu>
        <div id="toto" style="background-color: #cccccc"
            v-bar="{
                    preventParentScroll: false,
                    scrollThrottle: 30,
                }">
            <div class="col-md-10"
                >
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
            <ui-snackbar-container
                ref="snackbarContainer"
                :position="position"
                :queue-snackbars="queueSnackbars"
                transition="slideUp"
                >
            </ui-snackbar-container>
        </div>
    </div>
</template>
<script>
    import myMenu       from './v-menu.vue';
    import Keen         from 'keen-ui';
    import { router }   from './../app.js';
    import { mapGetters } from 'vuex';
    export default {
        data() {
            return {
                position: "left",
                queueSnackbars: true,
                showAlert: false,
                errorAlert: ''
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
</style>
