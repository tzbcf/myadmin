<template>
    <div class="control container">
      <div class="row">
        <div class="col-lg-12">
          <span>系统设置</span>
          >
          <span>管理员设置</span>
        </div>
      </div>
      <div class="row">
        <div class="infoList col-lg-12">
          <div class="">
            <label>
              <span>工号：</span>
              <input type="text">
            </label>
            <label>
              <span>管理员姓名：</span>
              <input type="text">
            </label>
          </div>
          <div>
            <label>
              <input type="checkbox">
              <span>全选</span>
            </label>
            <a href="javascript:;" class="btn">批量删除</a>
            <a href="javascript:;" class="btn">+新增管理员</a>
          </div>
          <div>
            <table>
              <tr>
                <th>序号</th>
                <th>姓名</th>
                <th>手机号码</th>
                <th>权限</th>
                <th>最后登录时间</th>
                <th>操作</th>
              </tr>
              <tr>
                <td>
                  <label>
                    <input type="checkbox">
                  </label>
                  <span></span>
                </td>
                <td>
                  <span></span>
                </td>
                <td>
                  <span></span>
                </td>
                <td>
                  <span></span>
                </td>
                <td>
                  <span></span>
                </td>
                <td>
                  <a href="javascript:;" class="text-success" @click="">修改</a>
                  |
                  <a href="javascript:;" class="text-danger" @click="">删除</a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
	export default {
		name: 'control'
	}
</script>

<style scoped>

</style>
