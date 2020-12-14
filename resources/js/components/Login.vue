<template>
  <div class="container-sm border rounded justify-center align-items-center">
    <h3 class="">Login</h3>
    <div class="">
      <form ref="form" @submit.stop.prevent="loginUser">
        <div class="">
            <div class="">
              <b-input
                type="email"
                size="sm"
                placeholder="username or email"
              ></b-input>
              <div class=""></div>
            </div>
            <div class="">
              <b-input
                type="password"
                size="sm"
                placeholder="password"
              ></b-input>
            </div>
          <div class="">
            <b-button size="sm" variant="primary" class="" disabled="" type="submit">
              <div class="">Log In</div>
            </b-button>
          </div>
        </div>
        <a class="_2Lks6" href="/accounts/password/reset/" tabindex="0"
          >Forgot password?</a
        >
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      login: {
        username: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    loginUser() {
      axios.post().then().catch();
    },
  },
};
</script>