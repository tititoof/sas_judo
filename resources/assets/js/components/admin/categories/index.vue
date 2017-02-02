<template>
    <div class="col-xs-12">
        <h1>
            Liste des menus
            <small>
                <ui-icon-button type="flat" icon="add" color="primary"
                    v-link="{ name: 'admin_categories_new' }"
                    >
                </ui-icon-button>
            </small>
        </h1>
        <table
            class="table table-striped"
            v-if="categories.length > 0"
            >
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="category in categories"
                >
                <td>
                    <ui-icon-button type="flat" icon="edit" color="warning" @click="edit(category.id)"></ui-icon-button>
                    <ui-icon-button type="flat" icon="delete" color="danger" @click="destroy(category.id)"></ui-icon-button>
                </td>
                <td>{{ category.name }}</td>
            </tr>
            </tbody>
        </table>
        <ui-confirm
            header="Suppression" type="danger" confirm-button-text="Supprimer"
            confirm-button-icon="delete" deny-button-text="Cancel" @confirmed="deleteConfirmed"
            @denied="deleteDenied" :show.sync="show.deleteConfirm" close-on-confirm
            >
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer le menu ?
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
                categories: [],
                deleteId: Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        methods: {
            edit(id) {
                const _self = this;
                router.go({ name: 'admin_categories_edit', params: { categoryId: id } });
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.show.deleteConfirm = true;
            },
            deleteConfirmed() {
                const _self = this;
                _self.$http.delete('api/category/' + _self.deleteId).then(function(response) {
                    _self.$dispatch('sas-snackbar', 'Menu supprimé');
                    _self.index();
                }, function(response) {
                    console.log(response);
                });
            },
            deleteDenied() {

            },
            index() {
                const _self = this;
                _self.$http.get('api/category').then(function(response) {
                    _self.categories = response.data.categories;
                }, function(response) {
                    console.log("error ! :'(");
                })
            }
        },
        components: {
            menu
        },
        ready() {
            const _self = this;
            auth.check();
            _self.index();
        }
    }
</script>

