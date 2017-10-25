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
            },
            colors: {
                hex: '#194d33',
                hsl: {
                    h: 150,
                    s: 0.5,
                    l: 0.2,
                    a: 1
                },
                hsv: {
                    h: 150,
                    s: 0.66,
                    v: 0.30,
                    a: 1
                },
                rgba: {
                    r: 25,
                    g: 77,
                    b: 51,
                    a: 1
                },
                a: 1
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
    },
    methods: {
        handleChange: function (colors) {
            this.colors = colors
        },
        handleUpdate: function (colors, oldColor) {
            this.colors = colors
        }
    }
}
