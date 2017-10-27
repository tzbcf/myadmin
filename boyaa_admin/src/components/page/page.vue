<template>
    <div class="page container">
      <div class="row">
        <div class="col-lg-12">
          <a href="javascript:;" class="btn_begin">
            首页
          </a>
          <a href="javascript:;" class="btn_pre">
            上一页
          </a>
          <a href="javascript:;" class="btn_next">
            上一页
          </a>
          <a href="javascript:;" class="btn_end">
            尾页
          </a>
          <span class="sum">
            共{{}}记录
          </span>
          <div class="paging">
            <div>
              <span>{{}}</span>
              <ul>
                <li></li>
              </ul>
            </div>
            /{{}}页
          </div>
          <div class="paging">
            每页显示
            <div>
              <span>{{}}</span>
              <ul>
                <li></li>
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
				mas:'aa'
      }
    }
	}
</script>

<style lang="stylus" rel="stylesheet/stylus" scoped>

</style>
