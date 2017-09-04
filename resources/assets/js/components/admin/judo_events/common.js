import {router} from './../../../app.js';
export default {
    data() {
        return {
            // types:          [{
            //     'label': 'compétition',
            //     'value': 'tournament'
            // }, {
            //     'label': "évènement",
            //     'value': 'event'
            // }, {
            //     'label': 'stage',
            //     'value': 'stage'
            // }],
            // typeSelected:   {},
            // name:           '',
            // description:    '',
            // startAt:        null,
            // startTimeAt:    {
            //         HH: "08",
            //         mm: "30"
            // },
            // endAt:          null,
            // endTimeAt:      {
            //         HH: "12",
            //         mm: "00"
            // },
            formErrors: [
                { 'name': 'name', 'human': 'Nom de l\'évènement'}, 
                { 'name': 'description', 'human': "Description" },
                { 'name': 'start_at', 'human': "Date de début" },
                { 'name': 'end_at', 'human': "Date de fin" },
                { 'name': 'end_time_at', 'human': "Heure de fin" },
                { 'name': 'start_time_at', 'human': "Heure de début" },
                { 'name': 'type', 'human': "Type d'évènement" },
            ]
        }
    },
    methods: {
        back() {
            router.go(-1)
        }
    }
}