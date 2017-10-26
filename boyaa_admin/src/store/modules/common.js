/**
 * Created by TerrorbladeChen on 2017/10/26.
 */
import {API_ROOT} from '@/api/api'
import axios from '@/api/http'
const state={
  users:{},
};

const actions={
  login({ commit, state },userobj){
    return new Promise((resolve,reject)=>{
      axios({
        method:'post',
        url:API_ROOT,
        params:{service:'User.Userlogin',username:userobj.username,password:userobj.password},
      }).then((response)=>{
        commit("USER_INFO",response.data.data)
        resolve(response.data.data)
      }).catch((error)=>{
        console.log(error)
      })
    })
  },
};

const mutations={
  USER_INFO:(state,user)=>{
    state.users=user;
  }
};

const getters={
  openuser:state=>{
    state.users.role1=parseInt(state.users.role1);
    state.users.role2=parseInt(state.users.role2);
    state.users.role3=parseInt(state.users.role3);
    return state.users;
  }
};

export default {
  state,
  actions,
  getters,
  mutations
}