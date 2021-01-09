<template>
  <!-- v if on user login then show the dashboard -->
  <div >
    <div id="wrapper">
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <div class="fixed-top d-flex flex-column">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                  <li class="nav-item">
                    <router-link class="nav-link" to="/">Home</router-link>
                  </li>
                  <li class="nav-item dropdown">
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
                      <router-link
                        class="dropdown-item"
                        to="/"
                      >
                        Allocations
                      </router-link>
                      <router-link class="dropdown-item" to="/trips"
                        >Trips
                      </router-link>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Documents</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
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
                      <div class="dropdown-divider"></div>
                    </div>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link" to="/trailers"
                      >Trailers</router-link
                    >
                  </li>
                  <li class="nav-item dropdown">
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
                        >All People</router-link
                      >
                    </div>
                  </li>
                  <li class="nav-item dropdown">
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
                      <router-link class="dropdown-item" to="/clients"
                        >Clients</router-link
                      >
                    </div>
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
              <span>Copyright &copy; Golden Group 2020</span>
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
export default {
  computed:{
    isLoggedIn(){
      return this.$store.getters.isLoggedIn;
    }
  },
  methods:{
    logout(){
      //logout function enters here
    }
  }
};
</script>