<template>
  <div class="col-xs-12">
    <h1>
      Nouveau r&eacute;sultat
      <small>
        <ui-button
          type="secondary" color="accent" size="large"
          @click.prevent="store()">
          Cr&eacute;er
        </ui-button>
      </small>
    </h1>
    <ui-select
      name="season" label="Saison"
      :options="seasons"
      v-model="seasonSelected"
      placeholder="Choisir la saison" show-search z-index="1"
    >
    </ui-select>
    <ui-textbox
      label="Nom" name="name" type="text" placeholder="Entrer le nom"
      v-model="name"
      >
    </ui-textbox>
    <ui-textbox
      label="Lieu" name="locality" type="text" placeholder="Entrer le lieu"
      v-model="locality"
      >
    </ui-textbox>
    <ui-datepicker
      icon="events"
      picker-type="modal"
      placeholder="Sélectionner une date"
      :lang="pickerLang"
      v-model="contestAt"
    >Date</ui-datepicker>
    R&eacute;sultat(s) :
    <ui-icon-button
      color="primary"
      icon="add"
      size="small"
      @click="addResult"
      >
    </ui-icon-button>
    <ui-icon-button
      color="primary"
      icon="remove"
      size="small"
      @click="removeResult"
      >
    </ui-icon-button>
    <template
      v-for="resultForm in listResults"
      >
      <component
        :is="resultForm.name"
        :ref="resultForm.ref"
        >
      </component>
    </template>
  </div>
</template>
<script>
import auth from '../../../auth';
import vMenu from '../../v-menu.vue';
import Keen from 'keen-ui';
import resultForm from './result_form.vue';
import {app} from './../../../app.js';
import {router} from './../../../app.js';
import languageFr from '../../data/date-picker-lang.fr.js';
export default {
  data() {
    return {
      seasons:        [],
      seasonSelected: '',
      name:           '',
      locality:       '',
      pickerLang:     languageFr,
      contestAt:      null,
      listResults:    [{
        name: 'resultForm',
        ref: 'resultForm0'
      }]
    }
  },
  methods: {
    index() {
      const _self = this;
      _self.$http.get('api/result/create').then(
        response => {
          _self.seasons = response.data.seasons;
        },
        response => {
          console.log(response);
        }
      );
    },
    addResult() {
      const _self = this;
      _self.listResults.push( {
        name: 'resultForm',
        ref: 'resultForm' + _self.listResults.length
      });
    },
    removeResult() {
      const _self = this;
      _self.listResults.pop();
    },
    store() {
      const _self = this;
      let data    = _self.getDataForm();
      _self.$http.post('api/result', data).then(
        response => {
          _self.$emit('sas-snackbar', 'Résultat ajouté');
          router.push({ name: 'admin_resultats_index' });
        },
        response => {
          console.log(response);
        }
      );
    },
    getDataForm() {
      const _self = this;
      let data    = {};
      data.season_id    = _self.seasonSelected.value;
      data.name         = _self.name;
      data.locality     = _self.locality;
      data.contest_at   = _self.contestAt;
      data.informations = [];
      _self.listResults.forEach(function(result) {
        let newData         = {};
        newData.name        = _self.$refs[result.ref][0].getName();
        newData.place       = _self.$refs[result.ref][0].getPlace();
        newData.ageCategory = _self.$refs[result.ref][0].getAgeCategory();
        data.informations.push(newData);
      });
      return data;
    }
  },
  components: { vMenu, resultForm },
  mounted() {
    this.$nextTick(function() {
      const _self = this;
      auth.check(_self);
      _self.index();
    });
  }
}
</script>
