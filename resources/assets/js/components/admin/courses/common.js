export default {
    data() {
        return {
            days: [],
            daySelected:      '',
            startTimeAt: {
                HH: "08",
                mm: "30"
            },
            endTimeAt: {
                HH: "12",
                mm: "00"
            },
            teachers:         [],
            teacherSelected:  '',
            name:             '',
            seasons:          [],
            seasonSelected:   '',
            formErrors: [
                { 'name': 'name', 'human': 'Nom du cours'}, 
                { 'name': 'season_id', 'human': "Saison" },
                { 'name': 'day', 'human': "Jours" },
                { 'name': 'start_at', 'human': "Heure de début" },
                { 'name': 'end_at', 'human': "Heure de fin" },
                { 'name': 'teacher_id', 'human': "Professeur" },
            ]
        }
    }
}