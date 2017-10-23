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
            <a href="javascript:;" class="btn btn-danger" @click="batchRemove">批量删除</a>
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
                      <input type="checkbox" name='checkboxinput' v-model='checkboxModel' :value="banner.sort" @click="check(index+1)">
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
                    <a href="javascript:;" class="text-danger" @click="unit(index)">删除</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
          <a href="javascript:;" class="added" @click="added(0)">+新增图文</a>
        </div>
        <h1>{{bb}}</h1>
      </div>
    </div>
</template>

<script>
  import Share from '../state/state'
	export default {
    name: 'home',
    data(){
      return {
        data_banner: [],//axios获取的数据！每条数据带一个单选！每条数据中存在对应id
        checkboxModel: [],//根据这个数组与v-model实现全选与单选
        checked: false,//实现全选与单选按钮选中的状态
        popup:[false,2,''],
        bb:''
      }
    },
    methods: {
      checkedAll(){
        let _this = this;
        if (_this.checked) {//实现反选
          _this.checkboxModel = [];
        } else {//实现全选
          _this.checked=true;
          _this.checkboxModel = [];
          _this.data_banner.forEach(function (item) {

            _this.checkboxModel.push(parseInt(item.sort));
          });
        }

      },
      check(i){
        let self = this;
        let ind = self.checkboxModel.indexOf(i);//检测数组中是否存在这个单选！如果存在，表示选中状态。则改为不选中。如果不存在，则变为选中
        if (ind == -1) {//不存在，则变为选中
          self.checkboxModel.push(i)
        } else {//选中状态。则改为不选中
          self.checkboxModel.splice(ind, 1);
        }
        this.detectionChecke();
      },
      detectionChecke(){//如果其中一项不选中，则把全选按钮改为不选中状态
      	if(this.checkboxModel.length!=this.data_banner.length){this.checked=false}
      	else {this.checked=true}
      },
      added(){
      	this.popup[0]=true;
        this.popup[1]=0;
        this.popup[2]='';
      	this.$emit('pop',this.popup);
        window.sessionStorage.setItem("amend","false")
      },
      batchRemove(){
      	let self=this;
        for(let i=0;i<self.checkboxModel.length;i++){
          self.data_banner.splice(self.checkboxModel[i]-1-i,1)
        }
      },
      unit(index){
      	this.data_banner.splice(index,1);
      	let obj={};
      	obj.sort=index;
        this.$http({
          method:'get',
          url:'http://www.boyaa_api.com/Public/?service=User.deletebanner',
          params:obj,
        }).then((response)=> {
          if(response.data.ret==200){
            console.log(response.data.data)
          }
        });
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
    mounted(){
    	let self=this;
    	setInterval(()=>{
        console.log(self.state.b);
        console.log(self.stateDate.a)
      },5000);
      this.bb=this.state.b;
      this.$http({
        method:'get',
        url:'http://www.boyaa_api.com/Public/?service=User.getbanner'}).then((response)=> {
        if(response.data.ret==200){
        	self.data_banner=response.data.data;
        }
      });
      Share.$on("banner_data",function (i) {
      	if(self.popup[2]==''){
      		let length=self.data_banner.length;
          i.sort=parseInt(self.data_banner[length-1].sort)+1;
          console.log(i.sort);
          self.data_banner.push(i);
        }else {
      		self.data_banner[i]=i;
        }
      })
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
