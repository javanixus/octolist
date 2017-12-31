// import deb
import Router from 'vue-router';
import Vue from 'vue';
import axios from 'axios';

// import pages to render
import Welcome from './../components/welcome';
import login from './../components/auth/login';
import logout from './../components/auth/logout';
import ForgotPass from './../components/auth/forgotpass';
import Dashboard from './../components/dashboard';
import DashboardSiswa from './../components/board';
import Profile from './../components/profile';
import nothing from './../components/404';
import GetStarted from './../components/getstarted/GetStarted';
import GetStartedWelcome from './../components/getstarted/hello';
import About from './../components/about';
import ProfileSetup from './../components/getstarted/profile-setup';
import AdminDashboard from './../components/dashboard/admin-dashboard';

// exec
Vue.use(Router);
/* header passing laravel axios */
export const HTTP = axios.create({
  headers: {
    'Access-Control-Expose-Headers': ['Access-Token', 'Uid'],
    Authorization: 'Bearer {token}'
  }
});

/* end of header passing */
// routing map
export default new Router({
  routes: [
    {
      name: 'Welcome',
      path: '/',
      component: Welcome
    },
    {
      path: '/login',
      component: login,
      meta: { requiresAuth: true },
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
      name: 'board'
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
      component: GetStartedWelcome
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
      path: '/logout',
      component: logout,
    },
    {
      path: '*',
      redirect: '/404'
    },
  ],
  mode: 'history'
});
