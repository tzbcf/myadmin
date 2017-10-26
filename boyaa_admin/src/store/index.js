import Vue from 'vue'
import Vuex from 'vuex'
import banner from './modules/banner'
import common from './modules/common'
Vue.use(Vuex);
export default new Vuex.Store({
  modules:{
    banner,
    common,
  }
})
