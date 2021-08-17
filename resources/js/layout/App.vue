<template>
  <!-- v if on user login then show the dashboard -->
  <div>
    <div id="wrapper">
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <div class="fixed-top d-flex flex-column">
            <nav
              v-if="authenticated"
              class="navbar navbar-expand-lg navbar-dark bg-dark"
            >
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li v-if="user.role_id === 1" class="nav-item">
                    <router-link class="nav-link" to="/">Home</router-link>
                  </li>
                  <li
                    v-if="user.role_id === 1 || user.role_id === 3"
                    class="nav-item dropdown"
                  >
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Operations
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <router-link class="dropdown-item" to="/">
                        Allocations
                      </router-link>
                      <router-link class="dropdown-item" to="/trips"
                        >Trips
                      </router-link>

                      <div class="dropdown-divider"></div>
                      <router-link class="dropdown-item" to="/clients"
                        >Clients</router-link
                      >
                      <router-link class="dropdown-item" to="/claims"
                        >Claims</router-link
                      >
                    </div>
                  </li>
                  <li
                    v-if="user.role_id === 1 || user.role_id === 3"
                    class="nav-item dropdown"
                  >
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Trucks
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <router-link class="dropdown-item" to="/trucks"
                        >All Trucks</router-link
                      >
                    </div>
                  </li>
                  <li
                    v-if="user.role_id === 1 || user.role_id === 3"
                    class="nav-item"
                  >
                    <router-link class="nav-link" to="/trailers"
                      >Trailers</router-link
                    >
                  </li>
                  <li
                    v-if="user.role_id === 1 || user.role_id === 2"
                    class="nav-item dropdown"
                  >
                    <a
                      class="nav-link dropdown-toggle"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      HR
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <router-link class="dropdown-item" to="/people"
                        >People</router-link
                      >
                    </div>
                  </li>
                  <li v-if="user.role_id === 1" class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <router-link class="dropdown-item" to="/users"
                        >Users</router-link
                      >
                    </div>
                  </li>
                </ul>
                <ul v-if="authenticated" class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" role="button" @click.prevent="logout()"
                      >Logout</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled">{{ user.name }}</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="justify-between"></div>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Loading our components here -->
            <router-view></router-view>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Golden Group 2021</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {};
  },
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "auth/user",
    }),
  },
  mounted() {
    this.getGlobalData();
  },
  methods: {
    ...mapActions({
      logoutAction: "auth/logout",
      getGlobalData: "getGlobalData",
    }),
    async logout() {
      try {
        await this.logoutAction();
        this.$router.push({ path: "/login" });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>