<template>
  <div>
    <h1>
      Liste des résultats
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
      v-if="results.length > 0">
      <thead>
        <tr>
            <th>#</th>
            <th>Saison</th>
            <th>Nom</th>
            <th>Lieu</th>
            <th>R&eacute;sultats</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="result in results">
          <td>
            <ui-icon-button
                type="secondary" icon="edit" color="orange" size="large"
                @click.prevent="edit(result.id)">
            </ui-icon-button>
            <ui-icon-button
                type="secondary" size="large" icon="delete" color="red"
                @click.prevent="destroy(result.id)">
            </ui-icon-button>
          </td>
          <td>{{ result.season }}</td>
          <td>{{ result.name }}</td>
          <td>{{ result.locality }}</td>
            <td>
                <ul>
                    <li
                        v-for="information in result.informations"
                        >
                        {{ information.name }} : {{ information.place }}
                        <template v-if="information.ageCategory">
                            ({{ information.ageCategory.label }})
                        </template>
                    </li>
                </ul>
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
        &ecirc;tes-vous s&ucirc;r de vouloir supprimer le résultat ?
    </ui-confirm>
  </div>
</template>
<script>
import vMenu    from '../../v-menu.vue';
import Keen     from 'keen-ui';
import {app}    from './../../../app.js';
import {router} from './../../../app.js';
import moment   from 'moment'
export default {
    data() {
        return {
            results:  [],
            deleteId: ''
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.$http.get('api/result').then(
                response => {
                    const data = response.data;
                    data.results.forEach(function(element) {
                        _self.formatData(element);
                    })
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
            router.push({ name: 'admin_resultats_new' });
        },
        edit(id) {
            router.push({ name: 'admin_resultats_edit', params: { id: id } });
        },
        deleteConfirmed() {
            const _self = this;
            _self.$http.delete('api/result/' + _self.deleteId).then(
                () => {
                    _self.$emit('sas-snackbar', 'Résultat supprimé');
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
        formatData(data) {
            const _self = this,
                 line   = {};
            line.name           = data.name;
            line.season         = data.season;
            line.contest_at     = moment(data.contest_at, "YYYY-MM-DD HH:mm:ss").format("dddd Do MMMM YYYY");
            line.locality       = data.locality
            line.informations   = JSON.parse(data.informations);
            _self.results.push(line);
        },
        deleteDenied() {
        },
        destroy(id) {
            const _self = this;
            _self.deleteId = id;
            _self.$refs['deleteConfirm'].open();
        }
    },
    components: { vMenu },
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
