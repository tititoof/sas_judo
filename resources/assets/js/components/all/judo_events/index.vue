<template>
    <div>
        <h1>
            &Eacute;v&egrave;nements
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
                <ui-button @click="closeModal()">Fermer</ui-button>
            </div>
        </ui-modal>
    </div>
</template>
<script>
    import vMenu from '../../v-menu.vue';
    import Keen from 'keen-ui';
    import {app} from './../../../app.js';
    import {router} from './../../../app.js';
    import fullCalendar from 'vue-fullcalendar';
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
        methods: {
            index() {
                const _self = this;
                _self.$http.get('api/visitor/judoevent').then(
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
            },
            'changeMonth'() {

            },
            'moreClick'() {

            }
        },
        components: {
            vMenu, fullCalendar
        },
        mounted() {
            this.$nextTick(function () {
                const _self = this;
                _self.index();
            });
        }
    }
</script>
