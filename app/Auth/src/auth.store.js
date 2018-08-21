
import authService from './auth.service';
import appRouter from '@/App/src/router';

const user = JSON.parse(localStorage.getItem('user'));
const state = user
  ? {
    status: {
      loggedIn: true
    },
    user
  }
  : {
    status: {},
    user: null
  };

console.log('state', state);

const actions = {
  login({ dispatch, commit }, { username, password }) {
    commit('loginRequest', { username });

    authService.login(username, password)
      .then(user => {
        commit('loginSuccess', user);
        appRouter.push('/');
        //appRouter.go();
      }, error => {
        commit('loginFailure', error);
        dispatch('alert/error', error, { root: true });
      });
  },
  logout({ commit }) {
    authService.logout()
      .then(response => {
        commit('logout');
        console.log('you have logged out');
      });
  }
};

const mutations = {
  loginRequest(state, user) {
    state.status = { loggingIn: true };
    state.user = user;
  },
  loginSuccess(state, user) {
    state.status = { loggedIn: true };
    state.user = user;
  },
  loginFailure(state) {
    state.status = {};
    state.user = null;
  },
  logout(state) {
    state.status = {};
    state.user = null;
  }
};

export const auth = {
  namespaced: true,
  state,
  actions,
  mutations
};
