// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import $ from 'jquery'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import axios from 'axios'
import State from './state/state'
import StateData from './state/data'
Vue.config.productionTip = false

/* eslint-disable no-new */
Vue.prototype.$http=axios;
Vue.prototype.state=State;
Vue.prototype.stateDate=StateData;
new Vue({
  el: '#content',
  router,
  // State,
  template: '<App/>',
  components: { App }
});



