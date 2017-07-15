<template>
  <div class="col-xs-12">
    <h1>
      &Eacute;diter r&eacute;sultat
      <small>
        <ui-button
          type="secondary" color="accent" size="large"
          @click.prevent="update()">
          Modifier
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
import auth       from '../../../auth';
import vMenu      from '../../v-menu.vue';
import Keen       from 'keen-ui';
import resultForm from './result_form.vue';
import {app}      from './../../../app.js';
import {router}   from './../../../app.js';
import languageFr from '../../data/date-picker-lang.fr.js';
import moment     from 'moment';
export default {
  data() {
    return {
      resultId:       '',
      seasons:        [],
      seasonSelected: '',
      name:           '',
      locality:       '',
      pickerLang:     languageFr,
      contestAt:      null,
      listResults:    []
    }
  },
  methods: {
    index() {
      const _self    = this;
      _self.resultId = _self.$route.params.id;
      _self.$http.get('api/result/' + _self.resultId + '/edit').then(
        response => {
          let contest_at        = new moment(response.data.start_at),
              informations      = response.data.informations;
          _self.seasons         = response.data.seasons;
          _self.seasonSelected  = response.data.seasonSelected;
          _self.name            = response.data.result.name;
          _self.locality        = response.data.result.locality;
          _self.contestAt       = new Date(contest_at.format('YYYY-MM-DD'));
          for (var i = 0; i < informations.length; i++) {
            _self.addResult();
          }
          _self.$nextTick(function() {
            for (var i = 0; i < _self.listResults.length; i++) {
              _self.$refs[_self.listResults[i].ref][0].setName(informations[i].name);
              _self.$refs[_self.listResults[i].ref][0].setPlace(informations[i].place);
              _self.$refs[_self.listResults[i].ref][0].setAgeCategory(informations[i].ageCategory);
            }
          });
        },
        response => {
          _self.$emit('sas-snackbar', 'Une erreur est survenue');
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
    update() {
      const _self = this;
      let data    = _self.getDataForm();
      _self.$http.patch('api/result/' + _self.resultId, data).then(
        response => {
          _self.$emit('sas-snackbar', 'Résultat modifié');
          router.push({ name: 'admin_resultats_index' });
        },
        response => {
          _self.$emit('sas-snackbar', 'Une erreur est survenue');
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
        let newData   = {};
        newData.name  = _self.$refs[result.ref][0].getName();
        newData.place = _self.$refs[result.ref][0].getPlace();
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
