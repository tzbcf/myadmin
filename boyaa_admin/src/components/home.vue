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
                    <span>{{banner.sort}}</span>
                  </td>
                  <td>
                    <img :src="banner.img_src" alt="" width="auto" height="50">
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
        <h1>{{one_data}}</h1>
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
      ALL_REMOVE(){//全部删除
      	let self=this;
        if(self.checkboxModel.length<1){//没有选择时弹窗提示选择
          alert("请选择")
        }else {
        	let sort=[];//根据sort排序删除
        	for(let i of self.checkboxModel){
        		sort.push(self.data_banner[i].sort)
          }
          let data=new URLSearchParams();
          data.append("sort",sort);
        	self.$store.dispatch("allremove",data).then((data)=>{
        		if(data.ret==200){//如果成功，前端也数据删除
              self.$store.commit("ALL_REMOVE", self.checkboxModel);
              self.checkboxModel=[];
            }
          });
        }
      },
      ONE_REMOVE(i){
      	let self=this;
        let indexof=self.checkboxModel.indexOf(i);
        if(indexof==-1) {
        	alert("请选择")
        }else {
          let data=new URLSearchParams();
          let sort=self.data_banner[i].sort;
          data.append("sort",sort);
          self.$store.dispatch("allremove",data).then((data)=>{
            if(data.ret==200){//如果成功，前端也数据删除
              self.checkboxModel.splice(indexof,1);
              self.$store.commit("ONE_REMOVE",i);
            }
          });

        }
      },
      added(){//增加一条数据
      	let self=this;
        let i = 'popbanner';
        self.$store.commit("SHOW_BJ");
        self.$store.commit("SHOW_TC", i);
      },
      amend(i){//修改一条数据
        let self=this;
        let m = 'popbanner';
        self.$store.commit("SHOW_BJ");
        self.$store.commit("SHOW_TC",m);
        self.$store.commit("SHOW_CREATE_BJ",i);
      },
      asc(i){
      	let self=this;
      	if(i!=0){
      		let m=[];
      	  m[0]=parseInt(self.data_banner[i].sort);
          m[1]=parseInt(self.data_banner[i-1].sort);
          let data=new URLSearchParams;
          let o=m.toString();
          data.append("asc",o);
          self.$store.dispatch("ASC_banner",data).then((data)=>{
          	if(data.ret==200){
          		self.$store.commit("ASC_DATA",i)
            }
          })
        }
      },
      desc(i){
      	let self=this;
      	let length=self.data_banner.length;
      	if(self<length-1){
          let m=[];
          m[0]=parseInt(self.data_banner[i].sort);
          m[1]=parseInt(self.data_banner[i+1].sort);
          let data=new URLSearchParams;
          let o=m.toString();
          data.append("dsc",o);
          self.$store.dispatch("ASC_banner",data).then((data)=>{
            if(data.ret==200){
              self.$store.commit("ASC_DATA",i)
            }
          })
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
      },
      one_data(){
        return this.$store.getters.openOneData;
      },
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
