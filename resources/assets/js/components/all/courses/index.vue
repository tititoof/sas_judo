<template>
    <div>
            <h1>
                Cours
            </h1>
        <scheduler
            :time-ground='["15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00" ]'
            :week-ground="['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']"
            :task-detail="listCourses">
        </scheduler>
        <p>
            &nbsp;
            <div style="float: right">
                <ui-fab
                    icon="keyboard_arrow_up"
                    tooltip-position="top middle"
                    tooltip="Haut"
                    size="small"
                    color="green"
                    @click.prevent="scrollTop"
                ></ui-fab>
            </div>
        </p>
    </div>
</template>
<script>
    import auth         from '../../../auth';
    import Keen         from 'keen-ui';
    import scheduler    from '../../scheduler/vue-schedule.vue';
    import {app}        from './../../../app.js';
    import {router}     from './../../../app.js';
    export default {
        data() {
            return {
                courses:      [],
                listCourses:  [],
                deleteId:     ''
            }
        },
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/visitor/courses').then(
                    (response) => {
                        const data          = response.data;
                        _self.courses     = data.objects;
                        _self.listCourses = data.scheduler;
                    }
                ).catch(
                    error   => {
                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));
                    }
                );
            },
            scrollTop() {
                window.scrollTo(0,0)
            }
        },
        components: {
            scheduler
        },
        mounted() {
            this.$nextTick(function() {
                const _self = this;
                auth.check(_self);
                _self.index();
            });
        }
    }
</script>