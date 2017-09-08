<template>
    <div>
        <h1>
            Liste des articles
            <small>
                <ui-icon-button
                    type="secondary" icon="add" color="accent" size="large"
                    @click.prevent="create()"
                >
                </ui-icon-button>
            </small>
        </h1>
        <table
            class="table table-striped"
            v-if="articles.length > 0"
            >
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Menu(s)</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="article in articles">
                <td>
                    <ui-icon-button
                        type="secondary" icon="edit" color="orange" size="large"
                        @click="edit(article.id)"></ui-icon-button>
                    <ui-icon-button
                        type="secondary" size="large" icon="delete" color="red"
                        @click="destroy(article.id)"></ui-icon-button>
                </td>
                <td>
                    {{ article.name }}
                </td>
                <td>
                    <template v-for="(menu, index) in article.menus" >
                        <span> {{ menu }}</span><span v-if="(index + 1) < article.menus.length">, </span>
                    </template>
                </td>
            </tr>
            </tbody>
        </table>
        <ui-confirm
            title="Suppression" type="primary"
            confirm-button-icon="delete"
            confirm-button-text="Supprimer"
            deny-button-text="Annuler"
            ref="deleteConfirm"
            @confirm="deleteConfirmed"
            @deny="deleteDenied"
            close-on-confirm
            >
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer l'article ?
        </ui-confirm>
    </div>
</template>
<script>
    import menu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    import common from './../common.js';
    export default {
        data() {
            return {
                articles: [],
                deleteId: Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        mixins: [common],
        components: {
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/article').then(
                    (response) => {
                        _self.articles = response.data.articles;
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
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.$refs['deleteConfirm'].open();
            },
            deleteConfirmed() {
                const _self = this;
                _self.deleteObject('api/article/' + _self.deleteId, 'Article supprimé')
            },
            deleteDenied() {

            },
            edit(id) {
                router.push({ name: 'admin_articles_edit', params: { articleId: id } });
            },
            create() {
                router.push({ name: 'admin_articles_new' });
            }
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.index();
            });
        }
    }
</script>
