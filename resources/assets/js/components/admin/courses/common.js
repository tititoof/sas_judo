export default {
    data() {
        return {
            days:               [],
            daySelected:        '',
            teachers:           [],
            teacherSelected:    '',
            name:               '',
            seasons:            [],
            seasonSelected:     '',
            formErrors:         [
                { 'name': 'name', 'human': 'Nom du cours'},
                { 'name': 'season_id', 'human': "Saison" },
                { 'name': 'day', 'human': "Jours" },
                { 'name': 'start_at', 'human': "Heure de début" },
                { 'name': 'end_at', 'human': "Heure de fin" },
                { 'name': 'teacher_id', 'human': "Professeur" },
            ],
            startTimeAt: {
                HH: "",
                mm: ""
            },
            endTimeAt: {
                HH: "",
                mm: ""
            }
        }
    },
    computed: {
        // startTimeAt: {
        //     get() {
        //         return this.$store.state.course.course.startTimeAt
        //     },
        //     set(value) {
        //         this.$store.commit('SET_COURSE_START_TIME_AT', value)
        //     }
        // },
        // endTimeAt: {
        //     get() {
        //         return this.$store.state.course.course.endTimeAt
        //     },
        //     set(value) {
        //         this.$store.commit('SET_COURSE_END_TIME_AT', value)
        //     }
        // }
    }
}
