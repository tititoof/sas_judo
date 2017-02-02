<template>
    <div class="col-xs-12">
        <h1>
            Liste des articles
            <small>
                <ui-icon-button type="flat" icon="add" color="primary"
                    v-link="{ name: 'admin_articles_new' }"
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
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="article in articles"
                >
                <td>
                    <ui-icon-button type="flat" icon="edit" color="warning" @click="edit(article.id)"></ui-icon-button>
                    <ui-icon-button type="flat" icon="delete" color="danger" @click="destroy(article.id)"></ui-icon-button>
                </td>
                <td>{{ article.name }}</td>
            </tr>
            </tbody>
        </table>
        <ui-confirm
            header="Suppression" type="danger" confirm-button-text="Supprimer"
            confirm-button-icon="delete" deny-button-text="Cancel" @confirmed="deleteConfirmed"
            @denied="deleteDenied" :show.sync="show.deleteConfirm" close-on-confirm
            >
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer l'article ?
        </ui-confirm>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import menu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    export default {
        data() {
            return {
                auth: auth,
                articles: [],
                deleteId: Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        components: {
//            FileUpload: require('vue-upload-component')
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/article').then(
                    (response) => {
                        _self.articles = response.data.articles;
                    },
                    (response) => {
                        console.log(response);
                    }
                );
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.show.deleteConfirm = true;
            },
            deleteConfirmed() {
                const _self = this;
                _self.$http.delete('api/article/' + _self.deleteId).then(function(response) {
                    _self.$dispatch('sas-snackbar', 'Article supprimé');
                    _self.index();
                }, function(response) {
                    console.log(response);
                });
            },
            deleteDenied() {

            },
            edit(id) {
                console.log(id);
                router.go({ name: 'admin_articles_edit', params: { articleId: id } });
            }
        },
        ready() {
            const _self = this;
            auth.check();
            _self.index();
        }
    }
</script>