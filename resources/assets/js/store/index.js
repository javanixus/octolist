import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const state = {
  isLogged: !!window.localStorage.getItem('token'),
  keyBypass: !!window.localStorage.getItem('key'),
};

const mutations = {
  LOGIN_USER(state) {
    state.isLogged = true;
    state.keyBypass = window.localStorage.getItem('key');
  },

  LOGOUT_USER(state) {
    state.isLogged = false;
    state.keyBypass = false;
  }
};

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  state,
  mutations
});
