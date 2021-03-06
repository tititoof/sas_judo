import Vue          from 'vue'
import Vuex         from 'vuex'
import * as actions from './actions'
import * as getters from './getters'
import album        from './modules/album'
import user         from './modules/user'
import judoEvent    from './modules/judoevent'
import course       from './modules/course'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    actions,
    getters,
    modules: {
        album:      album,
        user:       user,
        judoEvent:  judoEvent,
        course:     course
    },
    strict: debug
})
