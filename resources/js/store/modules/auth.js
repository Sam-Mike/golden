export default {
    namespaced: true,
    state: {
        error: null,
    },
    mutations: {
        error(state, error) {
            state.error = error
        }
    },
    actions: {
        login({ commit }, user) {
            axios.get("/sanctum/csrf-cookie").then(() => {
                axios
                    .post("http://127.0.0.1:8000/api/login", {
                        email: user.email,
                        password: user.password
                    })
                    .then((response) => {
                        localStorage.setItem("authStatus", "true");
                        localStorage.setItem("user", JSON.stringify(response.data.name));
                        console.log("user is " + getters.currrentUser);
                        console.log("login status is " + getters.isloggedIn);
                    })
                    .catch((error) => commit("error", error));
            });
        },
        // getUserInfo(commit, state) {
        //     axios
        //         .get("http://127.0.0.1:8000/api/user")
        //         .then((response) => {
        //             commit("setUser", response.date);
        //         })
        //         .catch((error) => (this.error = error.response));
        // },

        logout() {
            axios.get("/sanctum/csrf-cookie").then(() => {
                axios
                    .post("http://127.0.0.1:8000/api/logout")
                    .then(() => {
                        localStorage.removeItem("authStatus");
                        localStorage.removeItem("user");
                    })
                    .catch((error) => commit("error", error));
            });
        }
    },
};