import Vue from 'vue';
import authService from './auth.service';

const user = JSON.parse(localStorage.getItem('user'));

export default {
  namespaced: true,
  state: {
    user: user ? user : null,
    status: null,
    error: null
  },
  mutations: {
    AuthLoginRequest (state) {
      state.status = 'loading';
    },
    AuthLoginSuccess (state, user) {
      state.user = user;
      state.status = 'success';
      state.error = null;
    },
    AuthLoginError (state, error) {
      state.status = 'error';
      state.error = error;
    },
    AuthLogout (state) {
      state.user = null;
      state.status = null;
      state.error = null;
    },
    AuthRegisterRequest (state) {
      state.status = 'loading';
    },
    AuthRegisterSuccess (state) {
      state.status = 'success';
      state.error = null;
    },
    AuthRegisterError (state, error) {
      state.status = 'error';
      state.error = error;
    }
  },
  actions: {
    login ({ commit }, { username, password }) {
      commit('AuthLoginRequest');
      return authService.login(username, password)
        .then(user => {
          commit('AuthLoginSuccess', user);
          Vue.toasted.show('Welcome back, ' + user.username + '!');
          return Promise.resolve(user);
        })
        .catch(error => {
          commit('AuthLoginError', error.response.data);
          return Promise.reject(error.response.data);
        });
    },
    logout ({ commit }) {
      authService.logout()
        .then(response => {
          commit('AuthLogout');
          Vue.toasted.show('You have logged out.');
        });
    },
    register ({ commit }, { email, username, password }) {
      commit('AuthRegisterRequest');
      return authService.register(email, username, password)
        .then(response => {
          commit('AuthRegisterSuccess');
        })
        .catch(response => {
          commit('AuthRegisterError', response.data);
        });
    }
  }
};
