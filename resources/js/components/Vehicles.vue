<template>
  <div>
    <b-overlay :show="loading">
      <div class="float-right mb-4"></div>
      <div>
        <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
          <b-tab title="COACH">
            <!-- DataTales Example -->
            <div class="card shadow">
              <div class="card-header py-auto">
                <div class="col-md-auto justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  <!--button to trigger create vehicle modal-->
                  <b-button
                    class="float-right"
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.newVehicleModal
                  >
                    New Vehicle
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
              <div class="table-responsive">
                <b-table
                  class="table-list"
                  bordered
                  outlined
                  striped
                  hover
                  :small="true"
                  :items="coachVehicles"
                  :fields="vehicleFields"
                  :filter="tableFilter"
                  :head-variant="tableHeadVariant"
                  sticky-header="55vh"
                  @row-clicked="vehicleInfo"
                >
                </b-table>
              </div>
              <!-- </div> -->
            </div>
          </b-tab>
          <b-tab title="FLEET">
            <!-- DataTales Example -->
            <div class="card shadow">
              <div class="card-header py-auto">
                <div class="col-md-auto justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  <!-- Button trigger insert new Vehicle Modal -->
                  <b-button
                  class="float-right"
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.newVehicleModal
                  >
                    New Vehicle
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
              <div class="table-responsive">
                <b-table
                  class="table-list"
                  bordered
                  outlined
                  striped
                  hover
                  :small="true"
                  :items="fleetVehicles"
                  :fields="vehicleFields"
                  :filter="tableFilter"
                  :head-variant="tableHeadVariant"
                  sticky-header="55vh"
                  @row-clicked="vehicleInfo"
                >
                </b-table>
              </div>
              <!-- </div> -->
            </div>
          </b-tab>
          <b-tab title="WHEELS">
            <!-- DataTales Example -->
            <div class="card shadow">
              <div class="card-header py-auto">
                <div class="col-md-auto justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>

                  <!-- Button trigger insert new Vehicle Modal -->
                  <b-button
                  class="float-right"
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.newVehicleModal
                  >
                    New Vehicle
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
              <div class="table-responsive">
                <b-table
                  class="table-list"
                  bordered
                  outlined
                  striped
                  hover
                  :small="true"
                  :items="wheelsVehicles"
                  :fields="vehicleFields"
                  :filter="tableFilter"
                  :head-variant="tableHeadVariant"
                  sticky-header="55vh"
                  @row-clicked="vehicleInfo"
                >
                </b-table>
              </div>
              <!-- </div> -->
            </div>
          </b-tab>
          <b-tab title="In-Active">
            <!-- DataTales Example -->
            <div class="card shadow">
              <div class="card-header py-auto">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  <!-- Button trigger modal -->
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <b-table
                    class="table-list"
                    bordered
                    outlined
                    striped
                    hover
                    :small="true"
                    :items="inactiveVehicles"
                    :fields="vehicleFields"
                    :filter="tableFilter"
                    :head-variant="tableHeadVariant"
                    sticky-header="55vh"
                    @row-clicked="inactiveVehicleInfo"
                  >
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
        </b-tabs>
      </div>

      <!-- New Vehicle Modal -->
      <b-modal
        no-close-on-backdrop
        scrollable
        title="New Vehicle"
        button-size="sm"
        class="modal fade"
        id="newVehicleModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreateVehicle"
      >
        <form>
          <div class="form-group">
            <label for="">Registration Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newVehicle.registrationNumber"
              placeholder="Enter vehicle registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Make</label>
            <v-select
              v-model="newVehicle.vehicleMakeId"
              label="name"
              :options="vehicleMake"
              :reduce="(vehicleMake) => vehicleMake.id"
              placeholder="Select Vehicle Make"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Year Model</label>
            <input
              type="number"
              min="1900"
              class="form-control"
              v-model="newVehicle.yearModel"
              placeholder="Enter vehicle model year"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Chassis Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newVehicle.chassisNumber"
              placeholder="Enter vehicle chassis number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Model Configuration</label>
            <input
              type="text"
              class="form-control"
              v-model="newVehicle.modelConfiguration"
              placeholder="Enter vehicle configuration model"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Transmission Type</label>
            <v-select
              v-model="newVehicle.vehicleTransmissionTypeId"
              label="name"
              :options="vehicleTransmissionType"
              :reduce="(vehicleTransmissionType) => vehicleTransmissionType.id"
              placeholder="Select vehicle transmission type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Engine Size (kW)</label>
            <input
              type="number"
              class="form-control"
              v-model="newVehicle.engineSize"
              placeholder="Enter vehicle engine size"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Autorized Payload (T)</label>
            <input
              type="text"
              class="form-control"
              v-model="newVehicle.authorizedPayload"
              placeholder="Enter vehicle authorized payload"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Length (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="newVehicle.length"
              placeholder="Enter vehicle length"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Width (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="newVehicle.width"
              placeholder="Enter vehicle width"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Height (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="newVehicle.height"
              placeholder="Enter vehicle height"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Fuel Type</label>
            <v-select
              v-model="newVehicle.fuelTypeId"
              label="name"
              :options="fuelType"
              :reduce="(fuelType) => fuelType.id"
              placeholder="Select fuel type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Capacity (L)</label>
            <input
              type="number"
              class="form-control"
              v-model="newVehicle.fuelCapacity"
              placeholder="Enter vehicle fuel capacity"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Comsumption (km/L)</label>
            <input
              type="number"
              class="form-control"
              v-model="newVehicle.fuelConsumption"
              placeholder="Enter vehicle fuel consumption"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Company</label>
            <v-select
              v-model="newVehicle.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Select Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Vehicle Type</label>
            <v-select
              v-model="newVehicle.vehicleTypeId"
              label="name"
              :options="vehicleType"
              :reduce="(vehicleType) => vehicleType.id"
              placeholder="Select Vehicle Type"
            ></v-select>
          </div>
        </form>
      </b-modal>
      <!-- Update Vehicle Modal -->
      <b-modal
        no-close-on-backdrop
        scrollable
        title="Update Vehicle"
        ok-title="Save"
        class="modal fade"
        id="updateVehicleModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleUpdateVehicle"
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            v-if="editVehicle.activityStatus.id == 1"
            size="sm"
            variant="danger"
            @click="hide(handleDeactivateVehicle())"
            >Deactivate</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
        </template>
        <form>
          <div class="form-group">
            <label for="">Registration Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editVehicle.registrationNumber"
              placeholder="Enter vehicle registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Make</label>
            <v-select
              v-model="editVehicle.vehicleMakeId"
              label="name"
              :options="vehicleMake"
              :reduce="(vehicleMake) => vehicleMake.id"
              placeholder="Select Vehicle Make"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Year Model</label>
            <input
              type="number"
              min="1900"
              class="form-control"
              v-model="editVehicle.yearModel"
              placeholder="Enter vehicle model year"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Chassis Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editVehicle.chassisNumber"
              placeholder="Enter vehicle chassis number"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Model Configuration</label>
            <input
              type="text"
              class="form-control"
              v-model="editVehicle.modelConfiguration"
              placeholder="Enter vehicle configuration model"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Transmission Type</label>
            <v-select
              v-model="editVehicle.vehicleTransmissionTypeId"
              label="name"
              :options="vehicleTransmissionType"
              :reduce="(vehicleTransmissionType) => vehicleTransmissionType.id"
              placeholder="Select vehicle transmission type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Engine Size (kW)</label>
            <input
              type="number"
              class="form-control"
              v-model="editVehicle.engineSize"
              placeholder="Enter vehicle engine size"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Autorized Payload (T)</label>
            <input
              type="text"
              class="form-control"
              v-model="editVehicle.authorizedPayload"
              placeholder="Enter vehicle authorized payload"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Length (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="editVehicle.length"
              placeholder="Enter vehicle length"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Width (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="editVehicle.width"
              placeholder="Enter vehicle width"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Height (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="editVehicle.height"
              placeholder="Enter vehicle height"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Fuel Type</label>
            <v-select
              v-model="editVehicle.fuelTypeId"
              label="name"
              :options="fuelType"
              :reduce="(fuelType) => fuelType.id"
              placeholder="Select fuel type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Capacity (L)</label>
            <input
              type="number"
              class="form-control"
              v-model="editVehicle.fuelCapacity"
              placeholder="Enter vehicle fuel capacity"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Vehicle Fuel Comsumption (km/L)</label>
            <input
              type="number"
              class="form-control"
              v-model="editVehicle.fuelConsumption"
              placeholder="Enter vehicle fuel consumption"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Company</label>
            <v-select
              v-model="editVehicle.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Select Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="">Vehicle Type</label>
            <v-select
              v-model="editVehicle.vehicleTypeId"
              label="name"
              :options="vehicleType"
              :reduce="(vehicleType) => vehicleType.id"
              placeholder="Select Vehicle Type"
            ></v-select>
          </div>
        </form>
      </b-modal>
      <!-- Inactive Vehicle Modal -->
      <b-modal
        no-close-on-backdrop
        scrollable
        title="Inactive Vehicle"
        ok-title="Activate"
        class="modal fade"
        id="inactiveVehicleModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleActivateVehicle"
      >
        <h6>Reg Number</h6>
        <p>{{ editVehicle.registrationNumber }}</p>

        <h6>Company</h6>
        <p>{{ editVehicle.company.name }}</p>

        <h6>Vehicle Type</h6>
        <p>{{ editVehicle.vehicleType.name }}</p>
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
      vehicles: [],
      vehicleType: [],
      vehicleMake: [],
      vehicleTransmissionType: [],
      fuelType: [],
      company: [],
      vehicleFields: [
        { key: "registrationNumber" },
        //{ key: "company.name", label: "Company" },
        { key: "vehicleMake.name", label: "Vehicle Make" },
        { key: "yearModel" },
        { key: "modelConfiguration" },
        { key: "vehicleType.name", label: "Vehicle Type" },
        { key: "activityStatus.name", label: "Activity Status" },
      ],
      tableFilter: null,
      tableHeadVariant: "dark",
      newVehicle: {},
      editVehicle: {
        id: "",
        registrationNumber: "",
        vehicleMakeId: "",
        vehicleTypeId: "",
        company: "",
        companyId: "",
        vehicleMake: "",
        vehicleType: "",
        vehicleTransmissionType: "",
        activityStatus: "",
      },
    };
  },
  computed: {
    activeVehicles() {
      return this.vehicles.filter(
        (vehicle) =>
          vehicle.activityStatus.id === 1 || vehicle.activityStatus.id === 2 //or workshop
      );
    },
    coachVehicles() {
      return this.vehicles.filter(
        (vehicle) => vehicle.company.id === 1 && vehicle.activityStatus.id !== 3
      );
    },
    fleetVehicles() {
      return this.vehicles.filter(
        (vehicle) => vehicle.company.id === 2 && vehicle.activityStatus.id !== 3
      );
    },
    wheelsVehicles() {
      return this.vehicles.filter(
        (vehicle) => vehicle.company.id === 3 && vehicle.activityStatus.id !== 3
      );
    },
    inactiveVehicles() {
      return this.vehicles.filter((vehicle) => vehicle.activityStatus.id === 3);
    },
    sortOptions() {
      // Create an options list from our fields
      return this.vehicleFields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
    },
  },
  mounted() {
    this.getVehicles();
  },
  methods: {
    getVehicles() {
      this.loading = true;
      api.get("vehicles").then(({ data }) => {
        this.vehicles = data.vehicles;
        this.vehicleType = data.vehicleType;
        this.vehicleMake = data.vehicleMake;
        this.vehicleTransmissionType = data.vehicleTransmissionType;
        this.fuelType = data.fuelType;
        this.company = data.company;
        this.loading = false;
      });
    },

    handleCreateVehicle(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createVehicle();
    },
    createVehicle() {
      api
        .post("vehicles", this.newVehicle)
        .then((res) => console.log("new vehicle added"));

      this.$nextTick(() => {
        this.$bvModal.hide("newVehicleModal");
        this.getVehicles();
      });
    },
    vehicleInfo(item, button) {
      //console.log(item);
      this.editVehicle.id = item.id;
      this.editVehicle.registrationNumber = item.registrationNumber;
      this.editVehicle.vehicleMakeId = item.vehicleMake.id;
      this.editVehicle.yearModel = item.yearModel;
      this.editVehicle.chassisNumber = item.chassisNumber;
      this.editVehicle.modelConfiguration = item.modelConfiguration;
      this.editVehicle.engineSize = item.engineSize;
      this.editVehicle.authorizedPayload = item.authorizedPayload;
      this.editVehicle.length = item.length;
      this.editVehicle.width = item.width;
      this.editVehicle.height = item.height;
      this.editVehicle.fuelTypeId = item.fuelType.id;
      this.editVehicle.fuelCapacity = item.fuelCapacity;
      this.editVehicle.fuelConsumption = item.fuelConsumption;
      this.editVehicle.vehicleTransmissionTypeId =
        item.vehicleTransmissionType.id;
      this.editVehicle.companyId = item.company.id;
      this.editVehicle.vehicleTypeId = item.vehicleType.id;
      //this.editVehicle.activityStatusId = item.activityStatus.id;
      this.$root.$emit("bv::show::modal", "updateVehicleModal", button);
    },
    handleUpdateVehicle(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateVehicle();
    },
    async updateVehicle() {
      try {
        await api.patch("vehicles/" + this.editVehicle.id, this.editVehicle);
        this.$nextTick(() => {
          this.$bvModal.hide("updateVehicleModal");
          this.getVehicles();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleDeactivateVehicle() {
      this.deactivateVehicle();
    },
    async deactivateVehicle() {
      try {
        await api.patch("switch_vehicle_activity/" + this.editVehicle.id, {
          activityStatusId: 3,
        });
        console.log("vehicle deactivated");
        this.$nextTick(() => {
          this.$bvModal.hide("updateVehicleModal");
          this.getVehicles();
        });
      } catch (error) {
        console.log(error);
      }
    },
    inactiveVehicleInfo(item, button) {
      this.editVehicle.id = item.id;
      this.editVehicle.registrationNumber = item.registrationNumber;
      this.editVehicle.company = item.company;
      this.editVehicle.vehicleType = item.vehicleType;
      this.editVehicle.activityStatus = item.activityStatus;
      this.$root.$emit("bv::show::modal", "inactiveVehicleModal", button);
    },
    handleActivateVehicle() {
      this.activateVehicle();
    },
    async activateVehicle() {
      try {
        await api.patch("switch_vehicle_activity/" + this.editVehicle.id, {
          activityStatusId: 1,
        });
        console.log("Vehicle activated");
        this.$nextTick(() => {
          this.$bvModal.hide("inactiveVehicleModal");
          this.getVehicles();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>