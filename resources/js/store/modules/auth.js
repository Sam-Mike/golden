import api from "../../apis/api"
export default {
    namespaced: true,
    state: {
        authenticated: false,
        user: null,
        error: null,
    },
    getters: {
        authenticated(state) {
            return state.authenticated
        },
        user(state) {
            return state.user
        }
    },
    mutations: {
        setAuthenticated(state, value) {
            state.authenticated = value;
        },
        setUser(state, user) {
            state.user = user;
        },
        error(state, error) {
            state.error = error
        }
    },
    actions: {
        async login({ dispatch }, login) {
            try {
                await axios.get("/sanctum/csrf-cookie");
                const response = await api.post("login", {
                    email: login.email,
                    password: login.password
                });
                return dispatch("getUserInfo");

            } catch (error) {
                console.log(error)
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