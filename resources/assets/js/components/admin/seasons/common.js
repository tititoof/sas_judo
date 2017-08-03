import {router} from './../../../app.js';
import languageFr from './../../data/date-picker-lang.fr.js';
export default {
    data() {
        return {
            name:       '',
            startAt:    null,
            endAt:      null,
            pickerLang: languageFr,
            formErrors: [
                { 'name': 'name', 'human': 'Nom de la saison'}, 
                { 'name': 'start_at', 'human': "Date de début" },
                { 'name': 'end_at', 'human': "Date de fin" },
            ]
        }
    },
    methods: {
        back() {
            router.go(-1)
        }
    }
}