<template>
    <div>
        <h1>
        Liste des cours
        <small>
            <ui-icon-button
                class="pull-right"
                type="primary" icon="add" color="primary" size="large"
                @click.prevent="create()"
                >
            </ui-icon-button>
        </small>
        </h1>
        <scheduler
            :time-ground='["15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00" ]'
            :week-ground="['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']"
            :task-detail="listCourses">
        </scheduler>
        <table
            class="table table-striped"
            v-if="courses.length > 0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Saison</th>
                    <th>Jour</th>
                    <th>Heures</th>
                    <th>Professeur</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="course in courses">
                    <td>
                        <ui-icon-button
                            type="secondary" icon="edit" color="orange" size="large"
                            @click.prevent="edit(course.id)">
                        </ui-icon-button>
                        <ui-icon-button
                            type="secondary" size="large" icon="delete" color="red"
                            @click.prevent="destroy(course.id)">
                        </ui-icon-button>
                    </td>
                    <td>{{ course.season }}</td>
                    <td>{{ course.day }}</td>
                    <td>{{ course.start_at }} - {{ course.end_at }}</td>
                    <td>{{ course.teacher }}</td>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer le cours ?
        </ui-confirm>
    </div>
</template>
<script>
    import vMenu        from '../../v-menu.vue';
    import Keen         from 'keen-ui';
    import scheduler    from '../../scheduler/vue-schedule.vue';
    import {app}        from './../../../app.js';
    import {router}     from './../../../app.js';
    import common       from './../common.js';
    export default {
        data() {
            return {
                courses:      [],
                listCourses:  [],
                deleteId:     ''
            }
        },
        mixins: [common],
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/course').then(
                    (response) => {
                        const data        = response.data;
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
            create() {
                router.push({ name: 'admin_courses_new' });
            },
            deleteConfirmed() {
                const _self = this;
                _self.deleteObject('api/course/' + _self.deleteId, 'Cours supprimé')
            },
            deleteDenied() {

            },
            edit(id) {
                router.push({ name: 'admin_courses_edit', params: { id: id } });
            },
            destroy(id) {
                const _self = this;
                _self.deleteId = id;
                _self.$refs['deleteConfirm'].open();
            },
        },
        components: {
            vMenu, scheduler
        },
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
