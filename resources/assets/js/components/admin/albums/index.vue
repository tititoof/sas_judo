<template>
    <div>
        <h1>
            Liste des albums
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
            v-if="albums.length > 0"
            >
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="album in albums">
                <td>
                    <ui-icon-button
                        type="secondary" icon="edit" color="orange" size="large"
                        @click="edit(album.id)"></ui-icon-button>
                    <ui-icon-button
                        type="secondary" size="large" icon="delete" color="red"
                        @click="destroy(album.id)"></ui-icon-button>
                </td>
                <td>{{ album.name }}</td>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer l'album ?
        </ui-confirm>
    </div>
</template>
<script>
    import auth from '../../../auth';
    import menu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import Vue from './../../../app.js';
    import {router} from './../../../app.js';
    import common from './../common.js';
    export default {
        data() {
            return {
                auth: auth,
                albums: [],
                deleteId: Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        mixins: [common],
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/album').then(
                    (response) => {
                        _self.albums = response.data.albums;
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
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
                _self.deleteObject('api/album/' + _self.deleteId, 'Album supprimé')
            },
            deleteDenied() {

            },
            edit(id) {
                router.push({ name: 'admin_albums_edit', params: { albumId: id } });
            },
            create() {
                router.push({ name: 'admin_albums_new'});
            }
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
