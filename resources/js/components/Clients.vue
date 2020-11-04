<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.addClient
            >
              Add Client
            </button>
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
          </b-table>
        </div>
      </div>

      <!-- Add Client Modal -->

      <b-modal
        ok-title="Save"
        title="Add Client"
        class="modal fade"
        id="addClient"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleOk"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="submitClient">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="newClient.name"
                    placeholder="Enter client name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="newClient.address"
                    placeholder="Enter client Address"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="newClient.phoneNumber"
                    placeholder="Enter client's phone number"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Person</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="newClient.contactPersonName"
                    placeholder="Enter contact name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile Number</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="newClient.mobile"
                    placeholder="Enter mobile number"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="newClient.email"
                    aria-describedby="emailHelp"
                    placeholder="Enter client's email"
                    required
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>
    </b-overlay>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      isSuccess: false,
      clients: [],
      clientsFields: [
        { key: "name", sortable: true },
        { key: "address" },
        { key: "phone" },
        { key: "contactPerson" },
        { key: "mobile" },
        { key: "email" },
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
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.submitClient();
    },
    submitClient() {
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
        this.$bvModal.hide("addClient");
        this.getClients();
      });
    },
  },
};
</script>
