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

#完整使用需要设置Nginx配置文件！吧域名使用[http://www.boyaa_api.com]；跟目录指向框架目录，也可指向public入口目录，但是前端接口地接也相应得调整

同时需要把sql数据库文件导入mysql中，对phalapi里面Config里面的dbs.php进行设置,如果数据库是本地的，且端口是3306  账号和密码都是root就不需要进行修改

因为后台系统真正的逻辑功能就是对数据进行处理，所以没有数据的话很多功能也无法实现！没有使用假数据！所以要想成功后台php的设置非常重要

如果你也和我一样是个初级全栈天才！那么你把这个项目跑通应该很简单！

如果后台nginx或apache目录和域名设置不一样，也可修改前端接口地址：修改config文件夹下的dev.env.js和prod.env.js！

<img src="./static/1.bmp" />
<img src="./static/2.bmp" />
<img src="./static/3.bmp" />
怎么在git介绍上显示图片呢。。。

技术介绍：
  目前已经开发完首页(因为开发过程中，懒得登录，所以功能被注释掉了！你会的话可以打开，跑通，#还有个重要的功能就是，通过路径直接进入系统还没开发，用户身份设置了身份令牌，后期调试会进行开发！)、banner图的上传，所有的业务逻辑都在前端处理完，后台对接受和发送的数据进行处理！
  在逻辑业务处理时，遵循vue框架的开发者的提示，没有操作dom元素，即使因为bootstrap引入了jquery，也没有使用过！
  所有的业务处理都是以数据的处理，达到想要的效果！
  因为使用vue.cli，在很多逻辑处理时,牵扯到组件之间的数据传递，所以很多数据都在vuex中处理。组件接受数据进行渲染。其中一个组件修改数据，宁外一个组件会实时更新，或改变状态！
  现在正在开发系统设置，管理员权限设置数据库与前端已经完成处理，下一步对管理员组件中，搜索，新增，分页等进行开发！


  后期不断更新！后期不断更新！后期不断更新！重要事情说三篇！

  进来了就点下右上角的*星星*star吧！赠人玫瑰，手有余香！您的star是对我后续开发最大的鼓励！thank you!

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
