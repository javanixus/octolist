import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const state = {
  isLogged: !!window.localStorage.getItem('token'),
  start: false,
  isLoggedAdmin: !!window.localStorage.getItem('token'),
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

  LOGIN_ADMIN(state) {
    state.isLoggedAdmin = true;
  },

  LOGOUT_ADMIN(state) {
    state.isLoggedAdmin = false;
  },

};

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  state,
  mutations
});
