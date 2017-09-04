import * as types from '../mutation-types'


const state = {
    event: {
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
        types:          [
            {
                'label': 'compétition',
                'value': 'tournament'
            }, {
                'label': "évènement",
                'value': 'event'
            }, {
                'label': 'stage',
                'value': 'stage'
            }
        ],
    },
    
}

const getters = {
    judoEventTypeSelected: (state) => {
        return state.event.typeSelected
    },
    judoEventName: (state) => {
        return state.event.name
    },
    judoEventDescription: (state) => {
        return state.event.description
    },
    judoEventStartAt: (state) => {
        return state.event.startAt
    },
    judoEventStartTimeAt: (state) => {
        return state.event.startTimeAt
    },
    judoEventEndAt: (state) => {
        return state.event.endAt
    },
    judoEventEndTimeAt: (state) => {
        return state.event.endTimeAt
    },
    judoEventTypes: (state) => {
        return state.event.types
    }
}

const mutations = {
    [types.SET_JUDO_EVENT]: (state, { data, moment, typeSelected }) => {
        const startAt = new moment(data.start_at),
              endAt   = new moment(data.end_at);
        state.event.typeSelected        = typeSelected
        state.event.name                = data.name
        state.event.description         = data.description
        state.event.startAt             = new Date(startAt.format('YYYY-MM-DD'))
        state.event.endAt               = new Date(endAt.format('YYYY-MM-DD'))
        state.event.startTimeAt.HH      = startAt.format('HH');
        state.event.startTimeAt.mm      = startAt.format('mm');
        state.event.endTimeAt.HH        = endAt.format('HH');
        state.event.endTimeAt.mm        = endAt.format('mm');
    },
    [types.SET_JUDO_EVENT_TYPE_SELECTED]: (state, typeSelected) => {
        state.event.typeSelected        = typeSelected
    },
    [types.SET_JUDO_EVENT_NAME]: (state, name) => {
        state.event.name        = name
    },
    [types.SET_JUDO_EVENT_DESCRIPTION]: (state, description) => {
        state.event.description        = description
    },
    [types.SET_JUDO_EVENT_START_AT]: (state, startAt) => {
        state.event.startAt        = startAt
    },
    [types.SET_JUDO_EVENT_START_TIMEAT]: (state, startTimeAt) => {
        state.event.startTimeAt        = startTimeAt
    },
    [types.SET_JUDO_EVENT_END_AT]: (state, endAt) => {
        state.event.endAt        = endAt
    },
    [types.SET_JUDO_EVENT_END_TIMEAT]: (state, endTimeAt) => {
        state.event.endTimeAt        = endTimeAt
    }
}

const actions = {
    setJudoEvent({ commit, state }, { data, moment }) {
        const typeSelected = this.getType({ commit, state }, data.typeSelected)
        commit(types.SET_JUDO_EVENT, {
            data: data, 
            moment: moment,
            typeSelected: typeSelected
        })
    },
    getType({ commit, state }, type) {
        const _self = this;
        state.event.types.forEach((element) => {
            if (element.value == type) {
                state.event.typeSelected = element;
            }
        });
    }
}


export default {
    state,
    getters,
    actions,
    mutations
}