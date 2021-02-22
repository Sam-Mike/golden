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
        login({ commit }, login) {
            axios.get("/sanctum/csrf-cookie").then(() => {
                api
                    .post("login", {
                        email: login.email,
                        password: login.password
                    })
                    .then((response) => {
                        sessionStorage.setItem("authStatus", "true");
                        sessionStorage.setItem("user", JSON.stringify(response.data.name));
                        console.log("user is " + getters.currrentUser);
                        console.log("login status is " + getters.isloggedIn);
                    })
                    .catch((error) => commit("error", error));
            });
        },
        // getUserInfo(commit, state) {
        //     api
        //         .get("user")
        //         .then((response) => {
        //             commit("setUser", response.date);
        //         })
        //         .catch((error) => (this.error = error.response));
        // },

        logout() {
            axios.get("/sanctum/csrf-cookie").then(() => {
                api
                    .post("logout")
                    .then(() => {
                        sessionStorage.removeItem("authStatus");
                        sessionStorage.removeItem("user");
                    })
                    .catch((error) => commit("error", error));
            });
        }
    },
};