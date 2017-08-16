<template>
    <div>
        <h1>
            Liste des saisons
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
                v-if="seasons.length > 0">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="season in seasons">
                <td>
                    <ui-icon-button
                            type="secondary" icon="edit" color="orange" size="large"
                            @click.prevent="edit(season.id)">
                    </ui-icon-button>
                    <ui-icon-button
                            type="secondary" size="large" icon="delete" color="red"
                            @click.prevent="destroy(season.id)">
                    </ui-icon-button>
                </td>
                <td>{{ season.name }}</td>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer la saison ?
        </ui-confirm>
    </div>
</template>
<script>
    import auth     from '../../../auth';
    import vMenu    from '../../v-menu.vue';
    import Keen     from 'keen-ui';
    import {app}    from './../../../app.js';
    import {router} from './../../../app.js';
    import common   from './../common.js';
    export default {
        data() {
            return {
                auth: auth,
                seasons: [],
                deleteId: Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        mixins: [common],
        methods: {
            edit(id) {
                router.push({ name: 'admin_seasons_edit', params: { seasonId: id } });
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.$refs['deleteConfirm'].open();
            },
            deleteConfirmed() {
                const _self = this;
                _self.deleteObject('api/season/' + _self.deleteId, 'Saison supprimée')
            },
            deleteDenied() {

            },
            index() {
                const _self = this;
                _self.$http.get('api/season').then( (response) => {
                    _self.seasons = response.data.seasons;
                }).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                    }
                );
            },
            create() {
                router.push({ name: 'admin_seasons_new' });
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
<style>

</style>