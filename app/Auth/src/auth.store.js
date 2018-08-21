import Vue from 'vue';
import authService from './auth.service';
import appRouter from '@/App/src/router';

const user = JSON.parse(localStorage.getItem('user'));

export default {
  namespaced: true,
  state: {
    user: user ? user : null,
    status: null,
    error: null
  },
  mutations: {
    AuthConfirmRequest (state) {
      state.status = 'loading';
    },
    AuthConfirmSuccess (state) {
      state.status = 'success';
      state.error = null;
    },
    AuthForgotPassword (state) {
      state.status = 'success';
    },
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
    },
    AuthResetError (state, error) {
      state.status = 'error';
      state.error = error;
    },
    AuthResetRequest (state) {
      state.status = 'loading';
    },
    AuthResetSuccess (state) {
      state.status = 'success';
      state.error = null;
    }
  },
  actions: {
    confirm ({ commit }, { userId, token }) {
      commit('AuthConfirmRequest');
      return authService.confirm(userId, token)
        .then(() => {
          Vue.toasted.show('Your account has been confirmed. Please login');
          appRouter.replace('/');
          return Promise.resolve(true);
        })
        .catch(() => {
          Vue.toasted.show('Invalid url');
          appRouter.replace('/');
          return Promise.reject(false);
        });
    },
    login ({ commit }, { username, password }) {
      commit('AuthLoginRequest');
      return authService.login(username, password)
        .then(user => {
          commit('AuthLoginSuccess', user);
          Vue.toasted.show('Welcome back, ' + user.username + '!');
          appRouter.replace({
            name: 'home',
            query: {},
            hash: null
          });
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
        .catch(error => {
          commit('AuthRegisterError', error.response.data.errors);
          return Promise.reject(error.response.data.errors);
        });
    },
    forgotPassword ({ commit }, { email }) {
      return authService.forgotPassword(email)
        .then(response => {
          commit('AuthForgotPassword', email);
          return Promise.resolve(true);
        });
    },
    resetPassword ({ commit }, { email, password, password_confirmation, token }) {
      commit('AuthResetRequest');
      return authService.reset(email, password, password_confirmation, token)
        .then(() => {
          commit('AuthResetSuccess');
          Vue.toasted.show('Your password has been reset, please login');
          appRouter.replace('/?view=auth&auth=login');
          return Promise.resolve(true);
        })
        .catch(error => {
          console.log('err', error.response.data);
          let err = error.response.data.errors[0].error;
          let message = typeof err === 'string' ? err : err[0];
          commit('AuthResetError', message);
          return Promise.reject(message);
        });
    }
  }
};
