/**
 * Created by TerrorbladeChen on 2017/10/24.
 */
import {API_ROOT} from '@/api/api'
import axios from '@/api/http'
const state={
  banner_data:[],
  popup:false,
  pops:'',
  one_data:[],
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
  },
  setbanner({ commit, state },datas){
    return new Promise((resolve,reject)=>{
      axios({
        method:'post',
        url:API_ROOT,
        params:{service:'User.setbanner'},
        data:datas
      }).then((response)=>{
        resolve(response.data)
      }).catch((error)=>{
        console.log(error)
      })
    })
  },
  allremove({ commit, state },datas){
    return new Promise((resolve,reject)=>{
      axios({
        method:'post',
        url:API_ROOT,
        params:{service:'User.AllRemoveBanner'},
        data:datas
      }).then((response)=>{
        resolve(response.data)
      }).catch((error)=>{
        console.log(error)
      })
    })
  },
  One_setbanner({ commit, state },datas){
    return new Promise((resolve,reject)=>{
      axios({
        method:'post',
        url:API_ROOT,
        params:{service:'User.Oneamend'},
        data:datas
      }).then((response)=>{
        resolve(response.data)
      }).catch((error)=>{
        console.log(error)
      })
    })
  },
  ASC_banner({ commit, state },datas){
    return new Promise((resolve,reject)=>{
      axios({
        method:'post',
        url:API_ROOT,
        params:{service:'User.ascdata'},
        data:datas
      }).then((response)=>{
        resolve(response.data)
      }).catch((error)=>{
        console.log(error)
      })
    })
  },
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
  SHOW_CREATE_BJ:(state,i)=>{
    state.one_data=state.banner_data[i]
  },
  DELETE_CREATE_BJ:(state)=>{
    state.one_data=[]
  },
  CLOSE:(state)=>{
    state.popup=false;
  },
  PUSH_BANNER_DATA:(state,i)=>{
    state.banner_data.push(i)
  },
  AMEND_DATA:(state,o)=>{
    for(let i=0;i<state.banner_data.length;i++){
      if(o.sort==state.banner_data[i].sort){
        state.banner_data.splice(i,1,o)
      }
    }
  },
  ASC_DATA:(state,i)=>{
    let o=state.banner_data[i];
    state.banner_data.splice(i,1);
    state.banner_data.splice(i-1,0,o);
  },
  DSC_DATA:(state,i)=>{
    let o=state.banner_data[i];
    state.banner_data.splice(i,1);
    state.banner_data.splice(i+1,0,o);
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
  },
  openOneData:state=>{
    return state.one_data
  }
}
export default {
  state,
  actions,
  getters,
  mutations
}
