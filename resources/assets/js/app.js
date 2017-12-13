// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
// import router from './router/index';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import store from './store';
import VueLazyload from 'vue-lazyload';
import VueResource from 'vue-resource';
import VModal from 'vue-js-modal';
import '../sass/app.scss';
import VueProgressiveImage from 'vue-progressive-image';
import Example from './components/ExampleComponent';

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
        name: 'Example',
        path: '/',
        component: Example
    }
  ];

const router = new VueRouter({ mode: 'history', routes: routes});
/* eslint-disable no-new */
new Vue({
    el: '#app',
    router, store,
    template: '<App/>',
    components: { App },
  });
  