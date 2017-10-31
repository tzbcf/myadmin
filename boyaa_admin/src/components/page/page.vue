<template>
    <div class="page container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <a href="javascript:;" class="btn_begin col-lg-1">
            首页
          </a>
          <a href="javascript:;" class="btn_pre col-lg-1">
            上一页
          </a>
          <a href="javascript:;" class="btn_next col-lg-1">
            上一页
          </a>
          <a href="javascript:;" class="btn_end col-lg-1">
            尾页
          </a>
          <span class="sum col-lg-1">
            共{{pages.over_l}}记录
          </span>
          <div class="paging col-lg-2">
            <div>
              <a href="javascript:;" class="btn">{{cout}}</a>
              <ul>
                <li v-for="i in pages.pages">
                  <a href="javascript:;">{{i}}</a>
                </li>
              </ul>
            </div>
            /{{pages.pages}}页
          </div>
          <div class="paging col-lg-2">
            每页显示
            <div>
              <a href="javascript:;" class="btn">{{msg}}</a>
              <ul>
                <li>
                  <a href="javascript:;">1</a>
                </li>
                <li>
                  <a href="javascript:;">5</a>
                </li>
                <li>
                  <a href="javascript:;">10</a>
                </li>
              </ul>
            </div>
            条
          </div>
        </div>
      </div>
    </div>
</template>

<script>
	export default {
		name: 'page',
    data(){
			return{
				cout:1,
        msg:1,
      }
    },
    computed:{
    	pages(){
    		return this.$store.getters.openpage
      }
    }
	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>
a:hover,a:focus
  text-decoration none
.page
  .row
    width 100%
    .col-lg-1,.col-lg-2
      text-align center
      padding 0
  div
    display inline-block
  .paging
    div
      position relative
      width 50px
      .btn
        display block
        text-align left
        padding 0 0 0 10px
        border-radius 4px
        border 1px solid #eee
        line-height 20px
        vertical-align bottom
      .btn:after
        content ""
        border 4px solid transparent
        border-top 3px solid #fff
        position absolute
        top 8px
        right 6px
      .btn:before
        content ""
        border 6px solid transparent
        border-top 5px solid #333
        position absolute
        top 8px
        right 4px
      ul
        position absolute
        display block
        width 100%
        padding 5px 0
        border 1px solid #eee
        border-top none
        top 20px
        li
          display block
          margin 0
          text-align left
          a
            display block
            line-height 20px
            text-align left
            padding 0 0 0 10px
          a:hover
            background #eee
</style>
