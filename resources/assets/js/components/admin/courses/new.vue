<template>
  <div class="col-xs-12">
    <h1>
      Nouveau cours
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
      label="Nom" name="name" type="text" placeholder="Entrer le nom du cours"
      v-model="name"
      >
    </ui-textbox>
    <ui-select
      name="day" label="Jour"
      :options="days"
      v-model="daySelected"
      placeholder="Choisir le jour" show-search z-index="1"
    >
    </ui-select>
    Heure de d&eacute;but
    <vue-timepicker
      :minute-interval="5" v-model="startTimeAt"
    >
    </vue-timepicker>
    Heure de fin
    <vue-timepicker
      :minute-interval="5"
      v-model="endTimeAt"
    >
    </vue-timepicker>
    <ui-select
      name="teacher"
      label="Professeur"
      :options="teachers"
      v-model="teacherSelected"
      placeholder="Choisir le professeur" show-search z-index="1"
    >
    </ui-select>
  </div>
</template>
<script>
  import auth from '../../../auth';
  import Keen from 'keen-ui';
  import {app} from './../../../app.js';
  import {router} from './../../../app.js';
  import VueTimepicker from 'vue2-timepicker';
  import moment from 'moment';
  export default {
    data() {
      return {
        days: [],
        daySelected:      '',
        startTimeAt: {
            HH: "08",
            mm: "30"
        },
        endTimeAt: {
            HH: "12",
            mm: "00"
        },
        teachers:         [],
        teacherSelected:  '',
        name:             '',
        seasons:          [],
        seasonSelected:   ''
      }
    },
    components: {
        VueTimepicker
    },
    methods: {
      index() {
        const _self = this;
        _self.$http.get('api/course/create').then(
          (response) => {
            const _self = this;
            let data = response.data;
            _self.teachers = data.objects.teachers;
            _self.seasons  = data.objects.seasons;
            _self.days     = data.objects.days;
          },
          (response) => {
            console.log(response);
          }
        );
      },
      store() {
        const _self = this;
        _self.$http.post('api/course', { 'name': _self.name, 'day': _self.daySelected.value,
          'start_at': _self.startTimeAt, 'end_at': _self.endTimeAt,
          'teacher_id': _self.teacherSelected.value, 'season_id': _self.seasonSelected.value } ).then(
          (response) => {
            _self.$emit('sas-snackbar', 'Saison ajoutée');
            router.push({ name: 'admin_courses_index' });
          },
          (response) => {
            console.log(response);
          }
        )
      }
    },
    mounted() {
      this.$nextTick(function() {
        const _self = this;
        auth.check(_self);
        _self.index();
      })
    }
  }
</script>
