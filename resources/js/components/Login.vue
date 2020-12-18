<template>
  <div class="container-fluid">
    <div class="login-form mt-4">
      <div class="m-3">
        <!-- LOGO -->
        <a class="text-center" href="#">image goes here</a>

        <h1 class="my-4 text-center">Login</h1>
        <div class="form-panel">
          <form class="text-left" id="loginForm" @submit.prevent="handleLogin">
            <span class="text-danger" v-if="errors">{{
              errors
            }}</span>
            <div class="field mt-3">
              <label for="username">Username or Email</label><br />
              <b-input
                size="sm"
                type="email"
                placeholder="username or email"
                v-model="login.email"
              ></b-input>
            </div>
            <div class="field mt-3">
              <label for="password">Password</label><br />
              <b-input
                size="sm"
                type="password"
                placeholder="username or email"
                v-model="login.password"
              ></b-input>
            </div>
            <div class="field mt-3">
              <b-button size="sm" variant="primary" type="submit"
                >Sign in</b-button
              >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      login: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    handleLogin() {
      axios.get("/sanctum/csrf-cookie").then((res) => {
        axios
          .post("http://127.0.0.1:8000/api/login", this.login)
          .then((response) => {
            this.$router.push({name:"Allocations"});
            console.log(response);
          })
          .catch((error) => (this.errors = error.response.data));
      });
    },
  },
};
</script>