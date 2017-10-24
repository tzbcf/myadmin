import Vue from 'vue'
import Vuex from 'vuex'
import banner from './modules/banner'
Vue.use(Vuex);
export default new Vuex.Store({
  modules:{
    banner:banner,
  }
})
