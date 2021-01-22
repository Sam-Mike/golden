<template>
  <div class="container-fluid">
    <div class="login-form mt-4">
      <div class="m-3">
        <!-- LOGO -->
        <a class="text-center" href="#">image goes here</a>

        <h1 class="my-4 text-center">Login</h1>
        <div class="form-panel">
          <form class="text-left" id="loginForm" @submit.prevent="handleLogin">
            <span class="text-danger" v-if="error.data"> {{ error.data }}</span>
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
      error: [],
    };
  },
  methods: {
    handleLogin() {
      this.$store
        .dispatch("auth/login", this.login)
        .then(() => {
          this.$router.push({ name: "allocations" }).catch((error) => {
            console.log(error);
          });
        })
        .catch((error) => {
          error.data = this.error;
        });
    },
  },
};
</script>