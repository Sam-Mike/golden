<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>

            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.addTruck
            >
              Add Truck
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <b-table
              class="table-list"
              responsive
              bordered
              striped
              hover
              :small="true"
              :items="trucks"
              :fields="trucksFields"
              :head-variant="tableHeadVariant"
              :sticky-header="true"
            >
              <template #cell(actions)="row">
                <b-button size="sm" @click="info(row.item)" class="mr-1"
                  >DETAILS
                </b-button>
              </template>
            </b-table>
          </div>
        </div>
      </div>

      <!-- Add Truck Modal -->
      <b-modal
        scrollable
        title="Add Truck"
        ok-title="Save"
        class="modal fade"
        id="addTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleCreateTruck"
      >
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Reg Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.registrationNumber"
              placeholder="Enter truck registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <select
              type="text"
              class="form-control"
              v-model="newTruck.companyId"
              placeholder="Choose company"
              required
            >
              <option
                v-for="company in company"
                :key="company.id"
                :value="company.id"
              >
                {{ company.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Cluster</label>
            <select
              type="text"
              class="form-control"
              v-model="newTruck.clusterId"
              placeholder="Choose Cluster"
              required
            >
              <option
                v-for="cluster in cluster"
                :key="cluster.id"
                :value="cluster.id"
              >
                {{ cluster.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Truck Type</label>
            <select
              type="text"
              class="form-control"
              v-model="newTruck.truckTypeId"
              placeholder="Choose Truck Type"
              required
            >
              <option
                v-for="truckType in truckType"
                :key="truckType.id"
                :value="truckType.id"
              >
                {{ truckType.name }}
              </option>
            </select>
          </div>
        </form>
      </b-modal>
      <!-- Update Truck Modal -->
      <b-modal
        scrollable
        title="Add Truck"
        ok-title="Save"
        class="modal fade"
        id="updateTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleUpdateTruck"
        v-if="rowDetails ==true"
      >
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Reg Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editTruck.content.registrationNumber"
              placeholder="Enter truck registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <select
              type="text"
              class="form-control"
              v-model="editTruck.content.companyId"
              placeholder="Choose company"
              required
            >
              <option
                v-for="company in company"
                :key="company.id"
                :value="company.id"
              >
                {{ company.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Cluster</label>
            <select
              type="text"
              class="form-control"
              v-model="editTruck.content.clusterId"
              placeholder="Choose Cluster"
              required
            >
              <option
                v-for="cluster in cluster"
                :key="cluster.id"
                :value="cluster.id"
              >
                {{ cluster.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Truck Type</label>
            <select
              type="text"
              class="form-control"
              v-model="editTruck.content.truckType.name"
              placeholder="Choose Truck Type"
              required
            >
              <option
                v-for="truckType in truckType"
                :key="truckType.id"
                :value="truckType.id"
              >
                {{ truckType.name }}
              </option>
            </select>
          </div>
        </form>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
export default {
  data() {
    return {
      rowDetails: false,
      loading: false,
      trucks: [],
      truckType: [],
      company: [],
      cluster: [],
      trucksFields: [
        { key: "registrationNumber" },
        { key: "company.name", label: "Company" },
        { key: "cluster.name", label: "Cluster Name" },
        { key: "truckType.name", label: "Truck Type" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      newTruck: {
        registrationNumber: "",
        companyId: "",
        clusterId: "",
        truckTypeId: "",
      },
      editTruck: {
        id: "updateTruckModal",
        content: [],
      },
    };
  },
  mounted() {
    this.getTrucks();
  },
  methods: {
    getTrucks() {
      this.loading = true;
      axios.get("http://localhost:8000/api/trucks").then(({ data }) => {
        this.trucks = data.trucks;
        this.truckType = data.truckType;
        this.company = data.company;
        this.cluster = data.cluster;
        this.loading = false;
      });
    },
    handleCreateTruck(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createTruck();
    },
    createTruck() {
      axios
        .post("http://localhost:8000/api/trucks", {
          registrationNumber: this.newTruck.registrationNumber,
          companyId: this.newTruck.companyId,
          clusterId: this.newTruck.clusterId,
          truckTypeId: this.newTruck.truckTypeId,
          allocationStatusId: 1,
        })
        .then((res) => console.log("truck added"));

      this.$nextTick(() => {
        this.$bvModal.hide("addTruckModal");
        this.getTrucks();
      });
    },
    info(item, button) {
      this.editTruck.content = item;
      this.rowDetails = true;
      this.$root.$emit("bv::show::modal", this.editTruck.id, button);
    },
    handleUpdateTruck(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateTruck();
    },
    updateTruck() {
      axios
        .patch(
          "http://localhost:8000/api/trucks/" + this.editTruck.content.id,
          {
            registrationNumber: this.editTruck.content.registrationNumber,
            companyId: this.editTruck.content.companyId,
            clusterId: this.editTruck.content.clusterId,
            truckTypeId: this.editTruck.content.truckTypeId,
          }
        )
        .then((res) => {
          console.log("Truck updated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updateTruckModal");
        this.getTrucks();
      });
    },
    handleDeleteTruck() {
      this.deleteTruck();
    },
    deleteTruck() {
      axios
        .delete("http://localhost:8000/api/trucks/" + this.editTruck.content.id)
        .then((res) => {
          console.log("Truck deleted");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updateTruckModal");
        this.getTrucks();
      });
    },
  },
};
</script>