<template>
    <div class="poprole col-lg-4 col-lg-offset-4">
      <h3>
        <span>新增管理页</span>
        <a href="javascript:;" @click="close">X</a>
      </h3>
      <div>
        <p>
          <label>
            <span>新增管理员：</span>
            <input type="text">
          </label>
        </p>
        <p>
          <label>
            <span>管理员工号：</span>
            <input type="text">
          </label>
        </p>
        <p>
          <label>
            <span>电话号码：</span>
            <input type="text">
          </label>
        </p>
        <p>
          <label>
            <span>角色设置：</span>
            <select name="" id="b_module">
              <option value="0">请选择</option>
              <option v-for="b in b_module" value="b.sort" @change="smodule">{{b.bmodule}}
              </option>
            </select>
            <select name="" id="s_module">
              <option value="0">请选择</option>
              <option v-for="s in s_module" value="s.pid" >{{s.smodule}}</option>
            </select>
          </label>
        </p>
      </div>
    </div>
</template>

<script>
	export default {
		name: 'poprole',
    data(){
			return{
        b_module:[],
        s_module:[]
      }
    },
    created(){
    	let self=this;
      self.$store.dispatch("bmodule").then((data)=>{
      	if(data.ret==200){
          self.b_module=data.data;
        }
      })
    },
    methods:{
      close(){},
      smodule(i){
      	alert(1);
      	let self=this;
        let data=new URLSearchParams;
        data.append("sort",i);
        self.$store.dispatch("smodule",data).then((data)=>{
        	if(data.ret==200){
        		self.s_module=data.data;
          }
        })
      },
    }
	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
  .poprole
    background #fff
    margin-top 15%
</style>
