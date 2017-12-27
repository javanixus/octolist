import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
const debug = process.env.NODE_ENV !== 'production';

//constanta modified 
const state = {
  title: 'halo, saya pampam'
};
const getters = {};
const mutations = {
  SET_TITLE(state, title) {
    state.title = title;
  }
};
const actions = {

};

//default: Konstanta di atas dimasukkan sebagai parameter instance Vuex bersamaan dengan diekspornya modul tersebut.
export default new Vuex.Store({
  state,
  getters,
  mutations,
  actions
});
