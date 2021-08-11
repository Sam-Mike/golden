<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <!-- Button trigger modal -->
            <b-button
              size="sm"
              variant="primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.addUserModal
            >
              Create User
            </b-button>
          </div>
        </div>
        <div class="card-body">
          <!-- <div class="table-search">
            <b-input-group size="sm">
              <b-form-input
                id="tableFilter"
                type="search"
                v-model="tableFilter"
                placeholder="Search"
              ></b-form-input>
            </b-input-group>
          </div> -->
          <b-table
            class="table-list"
            responsive
            bordered
            striped
            hover
            :small="true"
            :items="activeUsers"
            :fields="usersFields"
            :head-variant="tableHeadVariant"
            :sticky-header="true"
            @row-clicked="userInfo"
          >
          </b-table>
        </div>
      </div>

      <!-- Create User Modal -->
      <b-modal
        ok-title="Save"
        title="Add User"
        class="modal fade"
        button-size="sm"
        id="addUserModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleCreateUser"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="createUser">
                <b-form-group label="Name" invalid-feedback="Name is required">
                  <b-form-input
                    id="user-name"
                    type="text"
                    class="form-control"
                    v-model="newUser.name"
                    placeholder="Enter user name"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group label="Email" invalid-feedback="email is required"
                  ><b-form-input
                    type="text"
                    class="form-control"
                    v-model="newUser.email"
                    placeholder="Enter user email"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group
                  label="Password"
                  invalid-feedback="password is required"
                  ><b-form-input
                    type="text"
                    class="form-control"
                    v-model="newUser.password"
                    placeholder="Enter user password"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group label="User Role">
                  <v-select
                    v-model="newUser.roleId"
                    label="name"
                    :options="roles"
                    :reduce="(roles) => role.id"
                    placeholder = "Choose user role"
                  ></v-select>
                </b-form-group>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Update/Deactivate User Modal -->
      <b-modal
        scrollable
        ok-title="Save"
        title="User Info"
        class="modal fade"
        button-size="sm"
        id="updateUserModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleUpdateUser"
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            size="sm"
            variant="danger"
            @click="hide(handleDeactivateUser())"
            >Deactivate</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
        </template>
        <form ref="form" @submit.stop.prevent="updateUser">
          <b-form-group label="Name" invalid-feedback="Name is required">
            <b-form-input
              id="user-name"
              type="text"
              class="form-control"
              v-model="editUser.name"
              placeholder="Enter user name"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            label="Email address"
            invalid-feedback="email is required"
          >
            <b-form-input
              type="email"
              class="form-control"
              v-model="editUser.email"
              aria-describedby="emailHelp"
              placeholder="Enter user's email"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            label="Password"
            invalid-feedback="password is required"
          >
            <b-form-input
              type="text"
              class="form-control"
              v-model="editUser.password"
              aria-describedby="emailHelp"
              placeholder="Enter user's password"
              required
            ></b-form-input>
          </b-form-group>
        </form>
      </b-modal>
      <!--  Activate User Modal -->
      <b-modal
        scrollable
        ok-title="Activate"
        title="User Info"
        class="modal fade"
        button-size="sm"
        id="activateUserModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleActivateUser"
      >
        <div class="modal-body">
          <h6>Name:</h6>
          <p>{{ this.editUser.name }}</p>
          <h6>Email:</h6>
          <p>{{ this.editUser.password }}</p>
        </div>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
import api from "../apis/api";
export default {
  data() {
    return {
      loading: false,
      users: [],
      roles: [],
      usersFields: [
        { key: "name" },
        { key: "email" },
        { key: "password" },
        { key: "role.name", label: "Role" },
      ],
      tableHeadVariant: "dark",
      newUser: {
        name: "",
        email: "",
        password: "",
        roleId:""
      },
      editUser: {
        id: "",
        name: "",
        email: "",
        password: "",
      },
    };
  },
  computed: {
    activeUsers() {
      return this.users.filter((user) => user.userActivityStatus === "active");
    },
    inactiveUsers() {
      return this.users.filter(
        (user) => user.userActivityStatus === "inactive"
      );
    },
  },
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      api
        .get("users")
        .then((response) => {
          this.users = response.data.users;
          this.roles = response.data.roles;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    handleCreateUser(bvModalEvt) {
      bvModalEvt.PreventDefault();
      this.createUser();
    },
    createUser() {
      {
        api
          .post("users", {
            name: this.newUser.name,
            username: this.newUser.username,
            password: this.newUser.password,
          })
          .then((response) => {
            this.users = response.data.users;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    userInfo(item, button) {
      this.editUser.id = item.id;
      this.editUser.name = item.name;
      this.editUser.email = item.email;
      this.editUser.password = item.password;
      this.$root.$emit("bv::show::modal", "updateUserModal", button);
    },
    handleUpdateUser(bvModalEvt) {
      bvModalEvt.PreventDefault();
      this.updateUser();
    },
    async updateUser() {
      try {
        await api.patch("users/", this.editUser);
      } catch (error) {
        console.log(error);
      }
    },
    async deactivateUser() {
      try {
        await api.patch("users", this.editUser);
      } catch (error) {
        console.log(error);
      }
    },
    handleActivateUser(bvModalEvt) {
      bvModalEvt.PreventDefault();
      this.activateUser();
    },
    async activateUser() {
      try {
        await api.patch("users", this.editUser);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>