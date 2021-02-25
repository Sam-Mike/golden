import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/auth";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        //trucks, trailers, people assigned and not assigned should be in store so as to be accessible to allocations
    },
    mutations: {},
    actions: {},
    modules: {
        auth
    }
});
