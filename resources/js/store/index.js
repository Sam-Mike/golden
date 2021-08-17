import Vue from "vue";
import Vuex from "vuex";
import api from "../apis/api";
import auth from "./modules/auth";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        //global Data
        company:[],
        filesPath: "http://127.0.0.1:8000/"
    },
    mutations: {
        setGlobalData(state, data){
            state.company = data.company;
        }
    },
    actions: {
        async getGlobalData({commit}){
            const response = await api.get("globalData");
            commit("setGlobalData", response.data);
        }
    },
    modules: {
        auth
    }
});
