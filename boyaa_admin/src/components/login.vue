<template>
  <div id="login" class="container">
    <div class="row">
      <div class="col-lg-4 col-lg-offset-4 reg">
        <h3 class="title">后台管理系统</h3>
        <div class="form col-lg-6 col-lg-offset-3">
          <form action="" class="form-horizontal" role="form">
            <div class="form-group  ring">
              <div class="col-lg-10 col-lg-offset-1">
                <input class="form-control" id="username" type="text"  placeholder="username" v-on:focus="fnFocus('username')" v-on:blur="fnBlur('username')" ref="user" v-on:input="fnInput('username')">
              </div>
              <div class="col-lg-10 col-lg-offset-1 hint">
                <transition name="hint-user">
                  <span v-show="user==true">请输入用户名</span>
                </transition>
              </div>
            </div>
            <div class="form-group  ring">
              <div class="col-lg-10 col-lg-offset-1">
                <input type="password" class="form-control" id="password" placeholder="password" v-on:focus="fnFocus('password')" v-on:blur="fnBlur('password')" ref="pass"  v-on:input="fnInput('password')">
              </div>
              <div class="col-lg-10 col-lg-offset-1 hint">
                <transition name="hint-pass">
                  <span v-show="pass">请输入密码</span>
                </transition>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-4 col-lg-2">
                <button type="button" class="btn btn-default" v-on:click="login">登录</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'login',
  data () {
    return {
      msg: '',
      user:false,
      pass:false,
    }
  },
  methods:{
  	fnFocus(i){
  		if(i=='username'){
        let val=this.$refs.user.value;
        if(val==''){
          this.user=true;
        }else{
          this.user=false;
        }
      }
      if(i=='password'){
        let val=this.$refs.pass.value;
        if(val==''){
          this.pass=true;
        }else{
          this.pass=false;
        }
      }
    },
    fnBlur(i){
      if(i=='username'){
      	let val=this.$refs.user.value;
      	if(val==null){
          this.user=true;
        }else{
          this.user=false;
        }
      }
      if(i=='password'){
        let val=this.$refs.pass.value;
        if(val==null){
          this.pass=true;
        }else{
          this.pass=false;
        }
      }
    },
    fnInput(i){
    	if(i=='username'){
        let val=this.$refs.user.value;
        if(val==null){
          this.user=true;
        }else {
          this.user = false;
        }
      }
      if(i=='password'){
        let val=this.$refs.pass.value;
        if(val==null){
          this.pass=true;
        }else {
          this.pass = false;
        }
      }
    },
    login(){
    	let dataobj=new Object;
    	  dataobj.username=this.$refs.user.value;
        dataobj.password=this.$refs.pass.value;
      this.$http({
        method:'post',
        url:'http://www.boyaa_api.com/Public/?service=User.userlogin',
        params:dataobj
      }).then((response) => {
        if(response.data.ret==200){
        	if(response.data.data.username==dataobj.username){
        		let myusername=response.data.data.username
        		window.localStorage.setItem("myusername",myusername);
            this.$router.push({path:'/index'});
          }
        }
      })
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="stylus" rel="stylesheet/stylus" scoped>
.hint-user-enter-active
  transition opacity 1s ease
  opacity 1
.hint-user-leave-active
  transition opacity .5s ease
  opacity 0
.hint-user-enter
  opacity 0
.hint-user-leave
  opacity 1
.hint-pass-enter-active
  transition opacity 1s ease
  opacity 1
.hint-pass-leave-active
  transition opacity .5s ease
  opacity 0
.hint-pass-enter
  opacity 0
.hint-pass-leave
  opacity 1
#login
  width 100%
  height 100%
  background-color #324157
  position relative
  .reg
    position absolute
    bottom 50%
    .title
      text-align center
      margin-bottom 40px
      color #fff
      font-size 28px
    .form
      background-color #fff
      border-radius 5px
      padding 25px 0 15px 0
      .ring
        padding-bottom 15px
        margin-bottom 10px
        position relative
        .form-control:focus
          border-color #ff4949
      .btn
        outline none
        margin-left 15px
      .hint
        color #ff4949
        position absolute
        bottom -5px
</style>
