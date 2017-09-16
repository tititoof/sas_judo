<template>
    <div>
        <h1>
            &Eacute;v&egrave;nements
            <small>
                <ui-icon-button
                    class="pull-right"
                    type="primary" icon="add" color="primary" size="large"
                    @click.prevent="create()"
                    >
                </ui-icon-button>
            </small>
        </h1>
        <full-calendar
            :events="fcEvents"
            lang="fr"
            firstDay="1"
            @changeMonth="changeMonth"
            @eventClick="eventClick"
            @dayClick="dayClick"
            @moreClick="moreClick"
        >
        </full-calendar>
        <ui-modal
            dismiss-on="close-button esc"
            ref="eventModal"
            :title="eventTitle"
            >
            <div v-html="eventDescription"></div>
            <div slot="footer">
                <ui-button @click="destroy()"
                           color="red">Supprimer</ui-button>
                <ui-button v-if="isAdmin"
                            @click="edit()"
                           color="orange">Editer</ui-button>
                <ui-button @click="closeModal()">Fermer</ui-button>
            </div>
        </ui-modal>
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
            &ecirc;tes-vous s&ucirc;r de vouloir supprimer l'évènement ?
        </ui-confirm>
    </div>
</template>
<script>
    import vMenu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import fullCalendar from 'vue-fullcalendar';
    import { mapGetters }   from 'vuex';
    import moment from 'moment';
    export default {
        data() {
            return {
                fcEvents:         [],
                eventTitle:       '',
                eventDescription: '',
                deleteId:         Number,
                show: {
                    deleteConfirm: false
                }
            }
        },
        computed: mapGetters({ isAdmin: 'isAdmin', showError: 'showError' }),
        methods: {
            edit() {
                const _self = this;
                router.push({ name: 'admin_judo_event_edit', params: { id: _self.deleteId } });
            },
            destroy() {
                const _self = this;
                _self.$refs['deleteConfirm'].open();
            },
            deleteConfirmed() {
                const _self = this;
                _self.closeModal();
                _self.$http.delete('api/judoevent/' + _self.deleteId).then(
                    () => {
                    _self.$emit('sas-snackbar', 'évènement supprimé');
                    _self.index();
                }).catch(
                    error   => {
                        _self.$store.dispatch("showError", {
                            response:       error.response,
                            formElements:   _self.formErrors,
                            vue:            _self
                        })
                    }
                );
            },
            deleteDenied() {

            },
            index() {
                const _self = this;
                _self.$http.get('api/judoevent').then(
                    (response) => {
                    _self.fcEvents = response.data.events;
                }).catch(
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
                router.push({ name: 'admin_judo_event_new' });
            },
            'eventClick' (event) {
                const _self = this;
                _self.$http.get('api/judoevent/' + event.id).then(
                    (response) => {
                        const data = response.data.entity;
                        _self.setModalEvent(data);
                        _self.$refs['eventModal'].open();
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
            'dayClick' (day) {
                router.push({ name: 'admin_judo_event_new', params: { startAt: day } });
            },
            'moreClick' () {

            },
            'changeMonth' () {

            },
            setModalEvent(event) {
                const _self = this,
                    startAt = new moment(event.start_at).locale('fr'),
                    endAt   = new moment(event.end_at).locale('fr');
                switch (event.type) {
                    case 'tournament':
                        _self.eventTitle = "Compétition";
                        break;
                    case 'stage':
                        _self.eventTitle = "Stage";
                        break;
                    case 'event':
                    default:
                        _self.eventTitle = "Evènement";
                        break;
                }
                _self.eventDescription = "<strong>" + event.name + "</strong><br/>";
                _self.eventDescription += event.description + "<br/>";
                _self.eventDescription += "Début : " + startAt.format("dddd, MMMM Do YYYY, H:mm:ss");
                _self.eventDescription += "<br/>Fin :" + endAt.format("dddd, MMMM Do YYYY, H:mm:ss");
                _self.deleteId = event.id;
            },
            closeModal() {
                const _self = this;
                _self.$refs['eventModal'].close();
            }
        },
        components: {
            vMenu, fullCalendar
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.$store.dispatch("check",
                    { app: _self, router: router }
                )
                _self.index();
            });
        }
    }
</script>
