<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
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
            ref="starttimepicker"
            :minute-interval="5"
            format="HH:mm"
            v-model="startTimeAt"
            >
        </vue-timepicker>
        Heure de fin
        <vue-timepicker
            :minute-interval="5"
            v-model="endTimeAt"
            format="HH:mm"
            >
        </vue-timepicker>
        <ui-select
            name="teacher"
            label="Professeur"
            :options="teachers"
            v-model="teacherSelected"
            placeholder="Choisir le professeur"
            show-search
            z-index="1"
            >
        </ui-select>
    </div>
</template>
<script>
    import Keen             from 'keen-ui';
    import {app}            from './../../../app.js';
    import {router}         from './../../../app.js';
    import VueTimepicker    from 'vue2-timepicker/src/vue-timepicker';
    import moment           from 'moment';
    import common           from './common.js'
    import back             from './../back.js'
    export default {
        data() {
            return {
                id: ''
            }
        },
        mixins: [common, back],
        components: {
            VueTimepicker
        },
        methods: {
            index() {
                const _self = this;
                _self.id    = _self.$route.params.id;
                _self.$http.get(
                    'api/course/' + _self.id + '/edit'
                ).then(
                    (response) => {
                        const data      = response.data;
                        _self.teachers  = data.data.teachers;
                        _self.seasons   = data.data.seasons;
                        _self.days      = data.data.days;
                        _self.setObject(data.data.course);
                        _self.refreshHighlightNextTick()
                    }
                ).catch(
                    error   => {
                        console.log(error)
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                );
                _self.refreshHighlightNextTick()
            },
            update() {
                const _self = this;
                _self.$http.patch('api/course/' + _self.id, {
                    'name': _self.name, 'day': _self.daySelected.value,
                    'start_at': _self.startTimeAt, 'end_at': _self.endTimeAt,
                    'teacher_id': _self.teacherSelected.value, 'season_id': _self.seasonSelected.value
                }).then(
                    () => {
                        _self.$emit('sas-snackbar', 'Cours modifié');
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
            },
            setObject(course) {
                const _self = this,
                    startAt = course.start_at.split(":"),
                    endAt   = course.end_at.split(":");
                _self.name = course.name;
                // this.$store.dispatch("setCourseStartTimeAt", { 'HH': startAt[0], 'mm': startAt[1] } )
                _self.startTimeAt.HH = startAt[0]
                _self.startTimeAt.mm = startAt[1]
                // this.$store.dispatch("setCourseEndTimeAt", { 'HH': endAt[0], 'mm': endAt[1] } )
                _self.endTimeAt.HH = endAt[0]
                _self.endTimeAt.mm = endAt[1]
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
                const _self = this
                _self.$nextTick(() => {
                    _self.refreshAllHighlight()
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
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.index();
                this.$nextTick(() => {
                    window.hljs.initHighlightingOnLoad()
                })
            })
        }
    }
</script>
