import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const state = {
  isLogged: !!window.localStorage.getItem('token'),
  start: false
};

const mutations = {
  LOGIN_USER(state) {
    state.isLogged = true;
  },

  START_USER(state) {
    state.start = true;
  },

  END_START_USER(state) {
    state.start = false;
  },

  LOGOUT_USER(state) {
    state.isLogged = false;
  },
};

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  state,
  mutations
});
