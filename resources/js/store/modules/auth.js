import api from "../../apis/api"
export default {
    namespaced: true,
    state: {
        authenticated: false,
        user: null,
        loginError: null,
    },
    getters: {
        authenticated(state) {
            return state.authenticated
        },
        user(state) {
            return state.user
        },
        loginError(state){
            return state.loginError
        }
    },
    mutations: {
        setAuthenticated(state, value) {
            state.authenticated = value;
        },
        setUser(state, user) {
            state.user = user;
        },
        setError(state, error) {
            state.loginError = error
        }
    },
    actions: {
        async login({ dispatch, commit }, login) {
            try {
                await axios.get("/sanctum/csrf-cookie");
                await api.post("login", {
                    name: login.name,
                    password: login.password
                });
                return dispatch("getUserInfo");
            } catch (error) {
                commit("setError", error.response.data);
            }

        },
        async getUserInfo({commit}) {
            try {
                const response = await api.get("user");
                commit("setAuthenticated", true);
                commit("setUser", response.data);
            } catch (error) {
                console.log(error);
                commit("setAuthenticated", false);
                commit("setUser", null);
            }
        },

        async logout({dispatch}) {
            try {
                await api.post("logout");
                return dispatch("getUserInfo");
            } catch (error) {
                console.log(error)
            }
        }
    },
};