<template>
  <div id="content">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'content'
}
</script>

<style lang="stylus" rel="stylesheet/stylus">
  html,body,#content
    height 100%
  h1, h2,h3,h4,h5,h6
    font-weight normal
  ul
    list-style-type none
    padding 0
  li
    display inline-block
    margin 0 10px
  a
    color #42b983
  .container
    width 100%
  i
    font-style normal
</style>
