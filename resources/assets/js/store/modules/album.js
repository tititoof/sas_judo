import * as types from '../mutation-types'

const state = {
    pictures: [],
}

const getters = {
    pictures: state => state.pictures,
    [types.GET_ALBUM_PICTURES]: (state) => {
        return state.pictures
    }
}

const mutations = {
    [types.ADD_TO_ALBUM_PICTURES]: (state, id) => {
        state.pictures.push(id)
    },
    [types.RESET_ALBUM_PICTURES]: (state) => {
        state.pictures = []
    }
}

// actions
const actions = {
    addPictureToAlbum ({ commit, state }, id) {
        commit(types.ADD_TO_ALBUM_PICTURES, id)
    },
    getPicturesInAlbum ({ commit }) {
        commit(types.GET_ALBUM_PICTURES)
    },
    resetPicturesInAlbum ({ commit }) {
        commit(types.RESET_ALBUM_PICTURES)
    }
}


export default {
  state,
  getters,
  actions,
  mutations
}