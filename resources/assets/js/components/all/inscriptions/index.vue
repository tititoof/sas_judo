<template>
    <div class="col-xs-12">
        <h1>
            Liste des inscriptions
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
            v-if="inscriptions.length > 0">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Saison</th>
                  <th>Nom</th>
                  <th>Pr&eacute;nom</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="inscription in inscriptions">
                    <td>
                        <ui-icon-button
                            type="secondary" icon="edit" color="orange" size="large"
                            @click.prevent="edit(inscription.id)">
                        </ui-icon-button>
                        <ui-icon-button
                            type="secondary" size="large" icon="delete" color="red"
                            @click.prevent="destroy(inscription.id)">
                        </ui-icon-button>
                    </td>
                    <td>{{ inscription.firstname }}</td>
                    <td>{{ inscription.lastname }}</td>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer l'utilisateur ?
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
                auth:           auth,
                inscriptions:   [],
                deleteId:       Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/inscriptions').then(
                    (response) => {
                        let data = response.data;
                        _self.inscriptions = data.list;
                    },
                    (response) => {
                        console.log(response);
                    }
                )
            },
            create() {
                router.push({ name: 'inscriptions_edit' });
            },
            edit(id) {
                const _self = this;
                router.push({ name: 'inscriptions_edit', params: { id: id } });
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.$refs['deleteConfirm'].open();
            },
            deleteConfirmed() {
                const _self = this;
                _self.$http.delete('api/admin/user/' + _self.deleteId).then(function(response) {
                    _self.$emit('sas-snackbar', 'Utilisateur supprimé');
                    _self.index();
                }, function(response) {
                    console.log(response);
                });
            },
            deleteDenied() {

            },
            toggleAdmin(id) {
              const _self = this;
              _self.$http.put('api/user/' + id + '/toggle/admin').then(
                (response) => {
                  _self.$emit('sas-snackbar', 'Utilisateur modifié');
                  _self.index();
                },
                (response) => {
                  console.log(response);
                }
              );
            },
            toggleTeacher(id) {
              const _self = this;
              _self.$http.put('api/user/' + id + '/toggle/teacher').then(
                (response) => {
                  _self.$emit('sas-snackbar', 'Utilisateur modifié');
                  _self.index();
                },
                (response) => {
                  console.log(response);
                }
              );
            }
        },
        components: {
            vMenu
        },
        mounted() {
            this.$nextTick(function() {
               const _self = this;
               auth.check(_self);
               _self.index();
            });
        }
    }
</script>
