<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs>
          <b-tab title="Active">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>

                  <!-- Button trigger modal -->
                  <b-button
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.addTruckModal
                  >
                    Add Truck
                  </b-button>
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
                    :items="activeTrucks"
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
          </b-tab>
          <b-tab title="In-Active">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>

                  <!-- Button trigger modal -->
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
                    :items="inactiveTrucks"
                    :fields="trucksFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
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
            </div>
          </b-tab>
        </b-tabs>
      </b-card>

      <!-- Add Truck Modal -->
      <b-modal
        scrollable
        title="Add Truck"
        button-size="sm"
        class="modal fade"
        id="addTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreateTruck"
      >
        <form>
          <div class="form-group">
            <label for="">Reg Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.registrationNumber"
              placeholder="Enter truck registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Company</label>
            <v-select
              v-model="newTruck.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Truck Type</label>
            <v-select
              v-model="newTruck.truckTypeId"
              label="name"
              :options="truckType"
              :reduce="(truckType) => truckType.id"
              placeholder="Choose Truck Type"
            ></v-select>
          </div>
        </form>
      </b-modal>
      <!-- Update Truck Modal -->
      <b-modal
        scrollable
        title="Update Truck"
        ok-title="Save"
        class="modal fade"
        id="updateTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleUpdateTruck"
        v-if="rowDetails == true"
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            size="sm"
            variant="danger"
            @click="hide(handleDeactivateTruck())"
            >Deactivate</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
        </template>
        <form>
          <div class="form-group">
            <label for="">Reg Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editTruck.registrationNumber"
              placeholder="Enter truck registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Company</label>
            <v-select
              v-model="editTruck.company.id"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Truck Type</label>
            <v-select
              v-model="editTruck.truckType.id"
              label="name"
              :options="truckType"
              :reduce="(truckType) => truckType.id"
              placeholder="Choose Truck Type"
            ></v-select>
          </div>
        </form>
      </b-modal>
      <!-- Inactive Truck Modal -->
      <b-modal
        scrollable
        title="Add Truck"
        ok-title="Activate"
        class="modal fade"
        id="inactiveTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleActivateTruck"
        v-if="rowDetails == true"
      >
        <h6>Reg Number</h6>
        <p>{{ editTruck.registrationNumber }}</p>

        <h6>Company</h6>
        <p>{{ editTruck.company.name }}</p>

        <h6>Truck Type</h6>
        <p>{{ editTruck.truckType.name }}</p>
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
      trucksFields: [
        { key: "registrationNumber" },
        { key: "company.name", label: "Company" },
        { key: "truckType.name", label: "Truck Type" },
        { key: "activityStatus.name", label: "Activity Status" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      newTruck: {
        registrationNumber: "",
        companyId: "",
        truckTypeId: "",
      },
      editTruck: "",
    };
  },
  computed: {
    activeTrucks() {
      return this.trucks.filter(
        (trucks) =>
          trucks.activityStatus.id === 1 || trucks.activityStatus.id === 2 //or workshop
      );
    },
    inactiveTrucks() {
      return this.trucks.filter((trucks) => trucks.activityStatus.id === 3);
    },
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
      this.editTruck = item;
      this.rowDetails = true;
      this.$root.$emit("bv::show::modal", "updateTruckModal", button);
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
            companyId: this.editTruck.content.company.id,
            truckTypeId: this.editTruck.content.truckType.id,
            activityStatusId: this.editTruck.content.activityStatus.id,
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
    handleDeactivateTruck() {
      this.deactivateTruck();
    },
    deactivateTruck() {
      axios
        .patch(
          "http://localhost:8000/api/trucks/" + this.editTruck.content.id,
          {
            registrationNumber: this.editTruck.content.registrationNumber,
            companyId: this.editTruck.content.company.id,
            truckTypeId: this.editTruck.content.truckType.id,
            activityStatusId: 3,
          }
        )
        .then((res) => {
          console.log("Truck deactivated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updateTruckModal");
        this.getTrucks();
      });
    },
    inactiveInfo(item, button) {
      this.editTruck.content = item;
      this.rowDetails = true;
      this.$root.$emit("bv::show::modal", "inactiveTruckModal", button);
    },
    handleActivateTruck() {
      this.activateTruck();
    },
    activateTruck() {
      axios
        .patch(
          "http://localhost:8000/api/trucks/" + this.editTruck.content.id,
          {
            registrationNumber: this.editTruck.content.registrationNumber,
            companyId: this.editTruck.content.company.id,
            truckTypeId: this.editTruck.content.truckType.id,
            activityStatusId: 1,
          }
        )
        .then((res) => {
          console.log("Truck activated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("inactiveTruckModal");
        this.getTrucks();
      });
    },
  },
};
</script>