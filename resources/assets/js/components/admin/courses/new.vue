<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
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
            :minute-interval="5" 
            v-model="startTimeAt"
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
    import Keen         from 'keen-ui';
    import {app}        from './../../../app.js';
    import {router}     from './../../../app.js';
    import VueTimepicker from 'vue2-timepicker';
    import moment       from 'moment';
    import common       from './common.js'
    import back         from './../back.js'
    export default {
        data() {
            return {
            }
        },
        mixins: [common, back],
        components: {
            VueTimepicker
        },
        methods: {
          index() {
            const _self = this;
            _self.$http.get('api/course/create').then(
                (response) => {
                    const data = response.data;
                    _self.teachers = data.data.teachers;
                    _self.seasons  = data.data.seasons;
                    _self.days     = data.data.days;
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
          store() {
            const _self = this;
            _self.$http.post('api/course', { 'name': _self.name, 'day': _self.daySelected.value,
                'start_at': _self.startTimeAt, 'end_at': _self.endTimeAt,
                'teacher_id': _self.teacherSelected.value, 'season_id': _self.seasonSelected.value }
            ).then(
                () => {
                    _self.$emit('sas-snackbar', 'Saison ajoutée');
                    router.push({ name: 'admin_courses_index' });
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
        mounted() {
            this.$nextTick(function() {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.index();
            })
        }
    }
</script>
