// import deb
import Router from 'vue-router';
import Vue from 'vue';

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
import About from './../components/about';
import ProfileSetup from './../components/getstarted/profile-setup';
import adminDashboard from './../components/admin/adminDashboard';
import loginAdmin from './../components/auth/loginAdmin';

// exec
Vue.use(Router);
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
      path: '/start/setup',
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
      path: '/start',
      component: GetStarted,
      name: GetStarted
    },
    {
      path: '/about',
      component: About
    },
    {
      path: '/admin',
      component: adminDashboard
    },
    {
      path: '/admin/login',
      component: loginAdmin
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
