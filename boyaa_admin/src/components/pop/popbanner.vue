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
              <img :src="img_src" alt="" height="60" width="auto">
            </p>
            <p>
              <label>
                <input type="file" value="上传图片" @change="file" ref="file">
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
                <input type="text" ref="sans_link" @blur="val(1)" :value="i_data_banner.link">
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
                <input type="text" @blur="val(2)" ref="state" :value="i_data_banner.banner_title">
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
  import Share from '../../state/state'
	export default {
		name: 'popbanner',
    data(){
			return{
        popup:[false,'',''],
        img_src:'',
        img_width:120,
        banner_data:{},
        i_data_banner:{}
      }
    },

    methods:{
      close(){
        this.popup[0]=false;
        this.popup[1]='';
        this.$emit('pop',this.popup);
      },
      file(){
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
          self.img_src=''
        }
      },
      val(i){
        let self=this;
      	if(i==1){
          let a=self.$refs.sans_link.value;
          self.banner_data.link=a;
        }
        if(i==2){
          let a=self.$refs.state.value;
          self.banner_data.banner_title=a;
        }
      },
      submit(){
      	let self=this;
      	if(self.popup[2]==''){
          Share.$emit("banner_data",self.banner_data);
          this.$http({
            method:"get",
            url:"http://www.boyaa_api.com/Public/?service=User.setbanner",
            params:self.banner_data,
          }).then((response)=>{
//      		console.log(response.data.data)
          })
        }else {
          Share.$emit("banner_data",self.banner_data);
          this.$http({
            method:"get",
            url:"",
            params:self.banner_data,
          }).then((response)=>{
//      		console.log(response.data.data)
          })
        }
        self.close()
      }
    },
    mounted(){
    	let self=this;
    	let amend=window.sessionStorage.getItem("amend");
    	console.log(amend,typeof (amend),1);
    	if(amend=='true'){
        let i_data_banner=window.sessionStorage.getItem("i_data_banner");
        self.i_data_banner=JSON.parse(i_data_banner);
        self.img_src=self.i_data_banner.img_src;
      }else {
        self.img_src='';
        self.i_data_banner={};
      }
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
