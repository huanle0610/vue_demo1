import Vue from 'vue'
import Vuex from 'vuex'
import * as types from './types'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        system: {user: null},
        count: 0
    },
    mutations: {
        [types.LOGIN]: (state, data) => {
            localStorage.token = data
            state.token = data
        },
        [types.LOGOUT]: (state) => {
            localStorage.removeItem('token')
            state.token = null
        },
        [types.TITLE]: (state, data) => {
            state.title = data
        }
    }
})

export default store
