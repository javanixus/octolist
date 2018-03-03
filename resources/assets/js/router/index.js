// import deb
import Router from 'vue-router';
import Vue from 'vue';

// import pages to render
import Welcome from './../components/welcome';
import login from './../components/auth/login';
import logout from './../components/auth/logout';
import ForgotPass from './../components/auth/forgotpass';
import Dashboard from './../components/dashboard';
import DashboardSiswa from './../components/project/board';
import Profile from './../components/student/profile';
import nothing from './../components/404';
import GetStarted from './../components/getstarted/GetStarted';
import About from './../components/about';
import ProfileSetup from './../components/getstarted/profile-setup';
import final from './../components/getstarted/startFinal';
import adminDashboard from './../components/admin/adminDashboard';
import loginAdmin from './../components/auth/loginAdmin';
import dashboardTeacher from './../components/teacher/dashboardTeacher';

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
      path: '/board',
      component: Dashboard,
    },
    {
      path: '/board/p/:projectId',
      component: DashboardSiswa,
      name: 'board'
    },
    {
      path: '/start/setup',
      component: ProfileSetup,
    },
    {
      path: '/start/final',
      component: final
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
      path: '/teacher/board',
      component: dashboardTeacher
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
