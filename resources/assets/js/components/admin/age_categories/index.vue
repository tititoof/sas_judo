<template>
    <div>
        <h1>
            Liste des cat&eacute;gories d'&acirc;ge
            <small>
                <ui-icon-button
                    class="pull-right"
                    type="primary" icon="add" color="primary" size="large"
                    @click.prevent="create()"
                    >
                </ui-icon-button>
            </small>
        </h1>
        <table
            class="table table-striped"
            v-if="ageCategories.length > 0"
            >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Âge de départ</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in ageCategories">
                    <td>
                        <ui-icon-button
                            type="secondary" icon="edit" color="orange" size="large"
                            @click="edit(category.id)"></ui-icon-button>
                        <ui-icon-button
                            type="secondary" size="large" icon="delete" color="red"
                            @click="destroy(category.id)"></ui-icon-button>
                    </td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.years }} ans</td>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer la catégorie d'âge ?
        </ui-confirm>
    </div>
</template>
<script>
import menu     from '../../v-menu.vue';
import Keen     from 'keen-ui';
import Vue      from './../../../app.js';
import {router} from './../../../app.js';
import common   from './../common.js';
export default {
    data() {
        return {
            ageCategories:  [],
            deleteId:       Number,
            show:           {
                deleteConfirm: false
            }
        }
    },
    mixins: [common],
    methods: {
        index() {
            const _self = this;
            _self.$http.get('api/age_category').then(
                (response) => {
                    _self.ageCategories = response.data.ageCategories;
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
            _self.deleteObject('api/age_category/' + _self.deleteId, 'Catégorie d\'age supprimée')
            _self.index();
        },
        deleteDenied() {

        },
        edit(id) {
            router.push({ name: 'admin_age_categories_edit', params: { id: id } });
        },
        create() {
            router.push({ name: 'admin_age_categories_new'});
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
<style>
</style>
