<template>
    <div class="poprole col-lg-4 col-lg-offset-4">
      <h3 class="title">
        <span>新增管理页</span>
        <a href="javascript:;" @click="close" class="close">X</a>
      </h3>
      <div class="role_form">
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
            <select name="" id="b_module"  @change="smodule" ref="opt">
              <option value="0">请选择</option>
              <option v-for="b in b_module" :value="b.sort">{{b.bmodule}}
              </option>
            </select>
            <select name="" id="s_module">
              <option value="0">请选择</option>
              <option v-for="s in s_module" value="s.pid" >{{s.smodule}}</option>
            </select>
          </label>
        </p>
      </div>
      <div class="btns">
        <a href="javascript:;" class="submit" onclick="console.log(a)">提交</a>
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
      });

    },
    methods:{
      close(){},
      smodule(){
      	let i=this.$refs.opt.value;
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
    padding 0
    border-radius 6px
    .title
      background #ccc
      margin 0
      padding 0 0 0 20px
      border-radius 6px 6px 0 0
      line-height 50px
      .close
        padding-right 20px
        line-height 50px
    .role_form
      padding 0 20px
      p
        label
          display block
          width 350px
          margin 0 auto
          span
            display inline-block
            width 100px
      p:nth-child(3)
        span
          letter-spacing 3px
      p:nth-child(4)
        span
          letter-spacing 3px
    .btns
      text-align center
</style>
