<template>
  <div class="col-xs-12">
    <h1>
      Editer le cours
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
      :minute-interval="5"
      v-model="startTimeAt"
      :time-value.sync="startTimeAt"
    >
    </vue-timepicker>
    Heure de fin
    <vue-timepicker
      :minute-interval="5"
      :time-value.sync="endTimeAt"
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
        id:               '',
        days:             [],
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
        _self.id    = _self.$route.params.id;
        _self.$http.get('api/course/' + _self.id + '/edit').then(
          (response) => {
            let data = response.data;
            _self.teachers = data.objects.teachers;
            _self.seasons  = data.objects.seasons;
            _self.days     = data.objects.days;
            _self.setObject(data.objects.course);
          },
          (response) => {
            console.log(response);
          }
        );
      },
      update() {
        const _self = this;
        _self.$http.patch('api/course/' + _self.id, {
          'name': _self.name, 'day': _self.daySelected.value,
          'start_at': _self.startTimeAt, 'end_at': _self.endTimeAt,
          'teacher_id': _self.teacherSelected.value, 'season_id': _self.seasonSelected.value
        }).then(
          (response) => {
            _self.$emit('sas-snackbar', 'Cours modifié');
            router.push({ name: 'admin_courses_index' });
          },
          (response) => {
            console.log(response);
          }
        )
      },
      setObject(course) {
        const _self = this;
        let startAt = course.start_at.split(":"),
            endAt   = course.end_at.split(":");
            console.log(startAt);
        _self.name = course.name;
        _self.startTimeAt.HH  = startAt[0];
        _self.startTimeAt.mm  = startAt[1];
        _self.endTimeAt.HH    = endAt[0];
        _self.endTimeAt.mm    = endAt[1];
        _self.teachers.forEach(function (element) {
            if (element.value == course.teacher_id) {
                _self.teacherSelected = element;
            }
        });
        _self.seasons.forEach(function (element) {
            if (element.value == course.season_id) {
                _self.seasonSelected = element;
            }
        });
        _self.days.forEach(function (element) {
            if (element.value == course.day) {
                _self.daySelected = element;
            }
        });
        _self.refreshHighlightNextTick();
      },
      refreshHighlightNextTick () {
        const self = this
        this.$nextTick(() => {
          self.refreshAllHighlight()
        })
      },
      refreshAllHighlight () {
        if (!this.$el) { return }
        const codeBlocks = this.$el.querySelectorAll('pre code')
        Array.prototype.forEach.call(codeBlocks, (block) => {
          window.hljs.highlightBlock(block)
        })
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
