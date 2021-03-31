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
              <label for="username">Username</label><br />
              <b-input
                size="sm"
                type="text"
                placeholder="username"
                v-model="login.name"
              ></b-input>
            </div>
            <div class="field mt-3">
              <label for="password">Password</label><br />
              <b-input
                size="sm"
                type="password"
                placeholder="password"
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
        name: "",
        password: "",
      },
      error: [],
    };
  },
  computed: {},
  methods: {
    async handleLogin() {
      try {
        await this.$store.dispatch("auth/login", this.login);
        await this.$router.push({ path: "/" });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>