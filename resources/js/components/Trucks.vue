<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
          <b-tab title="Active">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>

                  <!-- Button trigger Create Truck Modal -->
                  <b-button
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.newTruckModal
                  >
                    New Truck
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
                <div class="table-responsive">
                  <b-table
                    class="table-list"
                    responsive
                    bordered
                    striped
                    hover
                    :small="true"
                    :items="activeTrucks"
                    :fields="truckFields"
                    :filter="tableFilter"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    @row-clicked="truckInfo"
                  >
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
                  <h6 class="m-0 font-weight-bold text-primary"></h6>

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
                    :fields="truckFields"
                    :filter="tableFilter"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    @row-clicked="inactiveTruckInfo"
                  >
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
        </b-tabs>
      </b-card>

      <!-- New Truck Modal -->
      <b-modal
        scrollable
        title="New Truck"
        button-size="sm"
        class="modal fade"
        id="newTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreateTruck"
      >
        <form>
          <div class="form-group">
            <label for="">Fleet Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.fleetNumber"
              placeholder="Enter vehicle fleet number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Registration Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.registrationNumber"
              placeholder="Enter vehicle registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Make</label>
            <v-select
              v-model="newTruck.vehicleMakeId"
              label="name"
              :options="vehicleMake"
              :reduce="(vehicleMake) => vehicleMake.id"
              placeholder="Choose Vehicle Make"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Year Model</label>
            <input
              type="number"
              min="1900"
              class="form-control"
              v-model="newTruck.yearModel"
              placeholder="Enter vehicle model year"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Chassis Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.chassisNumber"
              placeholder="Enter vehicle chassis number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Configuration Model</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.configurationModel"
              placeholder="Enter vehicle configuration model"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Transmission Type</label>
            <v-select
              v-model="newTruck.transmissionTypeId"
              label="name"
              :options="vehicleTransmissionType"
              :reduce="(vehicleTransmissionType) => vehicleTransmissionType.id"
              placeholder="Choose vehicle transmission type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Engine Size</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.engineSize"
              placeholder="Enter vehicle engine size"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Autorized Payload</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.authorizedPayload"
              placeholder="Enter vehicle authorized payload"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Length</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.length"
              placeholder="Enter vehicle length"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Width</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.width"
              placeholder="Enter vehicle width"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Height</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.height"
              placeholder="Enter vehicle height"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Fuel Type</label>
            <v-select
              v-model="newTruck.fuelTypeId"
              label="name"
              :options="fuelType"
              :reduce="(fuelType) => fuelType.id"
              placeholder="Choose fuel type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Capacity</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.fuelCapacity"
              placeholder="Enter vehicle fuel capacity"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Comsumption</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.fuelConsumption"
              placeholder="Enter vehicle fuel consumption"
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
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            v-if="editTruck.activityStatus.id == 1"
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
            <label for="">Fleet Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.fleetNumber"
              placeholder="Enter vehicle fleet number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Registration Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.registrationNumber"
              placeholder="Enter vehicle registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Make</label>
            <v-select
              v-model="newTruck.vehicleMakeId"
              label="name"
              :options="vehicleMake"
              :reduce="(vehicleMake) => vehicleMake.id"
              placeholder="Choose Vehicle Make"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Year Model</label>
            <input
              type="number"
              min="1900"
              class="form-control"
              v-model="newTruck.yearModel"
              placeholder="Enter vehicle model year"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Chassis Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.chassisNumber"
              placeholder="Enter vehicle chassis number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Configuration Model</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.configurationModel"
              placeholder="Enter vehicle configuration model"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Transmission Type</label>
            <v-select
              v-model="newTruck.transmissionTypeId"
              label="name"
              :options="vehicleTransmissionType"
              :reduce="(vehicleTransmissionType) => vehicleTransmissionType.id"
              placeholder="Choose vehicle transmission type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Engine Size</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.engineSize"
              placeholder="Enter vehicle engine size"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Autorized Payload</label>
            <input
              type="text"
              class="form-control"
              v-model="newTruck.authorizedPayload"
              placeholder="Enter vehicle authorized payload"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Length</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.length"
              placeholder="Enter vehicle length"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Width</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.width"
              placeholder="Enter vehicle width"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Height</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.height"
              placeholder="Enter vehicle height"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Fuel Type</label>
            <v-select
              v-model="newTruck.fuelTypeId"
              label="name"
              :options="fuelType"
              :reduce="(fuelType) => fuelType.id"
              placeholder="Choose fuel type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Capacity</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.fuelCapacity"
              placeholder="Enter vehicle fuel capacity"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Comsumption</label>
            <input
              type="number"
              class="form-control"
              v-model="newTruck.fuelConsumption"
              placeholder="Enter vehicle fuel consumption"
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
      <!-- Inactive Truck Modal -->
      <b-modal
        scrollable
        title="Inactive Truck"
        ok-title="Activate"
        class="modal fade"
        id="inactiveTruckModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleActivateTruck"
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
import api from "../apis/api";
export default {
  data() {
    return {
      loading: false,
      trucks: [],
      truckType: [],
      vehicleMake: [],
      vehicleTransmissionType: [],
      fuelType: [],
      company: [],
      truckFields: [
        { key: "fleetNumber" },
        { key: "registrationNumber" },
        { key: "company.name", label: "Company" },
        { key: "truckType.name", label: "Truck Type" },
        { key: "activityStatus.name", label: "Activity Status" },
      ],
      tableFilter: null,
      tableHeadVariant: "dark",
      newTruck: {
        registrationNumber: "",
        companyId: "",
        truckTypeId: "",
      },
      editTruck: {
        registrationNumber: "",
        company: "",
        truckType: "",
        activityStatus: "",
      },
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
    sortOptions() {
      // Create an options list from our fields
      return this.truckFields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
    },
  },
  mounted() {
    this.getTrucks();
  },
  methods: {
    getTrucks() {
      this.loading = true;
      api.get("trucks").then(({ data }) => {
        this.trucks = data.trucks;
        this.truckType = data.truckType;
        this.vehicleMake = data.vehicleMake;
        this.vehicleTransmissionType = data.vehicleTransmissionType;
        this.fuelType = data.fuelType;
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
      api
        .post("trucks", {
          registrationNumber: this.newTruck.registrationNumber,
          companyId: this.newTruck.companyId,
          truckTypeId: this.newTruck.truckTypeId,
          allocationStatusId: 1,
        })
        .then((res) => console.log("new truck added"));

      this.$nextTick(() => {
        this.$bvModal.hide("newTruckModal");
        this.getTrucks();
      });
    },
    truckInfo(item, button) {
      //console.log(item);
      this.editTruck.id = item.id;
      this.editTruck.registrationNumber = item.registrationNumber;
      this.editTruck.company = item.company;
      this.editTruck.truckType = item.truckType;
      this.editTruck.activityStatus = item.activityStatus;
      this.$root.$emit("bv::show::modal", "updateTruckModal", button);
    },
    handleUpdateTruck(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateTruck();
    },
    async updateTruck() {
      try {
        await api.patch("trucks/" + this.editTruck.content.id, {
          registrationNumber: this.editTruck.content.registrationNumber,
          companyId: this.editTruck.content.company.id,
          truckTypeId: this.editTruck.content.truckType.id,
          activityStatusId: this.editTruck.content.activityStatus.id,
        });
        this.$nextTick(() => {
          this.$bvModal.hide("updateTruckModal");
          this.getTrucks();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleDeactivateTruck() {
      this.deactivateTruck();
    },
    async deactivateTruck() {
      try {
        await api.patch("switch_truck_activity/" + this.editTruck.id, {
          activityStatusId: 3,
        });
        console.log("Truck deactivated");
        this.$nextTick(() => {
          this.$bvModal.hide("updateTruckModal");
          this.getTrucks();
        });
      } catch (error) {
        console.log(error);
      }
    },
    inactiveTruckInfo(item, button) {
      this.editTruck.id = item.id;
      this.editTruck.registrationNumber = item.registrationNumber;
      this.editTruck.company = item.company;
      this.editTruck.truckType = item.truckType;
      this.editTruck.activityStatus = item.activityStatus;
      this.$root.$emit("bv::show::modal", "inactiveTruckModal", button);
    },
    handleActivateTruck() {
      this.activateTruck();
    },
    async activateTruck() {
      try {
        await api.patch("switch_truck_activity/" + this.editTruck.id, {
          activityStatusId: 1,
        });
        console.log("Truck activated");
        this.$nextTick(() => {
          this.$bvModal.hide("inactiveTruckModal");
          this.getTrucks();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>