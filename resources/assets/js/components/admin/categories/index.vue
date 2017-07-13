<template>
    <div class="col-xs-12">
        <h1>
            Liste des menus
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
            v-if="categories.length > 0">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories">
                <td>
                    <ui-icon-button
                        type="secondary" icon="edit" color="orange" size="large"
                        @click.prevent="edit(category.id)">
                    </ui-icon-button>
                    <ui-icon-button
                        type="secondary" size="large" icon="delete" color="red"
                        @click.prevent="destroy(category.id)">
                    </ui-icon-button>
                </td>
                <td>{{ category.name }}</td>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer le menu ?
        </ui-confirm>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import vMenu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
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
                router.push({ name: 'admin_categories_edit', params: { categoryId: id } });
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.$refs['deleteConfirm'].open();
            },
            deleteConfirmed() {
                const _self = this;
                _self.$http.delete('api/category/' + _self.deleteId).then(function(response) {
                    _self.$emit('sas-snackbar', 'Menu supprimé');
                    _self.index();
                }, function(response) {
                    _self.$emit('sas-snackbar', 'Une erreur est survenue.');
                });
            },
            deleteDenied() {

            },
            index() {
                const _self = this;
                _self.$http.get('api/category', { 'user_id': auth.user.profile.id }).then(function(response) {
                    _self.categories = response.data.categories;
                }, function(response) {
                    _self.$emit('sas-snackbar', 'Une erreur est survenue.');
                })
            },
            create() {
                router.push({ name: 'admin_categories_new' });
            }
        },
        components: {
            vMenu
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                auth.check(_self);
                _self.index();
            });
        }
    }
</script>
