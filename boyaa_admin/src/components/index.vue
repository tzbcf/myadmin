<template>
    <div id="index" @click="hideInfo">
      <div class="header container">
        <div class="row">
          <div class="col-lg-2 pull-left">
            <h3>后台管理系统</h3>
          </div>
          <div class="col-lg-6 pull-right">
            <div class="col-lg-2 pull-right">
              <a href="javascript:;" @click="showInfo" class="a_btn">
                <img src="../assets/tx.jpg" alt="" width="30" height="30">
              </a>
              <div v-show="infoShow==true" class="infoShow">
                <ul>
                  <li><a href="javascript:;" @click="exit">退出</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 pull-right">你好! <span>{{username}}</span> </div>
            <div class="col-lg-2 pull-right">{{time}}</div>
          </div>
        </div>
      </div>
      <div class="main container">
        <div class="row">
          <div class="left_nav col-lg-2 pull-left">
            <div class="row">
              <div class="col-lg-12">
                <h3  @click="sub(1)" onselectstart="return false" >
                  <span class="glyphicon glyphicon-home"></span>
                  <i>推荐位管理</i>
                  <span class="glyphicon glyphicon-chevron-down"></span>
                </h3>
                <div class="subtitle" v-show="index==1">
                  <ul>
                    <li>
                      <router-link to="/" class="sub_a">首页</router-link>
                    </li>
                    <li>
                      <router-link to="/game" class="sub_a">游戏中心</router-link>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-12">
                <h3 @click="sub(2)" onselectstart="return false">
                  <span class="glyphicon glyphicon-stats"></span>
                  <i>投资者关系管理</i>
                  <span class="glyphicon glyphicon-chevron-down"></span>
                </h3>
                <div class="subtitle" v-show="index==2">
                  <ul>
                    <li>
                      <router-link to="/" class="sub_a">公告与通函</router-link>
                    </li>
                    <li>
                      <router-link to="/game" class="sub_a">财务报告</router-link>
                    </li>
                    <li>
                      <router-link to="/game" class="sub_a">演示材料</router-link>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-12">
                <h3  @click="sub(3)" onselectstart="return false">
                  <span class="glyphicon glyphicon-picture"></span>
                  <i>图文管理</i>
                  <span class="glyphicon glyphicon-chevron-down"></span>
                </h3>
                <div  class="subtitle" v-show="index==3">
                  <ul>
                    <li>
                      <router-link to="/" class="sub_a">新闻稿</router-link>
                    </li>
                    <li>
                      <router-link to="/game" class="sub_a">关于我们</router-link>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-12">
                <h3  @click="sub(4)" onselectstart="return false">
                  <span class="glyphicon glyphicon-list"></span>
                  <i>业务内容管理</i>
                  <span class="glyphicon glyphicon-chevron-down"></span>
                </h3>
                <div  class="subtitle" v-show="index==4">
                  <ul>
                    <li>
                      <router-link to="/" class="sub_a">博雅游戏</router-link>
                    </li>
                    <li>
                      <router-link to="/game" class="sub_a">博雅赛事</router-link>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-12">
                <h3  @click="sub(5)" onselectstart="return false">
                  <span class="glyphicon glyphicon-pencil"></span>
                  <i>数据统计</i>
                  <span class="glyphicon glyphicon-chevron-down"></span>
                </h3>
                <div  class="subtitle" v-show="index==5">
                  <ul>
                    <li>
                      <router-link to="/" class="sub_a">点击统计</router-link>
                    </li>
                    <li>
                      <router-link to="/game" class="sub_a">访问统计</router-link>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-12">
                <h3  @click="sub(6)" onselectstart="return false">
                  <span class="glyphicon glyphicon-cog"></span>
                  <i>系统设置</i>
                  <span class="glyphicon glyphicon-chevron-down"></span>
                </h3>
                <div  class="subtitle" v-show="index==6">
                  <ul>
                    <li>
                      <router-link to="/" class="sub_a">管理页设置</router-link>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="right_main col-lg-10  pull-right" :style="{width:screenWidth-280+'px'}">
            <router-view></router-view>
          </div>
        </div>
      </div>
      <div class="popup" v-show="popup==true">
        <pop :is="allpops"></pop>
      </div>
    </div>
