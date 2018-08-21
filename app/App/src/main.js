import Vue from 'vue';
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue';
import VueScrollto from 'vue-scrollto';
import VueScrollClass from 'vue-scroll-class';
import VueToasted from 'vue-toasted';

import App from './App.vue';
import router from './router';
import store from './store';

import './scss/_mixins.scss';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false;

Vue.use(BootstrapVue);
Vue.use(VueScrollto, {
  container: 'body',
  duration: 500,
  easing: 'ease',
  offset: 0,
  cancelable: true,
  onStart: false,
  onDone: false,
  onCancel: false,
  x: false,
  y: true
});
Vue.use(VueToasted, {
  duration: 3000
});

Vue.directive('scroll-class', VueScrollClass);

axios.interceptors.response.use(response => {
  return response;
}, error => {
  if (error.response.status === 401) {
    console.log('401 response');
    authService.logout()
      .then(() => {
        router.replace('/');
      });
  }
  return Promise.reject(error);
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
