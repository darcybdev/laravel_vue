import Vue from 'vue';
import Router from 'vue-router';

import Confirm from '@/Auth/src/components/Confirm';
import Home from '@/Home/src/components/Home';
import LandingPage from '@/Home/src/components/LandingPage';

Vue.use(Router);

const appRouter = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/auth/confirm',
      component: Confirm
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ './views/About.vue')
    },
    {
      path: '*',
      redirect: '/'
    }
  ]
});

appRouter.beforeEach((to, from, next) => {
  // redirect to login page if not logged in and trying to access a restricted page
  const publicPages = ['/'];
  const authRequired = !publicPages.includes(to.path);
  //const loggedIn = localStorage.getItem('user');

  const loggedIn = true;

  if (authRequired && !loggedIn) {
    return next('/');
  }

  next();
});

export default appRouter;