</template>

<script>
  import popbanner from './pop/popbanner.vue'
  import popvedo from './pop/popvode.vue'
	export default {
		name: 'index',
    components:{
			popvedo,
      popbanner
    },
    data(){
			return{
				time:'',
        username:'',
        infoShow:false,
        index:Number,
        screenWidth: document.body.clientWidth,
      }
    },
    computed:{
      popup(){
        return this.$store.getters.openpopup;
      },
      allpops(){
        return this.$store.getters.openpops;
      }
    },
    methods:{
      showInfo(event){
      	this.infoShow==true?this.infoShow=false:this.infoShow=true;
        event.stopPropagation();
      },
      hideInfo(){
      	this.infoShow=false;
      },
      exit(){
//      	this.$router.push({path:''})
      },
      sub(i){
      	if(this.index!=i){
      		this.index=i;
        }else {
      		this.index=Number;
        }
      },
      listen(popup){
      	this.popup=popup[0];
      	this.pops=this.pop_components[popup[1]];
      }
    },
    mounted(){
      let self=this;
      let data=new Date();
      let y,mo,d,h,mi;
      y=data.getFullYear();
      mo=data.getMonth()+1;
      d=data.getDate();
      h=data.getHours();
      h<10?h="0"+h:h=h;
      mi=data.getMinutes();
      mi<10?mi="0"+mi:mi=mi;
      self.time=y+"-"+mo+"-"+d+" "+h+":"+mi;
      let myusername=window.localStorage.getItem("myusername");
      myusername==null?self.username='terrorblade':self.username=myusername;
      window.onresize = () => {
        return (() => {
          window.screenWidth = document.body.clientWidth
          self.screenWidth = window.screenWidth
        })()
      }
    },
	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
a:hover
  text-decoration none
#index
  height 100%
  .header
    position absolute
    top 0
    z-index 999
    background #242f42
    .row
      .col-lg-2
        h3
          margin 0
          line-height 50px
          color #fff
          font-size 22px
          text-align center
      .col-lg-6
        .col-lg-2
          color #fff
          height 50px
          line-height 50px
          text-align center
          .a_btn
            display inline-block
            width 30px
            height 30px
            margin-top 10px
            border-radius 100%
            overflow hidden
            position relative
            text-align left
            img
              position absolute
              top 0
              left 0
          .infoShow
            width 80px
            text-align center
            position relative
            left -25px
            top -10px
            ul
              background #fff
              box-shadow 0 2px 4px rgba(0,0,0,.12), 0 0 6px rgba(0,0,0,.12)
              line-height 30px
              padding 5px 0
              margin 0
              li
                width 100%
                margin 5px 0 0 0
                a
                  display block
                  line-height 30px
                a:hover
                  text-decoration none
                  background #eee
              li:first-child
                margin 0
        .col-lg-2:nth-child(1)
          text-align left

  .main
    height 100%
    padding-top 50px
    .row
      height 100%
      .left_nav
        width 240px
        background #324157
        height 100%
        .col-lg-12
          padding 0
          h3
            padding-left 15px
            font-size 18px
            margin 0
            cursor pointer
            span
              color #bfcbd9
              font-size 14px
              margin-right 5px
            i
              display inline-block
              width 155px
              vertical-align middle
              line-height 56px
              color #bfcbd9
          .subtitle
            ul
              width 100%
              background #1f2d3d
              li
                width 240px
                .sub_a
                  padding-left 25px
                  text-align center
                  line-height 50px
                  font-size 14px
                  color #bfcbd9
                .router-link-exact-active
                  color #42b983
      .right_main
        height 100%
        padding 0
        overflow hidden
  .popup
    width 100%
    height 100%
    position absolute
    top 0
    left 0
    overflow hidden
    background rgba(0,0,0,0.6)
    z-index 8888

</style>
