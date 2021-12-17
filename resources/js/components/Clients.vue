<template>
  <div>
    <b-overlay :show="loading">
      <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
        <b-tab title="ACTIVE">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="col-md-auto justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <!-- Button trigger modal -->
                <b-button
                  class="float-right"
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newClientModal
                >
                  New Client
                </b-button>
              </div>
            </div>
            <!-- <div class="card-body"> -->
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
              bordered
              outlined
              striped
              hover
              :small="true"
              :items="activeClients"
              :fields="clientsFields"
              :head-variant="tableHeadVariant"
              sticky-header="55vh"
              :filter="tableFilter"
              @row-clicked="info"
            >
            </b-table>
          </div>
          <!-- </div> -->
        </b-tab>
        <b-tab title="INACTIVE" nav-item-class>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
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
                bordered
                outlined
                striped
                hover
                :small="true"
                :items="inactiveClients"
                :fields="clientsFields"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                :filter="tableFilter"
                @row-clicked="inactiveInfo"
              >
              </b-table>
            </div>
          </div>
        </b-tab>
      </b-tabs>

      <!-- DataTales Example -->

      <!-- Create Client Modal -->
      <b-modal
        ok-title="Save"
        scrollable
        title="Create Client"
        class="modal fade"
        button-size="sm"
        id="newClientModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleCreateClient"
      >
        <form ref="form" @submit.stop.prevent="createClient">
          <b-form-group label="Name" invalid-feedback="Name is required">
            <input
              id="client-name"
              type="text"
              class="form-control"
              v-model="newClient.name"
              placeholder="Enter client name"
              required
            />
          </b-form-group>
          <b-form-group label="Address" invalid-feedback="Address is required">
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
          <b-form-group label="Email address" invalid-feedback="is required">
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
            v-if="editClient.activityStatus.id == 1"
            size="sm"
            variant="danger"
            @click="hide(deactivateClient())"
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
              v-model="editClient.name"
              placeholder="Enter client name"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group label="Address" invalid-feedback="Address is required">
            <b-form-input
              type="text"
              class="form-control"
              v-model="editClient.address"
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
              v-model="editClient.phoneNumber"
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
              v-model="editClient.contactPersonName"
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
              v-model="editClient.mobile"
              placeholder="Enter mobile number"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group label="Email address" invalid-feedback="is required">
            <b-form-input
              type="email"
              class="form-control"
              v-model="editClient.email"
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
        @ok="activateClient"
      >
        <div class="modal-body">
          <h6>Name:</h6>
          <p>{{ this.editClient.name }}</p>
          <h6>Address:</h6>
          <p>{{ this.editClient.address }}</p>
          <h6>Phone Number:</h6>
          <p>{{ this.editClient.phoneNumber }}</p>
          <h6>Contact Person:</h6>
          <p>{{ this.editClient.contactPersonName }}</p>
          <h6>Mobile:</h6>
          <p>{{ this.editClient.mobile }}</p>
          <h6>Email:</h6>
          <p>{{ this.editClient.email }}</p>
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
      ],
      tableHeadVariant: "dark",
      newClient: {},
      tableFilter: null,
      editClient: {
        id: "",
        name: "",
        address: "",
        phoneNumber: "",
        contactPersonName: "",
        mobile: "",
        email: "",
        activityStatus: "",
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
        await api.post("clients", this.newClient);
        this.$nextTick(() => {
          this.$bvModal.hide("newClientModal");
          this.getClients();
          this.newClient = {};
        });
      } catch (error) {
        console.log(error);
      }
    },

    info(item, button) {
      this.editClient.id = item.id;
      this.editClient.name = item.name;
      this.editClient.address = item.address;
      this.editClient.phoneNumber = item.phoneNumber;
      this.editClient.contactPersonName = item.contactPersonName;
      this.editClient.mobile = item.mobile;
      this.editClient.email = item.email;
      this.$root.$emit("bv::show::modal", "updateClientModal", button);
    },
    handleUpdateClient(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateClient();
    },
    async updateClient() {
      try {
        await api
          .patch("clients/" + this.editClient.id, {
            clientName: this.editClient.name,
            clientAddress: this.editClient.address,
            clientPhoneNumber: this.editClient.phoneNumber,
            clientContactPersonName: this.editClient.contactPersonName,
            clientMobile: this.editClient.mobile,
            clientEmail: this.editClient.email,
            clientActivityStatusId: this.editClient.activityStatus.id,
          })
          .then((response) => console.log(response));
        this.$nextTick(() => {
          this.$bvModal.hide("updateClientModal");
          this.getClients();
        });
      } catch (error) {
        console.log(error);
      }
    },
    async deactivateClient() {
      try {
        await api.patch("clients/" + this.editClient.id, {
          clientName: this.editClient.name,
          clientAddress: this.editClient.address,
          clientPhoneNumber: this.editClient.phoneNumber,
          clientContactPersonName: this.editClient.contactPersonName,
          clientMobile: this.editClient.mobile,
          clientEmail: this.editClient.email,
          clientActivityStatusId: 3,
        });
        console.log("Client deactivated");
        this.$nextTick(() => {
          this.$bvModal.hide("updateClientModal");
          this.getClients();
        });
      } catch (error) {
        console.log(error);
      }
    },
    inactiveInfo(item, button) {
      this.editClient.id = item.id;
      this.editClient.name = item.name;
      this.editClient.address = item.address;
      this.editClient.phoneNumber = item.phoneNumber;
      this.editClient.contactPersonName = item.contactPersonName;
      this.editClient.mobile = item.mobile;
      this.editClient.email = item.email;
      this.$root.$emit("bv::show::modal", "activateClientModal", button);
    },
    async activateClient() {
      try {
        await api.patch("clients/" + this.editClient.id, {
          clientName: this.editClient.name,
          clientAddress: this.editClient.address,
          clientPhoneNumber: this.editClient.phoneNumber,
          clientContactPersonName: this.editClient.contactPersonName,
          clientMobile: this.editClient.mobile,
          clientEmail: this.editClient.email,
          clientActivityStatusId: 1,
        });
        console.log("Client activated");
        this.$nextTick(() => {
          this.$bvModal.hide("activateClientModal");
          this.getClients();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
