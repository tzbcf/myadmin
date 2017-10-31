<template>
    <div class="control container">
      <div class="row">
        <div class="col-lg-12 set">
          <span>系统设置</span>
          >
          <span>管理员设置</span>
        </div>
      </div>
      <div class="row">
        <div class="infoList col-lg-12">
          <div class="search">
            <label>
              <span>工号：</span>
              <input type="text">
            </label>
            <label>
              <span>管理员姓名：</span>
              <input type="text">
            </label>
          </div>
          <div class="btns">
            <label>
              <input type="checkbox" v-model="check" @click="checkall">
              <span>全选</span>
            </label>
            <a href="javascript:;" class="btn btn-danger" @click="delall()">批量删除</a>
            <a href="javascript:;" class="btn btn-info" @click="addrole">+新增管理员</a>
          </div>
          <div class="tabels">
            <table>
              <tr>
                <th>序号</th>
                <th>姓名</th>
                <th>手机号码</th>
                <th>权限</th>
                <th>最后登录时间</th>
                <th>操作</th>
              </tr>
              <tr v-for="(list,index) in userlist">
                <td>
                  <label>
                    <input type="checkbox" v-model="checksall" :value="index" @click="checks(index)">
                  </label>
                  <span>{{index+1}}</span>
                </td>
                <td>
                  <span>{{list.name}}</span>
                </td>
                <td>
                  <span>{{list.phone}}</span>
                </td>
                <td>
                  <span>{{list.role}}</span>
                </td>
                <td>
                  <span>{{list.time}}</span>
                </td>
                <td>
                  <a href="javascript:;" class="text-success" @click="amend(index)">修改</a>
                  |
                  <a href="javascript:;" class="text-danger" @click="delone(index)">删除</a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <page></page>
      </div>
    </div>
</template>

<script>
  import Pages from './page/page'
	export default {
		name: 'control',
    data(){
			return{
				role1:'超级管理员',
        role2:'版块管理员',
        role3:'模块管理员',
        checksall:[],
        check:false,
      }
    },
    components:{
			page:Pages
    },
    created(){
			this.$store.dispatch("userlist")
    },
    computed:{
    	userlist(){
    		let self=this;//从上面data的数据就知道下面是对他进行身份权限显示
    		let data=this.$store.getters.openlist;
    		let newdata=data.map((value)=>{
          if(value.role1==1){
          	value.role=self.role1;
          }else if(value.role1==2){
          	value.role=self.role2;
          }else {
            value.role=self.role3;
          }
    			return value;
        });
    		return newdata;
      },
    },
    methods:{
      checkall(){
        let self=this;
        if(self.check){
        	self.checksall=[];
        	self.check=false;
        }else {
        	self.check=true;
        	self.checksall=[];
        	self.userlist.forEach(function (item,index) {
            self.checksall.push(parseInt(index));
          })
        }
      },
      checks(i){
      	let self=this;
      	let ind=self.checksall.indexOf(i);
      	if(ind==-1){
      		self.checksall.push(i);
          self.checksall.sort((a,b)=>{
          	return a-b;
          })
        }else {
      		self.checksall.splice(ind,1)
        }
        self.detectionChecke();
      },
      detectionChecke(){
      	let self=this;
      	self.checksall.length!=self.userlist.length?self.check=false:self.check=true;
      },
    	delall(){
      	let self=this;
      	if(self.checksall<1){
      		alert("请选择")
        }else {
      		let id=[];
      		for(let i of self.checksall){
      			id.push(self.userlist[i].id)
          }
          let data=new URLSearchParams();
          data.append("id",id);
          self.$store.dispatch("alluserlist",data).then((data)=>{
          	if(data.ret=200){
              self.$store.commit("DEL_ALL_list",self.checksall);
              self.checksall=[];
            }
          })
        }

      },
      delone(i){
    		let self=this;
    		let ind=self.checksall.indexOf(i);
    		if(ind==-1){
    			alert("请选择")
        }else {
          let data=new URLSearchParams();
          let id=self.userlist[i].id;
          data.append("id",id);
          self.$store.dispatch("alluserlist",data).then((data)=>{
            if(data.ret==200){//如果成功，前端也数据删除
              self.$store.commit("DEL_ONE_list",i);
            }
          });
        }
      },
      addrole(){
      	let self=this;
      	let i='poprole';
        self.$store.commit("SHOW_BJ");
        self.$store.commit("SHOW_TC", i);
      }
    },
    mounted(){

    }
	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
.control
  .set
    height 60px
    line-height 65px
    margin-top 30px
    background #eee
    padding 0 0 0 30px
    font-size 16px
    margin-bottom 20px
  .infoList
    .search
      margin-bottom 10px
      label
        margin-right 30px
    .btns
      margin-bottom 20px
      a
        margin-left 20px
    .tabels
      table
        width 100%
        tr
          td,th
            text-align center
            line-height 50px
          th
            background #eee
          td
            border-bottom 1px solid #eee
        tr:last-child td
          border-bottom none
</style>
