import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/components/login'
import Index from '@/components/index'
import Home from '@/components/home'
import Control from '@/components/control'
Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path:'/',
      name:"index",
      component:Index,
      children:[
        {
          path:'/',
          name:'home',
          component:Home,
        },
        {
          path:'/control',
          name:'Control',
          component:Control,
        }
      ]
    }
  ]
})
