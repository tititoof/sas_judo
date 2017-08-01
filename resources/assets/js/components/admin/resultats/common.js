import {router} from './../../../app.js';
import languageFr from '../../data/date-picker-lang.fr.js';
export default {
    data() {
        return {
            seasons:        [],
            seasonSelected: '',
            name:           '',
            locality:       '',
            pickerLang:     languageFr,
            contestAt:      null,
            listResults:    [],
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
        },
        getDataForm() {
            const _self = this,
                 data   = {};
            data.season_id    = _self.seasonSelected.value;
            data.name         = _self.name;
            data.locality     = _self.locality;
            data.contest_at   = _self.contestAt;
            data.informations = [];
            _self.listResults.forEach(function(result) {
                const newData = {};
                newData.name  = _self.$refs[result.ref][0].getName();
                newData.place = _self.$refs[result.ref][0].getPlace();
                data.informations.push(newData);
            });
            return data;
        }
    }
}