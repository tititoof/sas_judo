<template>
  <div>
    <my-menu></my-menu>
    <div class="panel panel-default" id="toto">
      <div class="panel-body">
        <router-view
            v-on:sas-snackbar="showSnackBar"
            >
        </router-view>
        <ui-snackbar-container
            ref="snackbarContainer"
            :position="position"
            :queue-snackbars="queueSnackbars"
            transition="slideUp"
            >
        </ui-snackbar-container>
      </div>
    </div>
  </div>
</template>
<script>
    import auth   from '../auth';
    import myMenu from './v-menu.vue';
    import Keen   from 'keen-ui';
    export default {
        data() {
            return {
                auth: auth,
                position: "left",
                queueSnackbars: true
            }
        },
        computed: {
            isAdmin() {
                return this.auth.checkIsAdmin();
            }
        },
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
            }
        },
        components: {
            myMenu
        },
        mounted: function() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
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
