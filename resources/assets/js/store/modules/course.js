import * as types from '../mutation-types'

const state = {
    course: {
        startTimeAt: {
            HH: "",
            mm: ""
        },
        endTimeAt: {
            HH: "",
            mm: ""
        }
    }
}

const getters = {
    courseStartTimeAt: (state) => {
        return state.course.startTimeAt
    },
    courseEndTimeAt: (state) => {
        return state.course.endTimeAt
    }
}

const mutations = {
    [types.SET_COURSE_START_TIME_AT]: (state, value) => {
        state.course.startTimeAt.HH        = value.HH
        state.course.startTimeAt.mm        = value.mm
    },
    [types.SET_COURSE_END_TIME_AT]: (state, value) => {
        state.course.endTimeAt.HH        = value.HH
        state.course.endTimeAt.mm        = value.mm
    }
}

const actions = {
    setCourseStartTimeAt({ commit, state }, value) {
        commit(types.SET_COURSE_START_TIME_AT, value)
    },
    setCourseEndTimeAt({ commit, state }, value) {
        commit(types.SET_COURSE_END_TIME_AT, value)
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
