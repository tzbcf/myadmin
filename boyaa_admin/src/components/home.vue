<template>
    <div class="home container">
      <div class="col-lg-12 headline">
        <span>推荐位管理</span>
        >
        <span>首页</span>
      </div>
      <div class="up_banner col-lg-12">
        <div class="border">
          <p class="text-success">banner图推荐</p>
          <p class="batch">
            <label>
              <input type="checkbox" v-model="checked" @click="checkedAll">
              <!--<span class="glyphicon glyphicon-ok">-->
              <!--</span>-->
            </label>
            <span class="">全选</span>
            <a href="javascript:;" class="btn btn-danger" @click="ALL_REMOVE">批量删除</a>
          </p>
          <div class="f_banner col-lg-12">
            <form action="">
              <table class="col-lg-12">
                <tr>
                  <th>序号</th>
                  <th>banner图</th>
                  <th>说明</th>
                  <th>排序</th>
                  <th>操作</th>
                </tr>
                <tr v-for="(banner,index) in data_banner">
                  <td>
                    <label >
                      <input type="checkbox" name='checkboxinput' v-model='checkboxModel' :value="index" @click="check(index)">
                      <!--<span class="glyphicon glyphicon-ok">-->
                      <!--</span>-->
                    </label>
                    <span>{{index+1}}</span>
                  </td>
                  <td>
                    <img :src="banner.img_src" alt="" width="170" height="auto">
                  </td>
                  <td>{{banner.banner_title}}</td>
                  <td>
                    <a href="javascript:;" class="rank" @click="asc(index)">
                      <span class="glyphicon glyphicon-circle-arrow-up"></span>
                    </a>
                    <a href="javascript:;" class="rank" @click="desc(index)">
                      <span class="glyphicon glyphicon-circle-arrow-down"></span>
                    </a>
                  </td>
                  <td>
                    <a href="javascript:;" class="text-success" @click="amend(index)">修改</a>
                    |
                    <a href="javascript:;" class="text-danger" @click="ONE_REMOVE(index)">删除</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
          <a href="javascript:;" class="added" @click="added">+新增图文</a>
        </div>
        <h1>{{popup}}</h1>
      </div>
    </div>
</template>

<script>

	export default {
    name: 'home',
    data(){
      return {
        checkboxModel: [],//根据这个数组与v-model实现全选与单选
        checked: false,//实现全选与单选按钮选中的状态
        ind:false,
      }
    },
    methods: {
      checkedAll(){
        let self = this;
        if (self.checked) {//实现反选
          self.checkboxModel = [];
          self.checked=false;
        } else {//实现全选
          self.checked=true;
          self.checkboxModel = [];
          self.data_banner.forEach(function (item,index) {
            self.checkboxModel.push(parseInt(index));
          });
        }

      },
      check(i){
        let self = this;
        let ind = self.checkboxModel.indexOf(i);//检测数组中是否存在这个单选！如果存在，表示选中状态。则改为不选中。如果不存在，则变为选中
        if (ind == -1) {//不存在，则变为选中
          self.checkboxModel.push(i)
          self.checkboxModel.sort((a,b)=>{
          	return a-b;
          });//解决删除会出现的Bug,如果不排序在用户不按顺序选中会出现删除非选中项，

        } else {//选中状态。则改为不选中
          self.checkboxModel.splice(ind, 1);
        }
        this.detectionChecke();
      },
      detectionChecke(){//如果其中一项不选中，则把全选按钮改为不选中状态
      	if(this.checkboxModel.length!=this.data_banner.length){this.checked=false}
      	else {this.checked=true}
      },
      ALL_REMOVE(){
      	let self=this;
        if(self.checkboxModel.length<1){
          alert("请选择")
        }else {
          self.$store.commit("ALL_REMOVE", self.checkboxModel)
        }
      },
      ONE_REMOVE(i){
      	let self=this;
        let indexof=self.checkboxModel.indexOf(i);
        console.log(self.checkboxModel);
        if(indexof==-1) {
        	alert("请选择")
        }else {
          self.$store.commit("ONE_REMOVE",indexof)
        }
      },
      added(){
      	let self=this;
        if(self.popup==false) {
          let i = 'popbanner';
          self.$store.commit("SHOW_BJ");
          self.$store.commit("SHOW_TC", i);
        }
      },
      amend(i){
        this.popup[0]=true;
        this.popup[1]=0;
        this.popup[2]=i;
        this.$emit('pop',this.popup);
        let i_data_banner=JSON.stringify(this.data_banner[i]);
        window.sessionStorage.setItem("i_data_banner",i_data_banner)
        window.sessionStorage.setItem("amend","true")
      },
      asc(i){
      	let self=this;
      	if(i!=0){
      		let i_banner=self.data_banner[i];
          self.data_banner.splice(i,1);
          self.data_banner.splice(i-1,0,i_banner)
          console.log(self.data_banner)
        }
      },
      desc(i){
      	let self=this;
      	let length=self.data_banner.length;
      	if(self!=length-1){
          let i_banner=self.data_banner[i];
          self.data_banner.splice(i,1);
          self.data_banner.splice(i+1,0,i_banner)
        }
      }
    },
    created(){
      this.$store.dispatch('getbanner');
    },
    computed: {
      data_banner(){
      	return this.$store.getters.opendata;
      },
      pops(){
        return this.$store.getters.openpops;
      },
      popup(){
        return this.$store.getters.openpopup
      }
    },
    mounted(){
//    	let self=this;
//      console.log(this.data_banner)
    }



	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
.sel_border
  margin 0 0 5px 0
  display inline-block
  width 18px
  height 18px
  border 1px solid #bfcbd9
  border-radius 4px
  box-shadow 0 0 1px #bfcbd9
  position relative
  vertical-align middle
  input
    position absolute
    top 0
    left 0
    opacity 0
  .glyphicon-ok
    background #fff
    display none
  .allshow
    display block
  .bro_show + span
    display block
.home
  height 100%
  padding 0
  overflow-y auto
  .col-lg-12
    padding 0
  .headline
    height 60px
    line-height 65px
    margin-top 30px
    padding 0 0 0 30px
    font-size 16px
    background #eee
    margin-bottom 20px
  .up_banner
    .border
      padding 20px 0
      margin 0 3px
      box-shadow 0 0 3px #999999
      .text-success,.batch,.added
        padding-left 20px
      .batch
        .btn
          margin-left 15px
      .f_banner
        margin-bottom 20px
        table
          th,td
            text-align center
          th
            line-height 40px
            background #eee
          td
            line-height 60px
            border-bottom  1px solid #ccc
            .rank
              color #242f42
              font-size 18px
              margin-right 5px
            .sort
              font-size 16px
              margin-left 5px
            img
              max-width 100%

  .popup
    .pop_banner
      z-index 99999
</style>
