// import deb
import Vue from 'vue';
import VueLazyload from 'vue-lazyload';
import VModal from 'vue-js-modal';
import VueProgressiveImage from 'vue-progressive-image';
import vueKanban from 'vue-kanban';
import VeeValidate from 'vee-validate';
import vBlur from 'v-blur';

// import page
import App from './App';
import router from './router';
import store from './store/index';
import '../sass/app.scss';

// exec
Vue.use(vBlur);
Vue.use(vueKanban);
Vue.use(VeeValidate, { fieldsBagName: 'formFields' });
Vue.use(VueProgressiveImage, {
  delay: 3000
});
Vue.use(VModal);
Vue.component('detectNetwork', require('v-offline'));
Vue.component('detectNetworkBar', require('v-offline'));
/* space needed between this line */
Vue.config.productionTip = false;
Vue.use(VueLazyload, {
  lazyComponent: true,
  preLoad: 20,
  attempt: 1,
  observer: true,
});
//

//
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  template: '<App/>',
  components: { App },
});

