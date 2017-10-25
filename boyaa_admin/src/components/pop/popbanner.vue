<template>
    <div class="popbanner col-lg-3 col-lg-offset-4">
      <h3>
        <span>上传banner图</span>
        <a href="javascript:;" class="close" @click="close">X</a>
      </h3>
      <div class="ftb_banner">
        <p class="reminder">
          <strong>banner图:</strong>
          <span class="text-danger">(建议尺寸1920*520像素，PNG,JPG格式)</span>
        </p>
        <form>
          <div>
            <p class="img_show" :style="{width:img_width+'px'}">
              <img :src="one_data.img_src" alt="" height="60" width="auto">
            </p>
            <p>
              <label>
                <input type="file" value="上传图片" @change="file()" ref="file">
              </label>
              <a href="javascript:;">删除</a>
            </p>
            <p>
              <strong>目标指向：</strong>
            </p>
            <p class="pl25">
              <label>
                    <span class="w90">
                      外部链接
                    </span>
                <input type="text" v-model="wb_link" >
              </label>
            </p>
            <div class="pl25">
              <p>
                <a href="javascript:;" class="w90">从资料库选择</a>
                <label>
                  <input type="radio" name="info" value="新闻">
                  <span>新闻</span>
                </label>
                <label>
                  <input type="radio" name="info" value="游戏">
                  <span>游戏</span>
                </label>
              </p>
              <div>
                <ul>
                  <li></li>
                </ul>
              </div>
            </div>
            <p class="pl25">
              <label>
                <span class="w90">说明:</span>
                <input type="text"  v-model="title" >
              </label>
            </p>
            <p class="b_btn text-center">
              <a href="javascript:;" @click="submit" class="btn btn-success" style="margin-right: 30px">提交</a>
              <a href="javascript:;" class="btn btn-warning" @click="close">取消</a>
            </p>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
	export default {
		name: 'popbanner',
    data(){
			return{
        img_src:'',
        img_width:120,
        banner_data:{},
        wb_link:'',
        title:'',
        Oneamend:false,
      }
    },
    computed: {
      one_data(){
        return this.$store.getters.openOneData;
      },
    },
    methods:{
      close(){//关闭弹窗
        this.wb_link='';
        this.title='';
        let i='';
        this.$store.commit("CLOSE");
        this.$store.commit("DELETE_CREATE_BJ");
        this.$store.commit("SHOW_TC",i);
      },
      file(){//获取图片base64码
        let files = this.$refs.file.files[0];
        let self=this;
        if(files){
          //读取图片数据
          let reader = new FileReader();
          reader.onload = function (e) {
          	self.img_src=e.target.result;
          	self.banner_data.img_src=e.target.result;
            let data = e.target.result;
            //加载图片获取图片真实宽度和高度
            let image = new Image();
            image.onload=function(){
              let width = image.width;
//              let height = image.height;
              self.img_width=width/60;
            };
            image.src= data;
          };
          reader.readAsDataURL(files);
        }else{
        	if(self.one_data==''){
            self.img_src='';
          }else {
            self.img_src=self.one_data.img_src;
          }
          self.banner_data.img_src=self.img_src;
        	self.Oneamend=true;//代表照片不是base64码
        }
      },
      submit(){//提交
      	let self=this;
        self.banner_data.link=self.wb_link;//获取input数据，存入data里面上传
        self.banner_data.banner_title=self.title;
        let data=new URLSearchParams();//上传能发送的格式，直接json对象不能发送
        data.append("link",self.wb_link);//数据存入这个格式中
        data.append("banner_title",self.banner_data.banner_title);
      	if(self.one_data==''){
          data.append("img_src",self.banner_data.img_src);
          self.$store.dispatch("setbanner",data).then((data)=>{
            if(data.ret==200){//如果成功，返回200，关闭弹窗
              self.banner_data.sort=data.data;
              self.$store.commit("PUSH_BANNER_DATA",self.banner_data);
              setTimeout(()=>{
                self.wb_link='';
                self.title="";
                self.close()
              },100)
            }
          });
        }else{
      		let amend=self.Oneamend.toString();
      		if(self.Oneamend==false){
      			self.banner_data.img_src=self.one_data.img_src;
          }
          self.banner_data.sort=self.one_data.sort;
      		data.append("create",amend);
      		data.append("sort",self.one_data.sort);
          data.append("img_src",self.banner_data.img_src);
          self.$store.dispatch("One_setbanner",data).then((data)=>{
      			if(data.ret==200){
              self.$store.commit("AMEND_DATA",self.banner_data);
              setTimeout(()=>{
                self.wb_link='';
                self.title="";
                self.close()
              },100)
            }
          })
        }
      }
    },
    mounted(){
    	let self=this;
    	self.wb_link=self.one_data.link;
    	self.title=self.one_data.banner_title;
    }
	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
.pl25
  padding-left 45px
.w90
  display inline-block
  width 90px

.popbanner
  margin-top 13%
  background #fff
  border-radius 4px
  padding 0
  h3
    background #eee
    margin 0
    line-height 45px
    font-size 20px
    padding-left 15px
    .close
      line-height 45px
      margin-right 15px
  .ftb_banner
    padding 20px 40px
    .img_show
      height 60px
      border 1px solid #eee
</style>
