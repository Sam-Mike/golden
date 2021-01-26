export default {
    namespaced: true,
    state: {
        user: null,
        authStatus:false,
        error: null,
    },
    getters: {
        user: state => state.user,
        loggedIn: state => state.user !==null
    },
    mutations: {
        setUser(state, data) {
            state.user = data;
            //state.authStatus = true;
        },
        error(state, error){
            state.error = error
        }
    },
    actions: {
        login({ commit, getters}, user) {
            axios.get("/sanctum/csrf-cookie").then(() => {
                axios
                    .post("http://127.0.0.1:8000/api/login", {
                        email: user.email,
                        password: user.password
                    })
                    .then((response) => {
                        localStorage.setItem("auth", "true");
                        commit("setUser", response);
                        console.log("user is "+getters.user);
                        console.log("login status is "+getters.isloggedIn);
                    })
                    .catch((error) => commit("error", error));
            });
        },

        logout({ commit, state, getters}) {
            axios.get("/sanctum/csrf-cookie").then(() => {
                axios
                    .post("http://127.0.0.1:8000/api/logout")
                    .then((response) => {
                        localStorage.removeItem("auth");
                        commit("setUser", response);
                        console.log(getters.user);
                        console.log(state.authStatus);
                    })
                    .catch((error) => commit("error", error));
            });
        }
    },
};