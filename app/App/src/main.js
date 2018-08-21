import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import VueScrollto from 'vue-scrollto';
import VueScrollClass from 'vue-scroll-class';

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

Vue.directive('scroll-class', VueScrollClass);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
