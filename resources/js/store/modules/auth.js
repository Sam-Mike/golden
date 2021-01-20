export default {
    namespaced: true,
    state: {
        user: null
    },
    mutations: {
        setUser(state, data){
            state.user = data;
        },
    },
    actions: {
        handleLogin({commit }, user) {
            axios.get("/sanctum/csrf-cookie").then(() => {
                axios
                    .post("http://127.0.0.1:8000/api/login", {
                        email: user.email,
                        password: user.password
                    })
                    .then((response) => {
                        localStorage.setItem("auth", "true");
                        commit("setUser", response)
                    })
                    .catch((error) => this.error = error.response);
            });
        },
    },
};