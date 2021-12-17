<template>
  <div class="container-fluid">
    <div class="login-form mt-4">
      <div class="m-2">
        <!-- LOGO -->
        <div class="text-center">
          <img src="/img/copy.ico"  />
        </div>
        <h3 class="my-12 text-center">Login</h3>
        <div class="form-panel">
          <form class="text-left" id="loginForm" @submit.prevent="handleLogin">
            <span class="text-danger" v-if="loginError"> {{ loginError[0] }}</span>
            <div class="field mt-2">
              <label for="username">Username</label><br />
              <b-input
                size="sm"
                type="text"
                placeholder="username"
                v-model="credentials.name"
              ></b-input>
            </div>
            <div class="field mt-2">
              <label for="password">Password</label><br />
              <b-input
                size="sm"
                type="password"
                placeholder="password"
                v-model="credentials.password"
              ></b-input>
            </div>
            <div class="field mt-1">
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
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {
      credentials: {
        name: "",
        password: "",
      },
    };
  },
  computed: {
    ...mapGetters({
      user: "auth/user",
      loginError: "auth/loginError",
    }),
  },
  methods: {
    ...mapActions({
      login: "auth/login",
    }),
    async handleLogin() {
      try {
        await this.login(this.credentials);
        switch (this.user.role_id) {
          case 1:
            await this.$router.push({ path: "/users" });
            break;
          case 2:
            await this.$router.push({ path: "/people" });
            break;
          case 3:
            await this.$router.push({ path: "/" });
            break;
          case 4:
            await this.$router.push({ path: "/expenses" });
            break;
        }
        //await this.$router.push({ path: "/" });
      } catch (error) {}
    },
  },
};
</script>