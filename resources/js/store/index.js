import Vue from 'vue';
import Vuex from 'vuex';
import allocation from './modules/allocation';
import auth from './modules/auth';
import client from './modules/client';
import people from './modules/people';
import trailer from './modules/trailer';
import trip from './modules/trip';
import truck from './modules/truck';


Vue.use(Vuex);

export default new Vuex.Store({
    state: () => { },
    mutations: {},
    actions: {},
    modules: {
        allocation, auth, client, people, trailer, trip, truck
    },
});