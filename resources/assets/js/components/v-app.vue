<template>
    <div>
        <my-menu></my-menu>
        <div class="panel panel-default" id="toto">
            <div class="panel-heading">
                <nav>
                    <ul class="list-inline">
                        <li>
                            <router-link :to="{ name: 'home' }">Accueil</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_categories_index' }">Menus</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_articles_index' }">Articles</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_albums_index' }">Albums</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_judo_event_index' }">&Eacute;v&egrave;nements</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_seasons_index' }">Saisons</router-link>
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_users_index' }">Utilisateurs</router-link>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="panel-body">
                <router-view
                    v-on:sas-snackbar="showSnackBar"></router-view>
                <ui-snackbar-container
                        ref="snackbarContainer"
                        :position="position"
                        :queue-snackbars="queueSnackbars"
                        transition="slideUp"
                ></ui-snackbar-container>
            </div>
        </div>
    </div>
</template>
<script>
    import auth from '../auth';
    import myMenu from './v-menu.vue';
    import Keen from 'keen-ui';
    export default {
        data() {
            return {
                auth: auth,
                position: "left",
                queueSnackbars: true
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
