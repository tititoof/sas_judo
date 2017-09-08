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
        <p class="final">
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
        <p>&nbsp;</p>
    </div>
</template>
<script>
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
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
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
                _self.index();
            });
        },
        watch: {
            '$route.params.menu'(newId, oldId) {
                this.index()
            }
        }
    }
</script>
