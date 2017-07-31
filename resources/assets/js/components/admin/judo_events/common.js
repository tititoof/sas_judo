export default {
    data() {
        return {
            types:          [{
                'label': 'compétition',
                'value': 'tournament'
            }, {
                'label': "évènement",
                'value': 'event'
            }, {
                'label': 'stage',
                'value': 'stage'
            }],
            typeSelected:   {},
            name:           '',
            description:    '',
            startAt:        null,
            startTimeAt:    {
                    HH: "08",
                    mm: "30"
            },
            endAt:          null,
            endTimeAt:      {
                    HH: "12",
                    mm: "00"
            },
            formErrors: [
                { 'name': 'name', 'human': 'Nom du cours'}, 
                { 'name': 'description', 'human': "Description" },
                { 'name': 'start_at', 'human': "Date de début" },
                { 'name': 'end_at', 'human': "Date de fin" },
                { 'name': 'types', 'human': "Type d'évènement" },
            ]
        }
    }
}