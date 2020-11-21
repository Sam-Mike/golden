<template>
  <div>
    <b-overlay :show="loading">
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
            :items="clients"
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
                    type="number"
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
                    type="number"
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

      <!-- Edit Client Modal -->
      <b-modal
        scrollable
        ok-title="Update"
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
            @click="hide(handleDeleteClient())"
            >Delete</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
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
    </b-overlay>
  </div>
</template>

<script>
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
        id: "updateClientModal",
        content: "",
      },
    };
  },
  created() {
    this.getClients();
  },
  computed: {
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
    getClients() {
      this.loading = true;
      axios
        .get("http://localhost:8000/api/clients")
        .then(({ data }) => {
          this.clients = data.clients;
          this.isSuccess = true;
        })
        .catch((error) => {
          return console.log(error);
        })
        .finally(() => (this.loading = false));
    },
    handleCreateClient(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createClient();
    },
    createClient() {
      axios
        .post("http://127.0.0.1:8000/api/clients", {
          clientName: this.newClient.name,
          clientAddress: this.newClient.address,
          clientPhoneNumber: this.newClient.phoneNumber,
          clientContactPersonName: this.newClient.contactPersonName,
          clientMobile: this.newClient.mobile,
          clientEmail: this.newClient.email,
        })
        .then((res) => {
          console.log("Client added");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("addClientModal");
        this.getClients();
      });
    },
    info(item, button) {
      this.editClient.content = item;
      this.$root.$emit("bv::show::modal", this.editClient.id, button);
    },
    handleUpdateClient(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.updateClient();
    },
    updateClient() {
      axios
        .patch(
          "http://127.0.0.1:8000/api/clients/" + this.editClient.content.id,
          {
            clientName: this.editClient.content.name,
            clientAddress: this.editClient.content.address,
            clientPhoneNumber: this.editClient.content.phoneNumber,
            clientContactPersonName: this.editClient.content.contactPersonName,
            clientMobile: this.editClient.content.mobile,
            clientEmail: this.editClient.content.email,
          }
        )
        .then((res) => {
          console.log("Client updated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updateClientModal");
        this.getClients();
      });
    },
    handleDeleteClient() {
      this.deleteClient();
    },
    deleteClient() {
      axios
        .delete(
          "http://127.0.0.1:8000/api/clients/" + this.updateClient.content.id
        )
        .then((res) => {
          console.log("Client Deleted");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updateClientModal");
        this.getClients();
      });
    },
  },
};
</script>
