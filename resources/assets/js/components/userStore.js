const state = {
  authUser: null
};
const mutations = {
  SET_AUTH_USER (state, userObj) {
    state.authUser = userObj;
  }
};
const actions = {

};

export default {
  state, mutations , actions
};
