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
import store from "./store";

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

function auth() {
  return sessionStorage.getItem("authStatus");
}



export default router;

