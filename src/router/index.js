import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Moderation from '../views/moderation.vue'
import Enter from '../views/enter'
import Login from '../views/login'
import Register from '../views/register'


Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/moderation',
    name: 'Moderation',
    component: Moderation
  },
  {
    path: '/',
    name: 'Enter',
    component: Enter
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
