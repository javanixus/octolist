// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import store from './store';
import VueLazyload from 'vue-lazyload';
import VueResource from 'vue-resource';
import VModal from 'vue-js-modal';
import '../sass/app.scss';
import VueProgressiveImage from 'vue-progressive-image';

import Welcome from './components/welcome';
import welcome from './components/welcome';
import login from './components/auth/login';
import ForgotPass from './components/auth/forgotpass';
import Dashboard from './components/dashboard';
import DashboardSiswa from './components/board';
import Profile from './components/profile';
import nothing from './components/404';
import GetStarted from './components/getstarted/GetStarted';
import GetStarted_welcome from './components/getstarted/hello';
import About from './components/about';
import ProfileSetup from './components/getstarted/profile-setup';
import AdminDashboard from './components/dashboard/admin-dashboard';

Vue.use(VueProgressiveImage, {
  delay: 3000
});

Vue.use(VueResource);
Vue.component('detectNetwork', require('v-offline'));
Vue.component('detectNetworkBar', require('v-offline'));

Vue.config.productionTip = false;

// import lazy load
Vue.use(VueLazyload, {
  lazyComponent: true,
  preLoad: 20,
  attempt: 1,
  observer: true,
});

const routes = [
  {
    name: 'Welcome',
    path: '/',
    component: Welcome
  },
  {
    path: '/login',
    component: login,
  },
  {
    path: '/forgot',
    component: ForgotPass
  },
  {
    path: '/dashboard',
    component: Dashboard,
  },
  {
    path: '/dashboard/board',
    component: DashboardSiswa,
  },
  {
    path: '/getstarted/profile-setup',
    component: ProfileSetup,
  },
  {
    path: '/profile',
    component: Profile,
  },
  {
    path: '/404',
    component: nothing,
  },
  {
    path: '/getstarted',
    component: GetStarted,
    name: GetStarted
  },
  {
    path: '/getstarted/hello',
    component: GetStarted_welcome
  },
  {
    path: '/about',
    component: About
  },
  {
    path: '/admin',
    component: AdminDashboard
  },
  {
    path: '*',
    redirect: '/404'
  },
];

const router = new VueRouter({ mode: 'history', routes });
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
store,
  template: '<App/>',
  components: { App },
});

