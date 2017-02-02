<template>
    <div class="col-xs-12">
        <h1>
            Liste des albums
            <small>
                <ui-icon-button type="flat" icon="add" color="primary"
                                v-link="{ name: 'admin_albums_new' }"
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
            <tr
                    v-for="album in albums"
            >
                <td>
                    <ui-icon-button type="flat" icon="edit" color="warning" @click="edit(album.id)"></ui-icon-button>
                    <ui-icon-button type="flat" icon="delete" color="danger" @click="destroy(album.id)"></ui-icon-button>
                </td>
                <td>{{ album.name }}</td>
            </tr>
            </tbody>
        </table>
        <ui-confirm
                header="Suppression" type="danger" confirm-button-text="Supprimer"
                confirm-button-icon="delete" deny-button-text="Cancel" @confirmed="deleteConfirmed"
                @denied="deleteDenied" :show.sync="show.deleteConfirm" close-on-confirm
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
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/album').then(
                    (response) => {
                        _self.albums = response.data.albums;
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
                _self.$http.delete('api/album/' + _self.deleteId).then(function(response) {
                    _self.$dispatch('sas-snackbar', 'Album supprimé');
                    _self.index();
                }, function(response) {
                    console.log(response);
                });
            },
            deleteDenied() {

            },
            edit(id) {
                console.log(id);
                router.go({ name: 'admin_albums_edit', params: { albumId: id } });
            }
        },
        ready() {
            const _self = this;
            auth.check();
            _self.index();
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