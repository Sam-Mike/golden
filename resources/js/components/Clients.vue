<template>
  <div>
    <!-- DataTales Example -->
    <loading :active.sync="isLoading" />
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
        <div class="table-responsive">
          <table
            class="table table-bordered table-sm table-striped table-hover"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead class="thead-dark">
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Contact</th>
                <th>Mobile</th>
                <th>Email</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="client in clientsList.clients" :key="client.id">
                <td>{{ client.client_name }}</td>
                <td>{{ client.address }}</td>
                <td>{{ client.phone }}</td>
                <td>{{ client.contact_name }}</td>
                <td>{{ client.mobile }}</td>
                <td>{{ client.email }}</td>
              </tr>
            </tbody>
          </table>
        </div>
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
                  v-model="client.name"
                  placeholder="Enter client name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="client.address"
                  placeholder="Enter client Address"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="client.phone_number"
                  placeholder="Enter client's phone number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contact Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="client.contact_name"
                  placeholder="Enter contact name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile Number</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="client.mobile"
                  placeholder="Enter mobile number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                  type="email"
                  class="form-control"
                  v-model="client.email"
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
  </div>
</template>

<script>
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  components: {
            Loading
        },
  data() {
    return {
      isLoading:false,
      isSuccess: false,
      clientsList: [],
      client: {
        name: "",
        address: "",
        phone_number: "",
        contact_name: "",
        mobile: "",
        email: "",
      },
      rerender: 0,
    };
  },
  created() {
    this.getClients();
  },
  methods: {
    getClients() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/clients")
        .then(({ data }) => {
          this.clientsList = data;
          this.isSuccess = true;
          })
        .catch((error) => {
          return console.log(error);
        })
        .finally(()=> this.isLoading = false);
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
          name: this.client.name,
          address: this.client.address,
          phone_number: this.client.phone_number,
          contact_name: this.client.contact_name,
          mobile: this.client.mobile,
          email: this.client.email,
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
