/**
 * Created by TerrorbladeChen on 2017/10/24.
 */
import {API_ROOT} from '@/api/api'
import axios from '@/api/http'
const state={
  banner_data:[],
  popup:false,
  pops:'',
}


const actions={
  getbanner({ commit, state }){
    return new Promise((resolve,reject)=>{
      axios.get(API_ROOT,{params:{service:'User.getbanner'}}).then((response)=>{
        commit('SET_PROJECT_LIST', { list: response.data.data })
      }).catch((error)=>{
        console.log(error)
      })
    })
  }
}

const mutations={
  SET_PROJECT_LIST:(state,{list})=>{
    state.banner_data=list
  },
  ALL_REMOVE:(state,n)=>{
    for(let i=0;i<n.length;i++){
      state.banner_data.splice(n[i]-i,1)
    }
  },
  ONE_REMOVE:(state,m)=>{
    state.banner_data.splice(m,1)
  },
  SHOW_BJ:(state)=>{
    state.popup=!state.popup;
  },
  SHOW_TC:(state,i)=>{
    state.pops=i;
  },
  CLOSE:(state)=>{
    state.popup=false;
  }
}
const getters={
  opendata:state=>{
    return state.banner_data
  },
  openpops:state=>{
    return state.pops
  },
  openpopup:state=>{
    return state.popup
  }
}
export default {
  state,
  actions,
  getters,
  mutations
}
