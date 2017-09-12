<template>
    <div>
        <h1>
            Liste des inscriptions
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
                    <td>{{ inscription.season }}</td>
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
    import vMenu    from './../../v-menu.vue';
    import Keen     from 'keen-ui';
    import {app}    from './../../../app.js';
    import {router} from './../../../app.js';
    import common   from './../../admin/common.js';
    export default {
        data() {
            return {
                inscriptions:   [],
                deleteId:       Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        mixins: [common],
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/inscriptions').then(
                    (response) => {
                        const data = response.data;
                        _self.inscriptions = data.data;
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
            create() {
                router.push({ name: 'inscriptions_edit' });
            },
            edit(id) {
                router.push({ name: 'inscriptions_edit', params: { id: id } });
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.$refs['deleteConfirm'].open();
            },
            deleteConfirmed() {
                const _self = this;
                _self.deleteObject('api/admin/user/' + _self.deleteId, 'Utilisateur supprimé')
            },
            deleteDenied() {

            }
        },
        components: {
            vMenu
        },
        mounted() {
            this.$nextTick(function() {
               const _self = this;
               _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
               _self.index();
            });
        }
    }
</script>
