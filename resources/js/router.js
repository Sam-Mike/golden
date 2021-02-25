import Vue from "vue";
import VueRouter from "vue-router";
import Clients from './components/Clients';
import People from './components/People';
import Trailers from './components/Trailers';
import Trucks from './components/Trucks';
import Allocations from './components/Allocations';
import Trips from './components/Trips';
import Login from './components/Login';
import Users from './components/Users';
//import store from "./store";
import { mapState } from "vuex";

Vue.use(VueRouter);

const routes = [
  {
    path: '/login',
    component: Login,
    name: 'login',
    meta: { guestOnly: true },
    //can use BEFORE ENTER here to check the roles or the username
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

const authState = {
  ...mapState(["authenticated", "user"])
}

// router.beforeEach((to, from, next) => {
//   if (to.matched.some(record => record.meta.requiresAuth)) {
//     // this route requires auth, check if logged in
//     // if not, redirect to login page.
//     if (!authState.authenticated) {
//       next({
//         path: '/login',
//         query: { redirect: to.fullPath }
//       })
//     } else {
//       next()
//     }
//   } else {
//     next() // make sure to always call next()!
//   }
// })

export default router;

