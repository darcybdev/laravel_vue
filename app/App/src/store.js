import Vue from 'vue';
import Vuex from 'vuex';

import auth from '@/Auth/src/auth.store';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth
  }
});
