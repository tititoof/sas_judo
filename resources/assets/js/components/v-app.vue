<template>
    <div>
        dzadzadzad
        <my-menu></my-menu>
        <div class="panel panel-default" id="toto">
            <div class="panel-heading">
                <nav>
                    <ul class="list-inline">
                        <li>
                            <router-link :to="{ name: 'home' }">Accueil</router-link>
                            <!--<a v-link="{ name: 'home' }">Accueil</a>-->
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_categories_index' }">Menus</router-link>
                            <!--<a v-link="{ name: 'admin_categories_index' }">Menus</a>-->
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_articles_index' }">Articles</router-link>
                            <!--<a v-link="{ name: 'admin_articles_index' }">Articles</a>-->
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_albums_index' }">Albums</router-link>
                            <!--<a v-link="{ name: 'admin_albums_index' }">Albums</a>-->
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_categories_index' }">Comp&eacute;titions</router-link>
                            <!--<a v-link="{ name: 'admin_categories_index' }">Comp&eacute;titions</a>-->
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_categories_index' }">&Eacute;v&egrave;nements</router-link>
                            <!--<a v-link="{ name: 'admin_categories_index' }">&Eacute;v&egrave;nements</a>-->
                        </li>
                        <li class="pull-right" v-if="auth.user.authenticated">
                            <router-link :to="{ name: 'admin_categories_index' }">Saisons</router-link>
                            <!--<a v-link="{ name: 'admin_categories_index' }">Saisons</a>-->
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="panel-body">
                <router-view></router-view>
                <ui-snackbar-container
                        :position="position" :queue-snackbars="queueSnackbars"
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
                position: "left"
            }
        },
        methods: {
            signout() {
                auth.signout()
            }
        },
        components: {
            myMenu
        },
        ready() {
            auth.check()
        },
        mounted: function() {
            this.$nextTick(function() {
                auth.check();
            });
        },
        events: {
            'sas-snackbar': function(msg) {
                const _self = this;
                _self.$broadcast('ui-snackbar::create', {
                    message: msg,
                    actionColor: 'accent',
                    duration: 5000
                });
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
</style>