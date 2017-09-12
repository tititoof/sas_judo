import {router} from './../../../app.js';
import languageFr from '../../data/date-picker-lang.fr.js';

export default {
    data() {
        return {
            formErrors: [
                { 'name': 'name',           'human': 'Nom de l\'évènement'},
                { 'name': 'description',    'human': "Description" },
                { 'name': 'start_at',       'human': "Date de début" },
                { 'name': 'end_at',         'human': "Date de fin" },
                { 'name': 'end_time_at',    'human': "Heure de fin" },
                { 'name': 'start_time_at',  'human': "Heure de début" },
                { 'name': 'type',           'human': "Type d'évènement" },
            ],
            frLang: languageFr,
            startTimeAt:    {
                HH: "08",
                mm: "30"
            },
            endTimeAt:      {
                HH: "12",
                mm: "00"
            },
        }
    },
    computed: {
        typeSelected: {
            get() {
                return this.$store.state.judoEvent.event.typeSelected
            },
            set(value) {
                this.$store.commit('SET_TYPE_SELECTED', value)
            }
        },
        name: {
            get() {
                return this.$store.state.judoEvent.event.name
            },
            set(value) {
                this.$store.commit('SET_JUDO_EVENT_NAME', value)
            }
        },
        description: {
            get() {
                return this.$store.state.judoEvent.event.description
            },
            set(value) {
                this.$store.commit('SET_JUDO_EVENT_DESCRIPTION', value)
            }
        },
        startAt: {
            get() {
                return this.$store.state.judoEvent.event.startAt
            },
            set(value) {
                this.$store.commit('SET_START_AT', value)
            }
        },
        endAt: {
            get() {
                return this.$store.state.judoEvent.event.endAt
            },
            set(value) {
                this.$store.commit('SET_END_AT', value)
            }
        },
        types: {
            get() {
                return this.$store.state.judoEvent.event.types
            }
        },
        showError: {
            get() {
                return this.$store.state.user.showError
            }
        }
    },
    methods: {
        back() {
            router.go(-1)
        }
    }
}
