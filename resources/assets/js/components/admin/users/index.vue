<template>
    <div>
        <h1>
            Liste des utilisateurs
        </h1>
        <table
            class="table table-striped"
            v-if="users.length > 0">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Admin ?</th>
                  <th>Professeur ?</th>
                  <th>Debug ?</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>
                        <ui-icon-button
                            type="secondary" icon="edit" color="orange" size="large"
                            @click.prevent="edit(user.id)">
                        </ui-icon-button>
                        <ui-icon-button
                            type="secondary" size="large" icon="delete" color="red"
                            @click.prevent="destroy(user.id)">
                        </ui-icon-button>
                    </td>
                    <td>{{ user.name }}</td>
                    <td>
                        <ui-button
                            type="secondary" color="accent"
                            @click.prevent="toggleAdmin(user.id)">
                            <template v-if="user.is_admin">Oui</template>
                            <template v-else>Non</template>
                        </ui-button>
                    </td>
                    <td>
                        <ui-button
                            type="secondary" color="accent"
                            @click.prevent="toggleTeacher(user.id)">
                            <template v-if="user.is_teacher">Oui</template>
                            <template v-else>Non</template>
                        </ui-button>
                    </td>
                    <td>
                        <ui-button
                            type="secondary" color="accent"
                            @click.prevent="toggleDebug(user.id)">
                            <template v-if="user.is_debug">Oui</template>
                            <template v-else>Non</template>
                        </ui-button>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer l'utilisateur ?
        </ui-confirm>
    </div>
</template>
<script>
    import vMenu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import common from './../common.js';
    export default {
        data() {
            return {
                users:      [],
                deleteId:   Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        mixins: [common],
        methods: {
            index() {
                const _self = this;
                _self.$http.get(
                    'api/admin/user'
                ).then(
                    (response) => {
                        const data = response.data;
                        _self.users = data.users;
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
            edit(id) {
                router.push({ name: 'admin_users_edit', params: { userId: id } });
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

            },
            toggleAdmin(id) {
                const _self = this;
                _self.$http.put(
                    'api/user/' + id + '/toggle/admin'
                ).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Utilisateur modifié');
                        _self.index();
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
            toggleTeacher(id) {
                const _self = this;
                _self.$http.put(
                    'api/user/' + id + '/toggle/teacher'
                ).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Utilisateur modifié');
                        _self.index();
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
            toggleDebug(id) {
                const _self = this;
                _self.$http.put(
                    'api/user/' + id + '/toggle/debug'
                ).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Utilisateur modifié');
                        _self.index();
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
