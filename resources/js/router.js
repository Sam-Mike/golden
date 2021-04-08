import Vue from "vue";
import VueRouter from "vue-router";
import Clients from './components/Clients';
import People from './components/People';
import Trailers from './components/Trailers';
import Trucks from './components/Trucks';
import Allocations from './components/Allocations';
import Trips from './components/Trips';
import Claims from './components/Claims';
import Login from './components/Login';
import Users from './components/Users';
import store from "./store";

Vue.use(VueRouter);

const routes = [
  {
    path: '/login',
    component: Login,
    name: 'login',
  },
  {
    path: '/',
    component: Allocations,
    name: 'allocations',
    meta: { requiresAuth: true }
  },
  {
    path: '/clients',
    component: Clients,
    name: 'clients',
    meta: { requiresAuth: true }
  },
  {
    path: '/people',
    component: People,
    name: 'people',
    meta: { requiresAuth: true }
  },
  {
    path: '/trailers',
    component: Trailers,
    name: 'trailers',
    meta: { requiresAuth: true }
  },
  {
    path: '/trucks',
    component: Trucks,
    name: 'trucks',
    meta: { requiresAuth: true }
  },
  {
    path: '/trips',
    component: Trips,
    name: 'trips',
    meta: { requiresAuth: true }
  },
  {
    path: '/claims',
    component: Claims,
    name: 'claims',
    meta: { requiresAuth: true }
  },
  {
    path: '/users',
    component: Users,
    name: 'users',
    meta: { requiresAuth: true }
  }
]

const router = new VueRouter({
  //mode: "history",
  base: process.env.BASE_URL,
  routes
});

function authStatus(){
  return store.getters["auth/authenticated"]
};
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!authStatus()) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } else {
    next() // make sure to always call next()!
  }
})

export default router;
