<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs>
          <b-tab title="ACTIVE">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                  <!-- Button trigger modal -->
                  <b-button
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.addClientModal
                  >
                    Add Client
                  </b-button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-search">
                  <b-input-group size="sm">
                    <b-form-input
                      id="tableFilter"
                      type="search"
                      v-model="tableFilter"
                      placeholder="Search"
                    ></b-form-input>
                  </b-input-group>
                </div>
                <b-table
                  class="table-list"
                  responsive
                  bordered
                  striped
                  hover
                  :small="true"
                  :items="activeClients"
                  :fields="clientsFields"
                  :head-variant="tableHeadVariant"
                  :sticky-header="true"
                  :filter="tableFilter"
                >
                  <template #cell(actions)="row">
                    <b-button size="sm" @click="info(row.item)" class="mr-1"
                      >DETAILS
                    </b-button>
                  </template>
                </b-table>
              </div>
            </div>
          </b-tab>
          <b-tab title="INACTIVE" nav-item-class>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                  <!-- Button trigger modal -->
                </div>
              </div>
              <div class="card-body">
                <div class="table-search">
                  <b-input-group size="sm">
                    <b-form-input
                      id="tableFilter"
                      type="search"
                      v-model="tableFilter"
                      placeholder="Search"
                    ></b-form-input>
                  </b-input-group>
                </div>
                <b-table
                  class="table-list"
                  responsive
                  bordered
                  striped
                  hover
                  :small="true"
                  :items="inactiveClients"
                  :fields="clientsFields"
                  :head-variant="tableHeadVariant"
                  :sticky-header="true"
                  :filter="tableFilter"
                >
                  <template #cell(actions)="row">
                    <b-button
                      size="sm"
                      @click="inactiveInfo(row.item)"
                      class="mr-1"
                      >DETAILS
                    </b-button>
                  </template>
                </b-table>
              </div>
            </div>
          </b-tab>
        </b-tabs>
      </b-card>

      <!-- DataTales Example -->

      <!-- Add Client Modal -->
      <b-modal
        ok-title="Save"
        title="Add Client"
        class="modal fade"
        button-size="sm"
        id="addClientModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleCreateClient"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="createClient">
                <b-form-group label="Name" invalid-feedback="Name is required">
                  <b-form-input
                    id="client-name"
                    type="text"
                    class="form-control"
                    v-model="newClient.name"
                    placeholder="Enter client name"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group
                  label="Address"
                  invalid-feedback="Address is required"
                >
                  <b-form-input
                    type="text"
                    class="form-control"
                    v-model="newClient.address"
                    placeholder="Enter client Address"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group
                  label="Phone Number"
                  invalid-feedback="Phone number is required"
                >
                  <b-form-input
                    type="tel"
                    class="form-control"
                    v-model="newClient.phoneNumber"
                    placeholder="Enter client's phone number"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group
                  label="Contact Person"
                  invalid-feedback="Contact person is required"
                >
                  <b-form-input
                    type="text"
                    class="form-control"
                    v-model="newClient.contactPersonName"
                    placeholder="Enter contact person's name"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group
                  label="Mobile Number"
                  invalid-feedback="Mobile number is required"
                >
                  <b-form-input
                    type="tel"
                    class="form-control"
                    v-model="newClient.mobile"
                    placeholder="Enter mobile number"
                    required
                  ></b-form-input>
                </b-form-group>
                <b-form-group
                  label="Email address"
                  invalid-feedback="is required"
                >
                  <b-form-input
                    type="email"
                    class="form-control"
                    v-model="newClient.email"
                    aria-describedby="emailHelp"
                    placeholder="Enter client's email"
                    required
                  ></b-form-input>
                </b-form-group>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Update/Deactivate Client Modal -->
      <b-modal
        scrollable
        ok-title="Save"
        title="Client Info"
        class="modal fade"
        button-size="sm"
        id="updateClientModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleUpdateClient"
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            size="sm"
            variant="danger"
            @click="hide(handleDeactivateClient())"
            >Deactivate</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
        </template>
        <form ref="form" @submit.stop.prevent="updateClient">
          <b-form-group label="Name" invalid-feedback="Name is required">
            <b-form-input
              id="client-name"
              type="text"
              class="form-control"
              v-model="editClient.content.name"
              placeholder="Enter client name"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group label="Address" invalid-feedback="Address is required">
            <b-form-input
              type="text"
              class="form-control"
              v-model="editClient.content.address"
              placeholder="Enter client Address"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            label="Phone Number"
            invalid-feedback="Phone number is required"
          >
            <b-form-input
              type="tel"
              class="form-control"
              v-model="editClient.content.phoneNumber"
              placeholder="Enter client's phone number"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            label="Contact Person"
            invalid-feedback="Contact person is required"
          >
            <b-form-input
              type="text"
              class="form-control"
              v-model="editClient.content.contactPersonName"
              placeholder="Enter contact person's name"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group
            label="Mobile Number"
            invalid-feedback="Mobile number is required"
          >
            <b-form-input
              type="tel"
              class="form-control"
              v-model="editClient.content.mobile"
              placeholder="Enter mobile number"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group label="Email address" invalid-feedback="is required">
            <b-form-input
              type="email"
              class="form-control"
              v-model="editClient.content.email"
              aria-describedby="emailHelp"
              placeholder="Enter client's email"
              required
            ></b-form-input>
          </b-form-group>
        </form>
      </b-modal>
      <!--  Activate Client Modal -->
      <b-modal
        scrollable
        ok-title="Activate"
        title="Client Info"
        class="modal fade"
        button-size="sm"
        id="activateClientModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleActivateClient"
      >
        <div class="modal-body">
          <h6>Name:</h6>
          <p>{{ this.editClient.content.name }}</p>
          <h6>Address:</h6>
          <p>{{ this.editClient.content.address }}</p>
          <h6>Phone Number:</h6>
          <p>{{ this.editClient.content.phoneNumber }}</p>
          <h6>Contact Person:</h6>
          <p>{{ this.editClient.content.contactPersonName }}</p>
          <h6>Mobile:</h6>
          <p>{{ this.editClient.content.mobile }}</p>
          <h6>Email:</h6>
          <p>{{ this.editClient.content.email }}</p>
        </div>
      </b-modal>
    </b-overlay>
  </div>
