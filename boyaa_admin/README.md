# boyaa_admin

> A Vue.js project

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```

这是一个官网的后台系统！

前端使用vue+route+stylus+axios+bootstrap+vuex;

后台接口使用phalapi；

服务器：前端  nodejs    后台 php   Nginx

数据库使用的是mysql

完整使用需要设置Nginx配置文件！吧域名使用http://www.boyaa_api.com；跟目录指向框架目录，也可指向public入口目录，但是前端接口地接也相应得调整

如果后台nginx或apache目录和域名设置不一样，也可修改前端接口地址：修改config文件夹下的dev.env.js和prod.env.js！




技术介绍：
  目前已经开发完banner图的上传，所有的业务逻辑都在前端处理完，后台对接受和发送的数据进行处理！
  在逻辑业务处理时，遵循vue框架的开发者的提示，没有操作dom元素，即使因为bootstrap引入了jquery，也没有使用过！
  所有的业务处理都是以数据的处理，达到想要的效果！
  因为使用vue.cli，在很多逻辑处理时,牵扯到组件之间的数据传递，所以很多数据都在vuex中处理。组件接受数据进行渲染。其中一个组件修改数据，宁外一个组件会实时更新，或改变状态！
  现在正在开发系统设置，管理员权限设置数据库与前端已经完成处理，下一步对管理员组件中，搜索，新增，分页等进行开发！





  后期不断更新！后期不断更新！后期不断更新！重要事情说三篇！



For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
