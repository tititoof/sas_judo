<template>
  <div>
    <h1>
      Liste des résultats
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
          <td>{{ result.season_id }}</td>
          <td>{{ result.name }}</td>
          <td>{{ result.lieu }}</td>
          <td>{{ result.informations }}</td>
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
import auth     from '../../../auth';
import vMenu    from '../../v-menu.vue';
import Keen     from 'keen-ui';
import {app}    from './../../../app.js';
import {router} from './../../../app.js';
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
                    _self.results = response.data.results;
                }
            ).catch(
                error   => {
                    _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
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
                    _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                }
            );
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