</template>

<script>
import api from "../apis/api";
import { mapState } from "vuex";
export default {
  data() {
    return {
      loading: null,
      isSuccess: false,
      clients: [],
      clientsFields: [
        { key: "name", sortable: true },
        { key: "address" },
        { key: "phoneNumber" },
        { key: "contactPersonName" },
        { key: "mobile" },
        { key: "email" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      newClient: {
        name: "",
        address: "",
        phoneNumber: "",
        contactPersonName: "",
        mobile: "",
        email: "",
      },
      tableFilter: null,
      editClient: {
        modalId: "updateClientModal",
        content: "",
      },
    };
  },
  created() {
    this.getClients();
  },
  computed: {
    activeClients() {
      return this.clients.filter((client) => client.activityStatus.id === 1);
    },
    inactiveClients() {
      return this.clients.filter((client) => client.activityStatus.id === 3);
    },
    sortOptions() {
      // Create an options list from our fields
      return this.clientsFields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
    },
  },
  methods: {
    async getClients() {
      this.loading = true;
      try {
        const response = await api.get("clients");
        this.clients = response.data.clients;
        this.isSuccess = true;
        this.loading = false;
      } catch (error) {
        console.log(error.error);
      }
    },

    handleCreateClient(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createClient();
    },
    async createClient() {
      try {
        await api.post("clients", {
          clientName: this.newClient.name,
          clientAddress: this.newClient.address,
          clientPhoneNumber: this.newClient.phoneNumber,
          clientContactPersonName: this.newClient.contactPersonName,
          clientMobile: this.newClient.mobile,
          clientEmail: this.newClient.email,
        });
        this.$nextTick(() => {
          this.$bvModal.hide("addClientModal");
          this.newClient.name = "";
          this.newClient.address = "";
          this.newClient.phoneNumber = "";
          this.newClient.contactPersonName = "";
          this.newClient.mobile = "";
          this.newClient.email = "";
          this.getClients();
        });
      } catch (error) {
        console.log(error);
      }
    },

    info(item, button) {
      this.editClient.content = item;
      this.$root.$emit("bv::show::modal", this.editClient.modalId, button);
    },
    handleUpdateClient(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateClient();
    },
    async updateClient() {
      try {
        await api.patch("clients/" + this.editClient.content.id, {
          clientName: this.editClient.content.name,
          clientAddress: this.editClient.content.address,
          clientPhoneNumber: this.editClient.content.phoneNumber,
          clientContactPersonName: this.editClient.content.contactPersonName,
          clientMobile: this.editClient.content.mobile,
          clientEmail: this.editClient.content.email,
          clientActivityStatusId: this.editClient.content.activityStatus.id,
        });
        console.log("client added");
        this.$nextTick(() => {
          this.$bvModal.hide("updateClientModal");
          this.getClients();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleDeactivateClient() {
      this.deactivateClient();
    },
    deactivateClient() {
      api
        .patch("clients/" + this.editClient.content.id, {
          clientName: this.editClient.content.name,
          clientAddress: this.editClient.content.address,
          clientPhoneNumber: this.editClient.content.phoneNumber,
          clientContactPersonName: this.editClient.content.contactPersonName,
          clientMobile: this.editClient.content.mobile,
          clientEmail: this.editClient.content.email,
          clientActivityStatusId: 4,
        })
        .then((res) => {
          console.log(res);
          console.log("Client deactivated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updateClientModal");
        this.getClients();
      });
    },
    inactiveInfo(item, button) {
      this.editClient.content = item;
      this.$root.$emit("bv::show::modal", "activateClientModal", button);
    },
    handleActivateClient() {
      this.activateClient();
    },
    activateClient() {
      api
        .patch("clients/" + this.editClient.content.id, {
          clientName: this.editClient.content.name,
          clientAddress: this.editClient.content.address,
          clientPhoneNumber: this.editClient.content.phoneNumber,
          clientContactPersonName: this.editClient.content.contactPersonName,
          clientMobile: this.editClient.content.mobile,
          clientEmail: this.editClient.content.email,
          clientActivityStatusId: 3,
        })
        .then((res) => {
          console.log(res);
          console.log("Client activated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("activateClientModal");
        this.getClients();
      });
    },
  },
};
</script>
