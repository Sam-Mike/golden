<template>
  <div>
    <b-overlay :show="loading">
      <div class="card shadow mb-4">
        <div id="tripAllocation">
          <!--inserting the list here-->
          <div class="row justify-content-end">
            <div class="input-group mb-1 col">
              <div class="col-md-10">
                <v-select
                  v-model="newTrip.clientId"
                  label="name"
                  :options="clients"
                  :reduce="(clients) => clients.id"
                  placeholder="Select Client"
                ></v-select>
                <a
                  class="quickAddLink"
                  href="#"
                  @click="$bvModal.show('newClientModal')"
                >
                  &#65291; New Client</a
                >
              </div>
            </div>
            <div class="input-group mb-1 col">
              <div class="col-md-10">
                <v-select
                  v-model="newTrip.cargoId"
                  label="name"
                  :options="cargo"
                  :reduce="(cargo) => cargo.id"
                  placeholder="Select Cargo"
                ></v-select>
                <a
                  class="quickAddLink"
                  href="#"
                  @click="$bvModal.show('newCargoModal')"
                >
                  &#65291; New Cargo</a
                >
              </div>
            </div>
            <div class="input-group mb-1 col">
              <div class="col-md-10">
                <v-select
                  v-model="newTrip.destinationId"
                  label="name"
                  :options="locations"
                  :reduce="(locations) => locations.id"
                  placeholder="Select Destination"
                ></v-select>
                <a
                  class="quickAddLink"
                  href="#"
                  @click="$bvModal.show('newDestinationModal')"
                >
                  &#xFF0B; New Destination</a
                >
              </div>
            </div>
            <div class="input-group mb-1 col">
              <div class="col-md-10">
                <v-select
                  v-model="newTrip.tripClassId"
                  label="name"
                  :options="tripClass"
                  :reduce="(tripClass) => tripClass.id"
                  placeholder="Select Trip Class"
                ></v-select>
              </div>
            </div>
            <div class="input-group mb-1 col">
              <div class="col-md-10">
                <b-button
                  size="sm"
                  variant="primary"
                  type="button"
                  class="btn btn-primary"
                  @click="sendTripData()"
                >
                  Create Trip
                </b-button>
              </div>
            </div>
          </div>
        </div>
        <b-tabs
          active-nav-item-class="font-weight-bold text-uppercase"
        >
          <!-- COACH TAB -->
          <b-tab title="Coach" active>
            <div class="card-header py-2">
              <div class="d-flex row justify-content-end">
                <b-button
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newCoachAllocationModal
                >
                  New Allocation
                </b-button>
              </div>
            </div>
            <!-- <div class="card-body"> -->
            <div class="table-responsive">
              <!-- dataTable -->
              <b-table
                class="table-list"
                bordered
                striped
                hover
                :small="true"
                :items="coachAllocations"
                :fields="allocationsFields"
                :head-variant="tableHeadVariant"
                sticky-header="41vh"
                @row-clicked="allocationInfo"
              >
                <template #cell(select)="methods"
                  ><b-form-checkbox
                    v-model="newTrip.checkedAllocations"
                    :value="methods.item.id"
                    unchecked-value=""
                  ></b-form-checkbox
                ></template>
                <template #cell(driverName)="methods">
                  {{ methods.item.driver.firstName }}
                  {{ methods.item.driver.middleName }}
                  {{ methods.item.driver.lastName }}
                </template>
              </b-table>
            </div>
            <!-- </div> -->
          </b-tab>
          <!-- FLEET TAB -->
          <b-tab title="Fleet">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b-button
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  v-b-modal.newFleetAllocationModal
                >
                  New Allocation
                </b-button>
              </div>
            </div>
            <!-- <div class="card-body"> -->
            <div class="table-responsive">
              <b-table
                class="table-list"
                bordered
                striped
                hover
                :small="true"
                :items="fleetAllocations"
                :fields="allocationsFields"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                @row-clicked="allocationInfo"
              >
                <template #cell(select)="methods"
                  ><b-form-checkbox
                    v-model="newTrip.checkedAllocations"
                    :value="methods.item.id"
                    unchecked-value=""
                  ></b-form-checkbox
                ></template>
                <template #cell(driverName)="methods">
                  {{ methods.item.driver.firstName }}
                  {{ methods.item.driver.middleName }}
                  {{ methods.item.driver.lastName }}
                </template>
              </b-table>
            </div>
            <!-- </div> -->
          </b-tab>
          <!-- WHEELS TAB -->
          <b-tab title="Wheels">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b-button
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  v-b-modal.newWheelsAllocationModal
                >
                  New Allocation
                </b-button>
              </div>
            </div>
            <!-- <div class="card-body"> -->
            <div class="table-responsive">
              <b-table
                class="table-list"
                bordered
                striped
                hover
                :small="true"
                :items="wheelsAllocations"
                :fields="allocationsFields"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                @row-clicked="allocationInfo"
              >
                <template #cell(select)="methods"
                  ><b-form-checkbox
                    v-model="newTrip.checkedAllocations"
                    :value="methods.item.id"
                    unchecked-value=""
                  ></b-form-checkbox
                ></template>
                <template #cell(driverName)="methods">
                  {{ methods.item.driver.firstName }}
                  {{ methods.item.driver.middleName }}
                  {{ methods.item.driver.lastName }}
                </template>
              </b-table>
            </div>
            <!-- </div> -->
          </b-tab>
        </b-tabs>
      </div>
      <!-- Allocation Tabs -->

      <!-- Modal to create Allocation combination for COACH TRUCKS -->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="newCoachAllocationModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Allocation"
        @ok="handleCreateAllocation"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="submitAllocation">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <v-select
                    v-model="newAllocation.vehicleId"
                    label="registrationNumber"
                    :options="coachVehicles"
                    :reduce="(coachVehicles) => coachVehicles.id"
                    placeholder="Select Truck"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <v-select
                    v-model="newAllocation.trailerId"
                    label="registrationNumber"
                    :options="unallocatedTrailers"
                    :reduce="(trailers) => trailers.id"
                    placeholder="Select Trailer"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="search">Driver</label>
                  <v-select
                    v-model="newAllocation.driverId"
                    :options="unallocatedDrivers"
                    label="firstName"
                    :filterBy="driverSearch"
                    :reduce="(drivers) => drivers.id"
                    placeholder="Select Driver"
                  >
                    <template v-slot:option="option">
                      {{ option.firstName }}
                      {{ option.middleName }}
                      {{ option.lastName }}
                    </template>
                  </v-select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to create Allocation combination for FLEET TRUCKS -->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="newFleetAllocationModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Allocation"
        @ok="handleCreateAllocation"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="submitAllocation">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <v-select
                    v-model="newAllocation.vehicleId"
                    label="registrationNumber"
                    :options="fleetVehicles"
                    :reduce="(fleetVehicles) => fleetVehicles.id"
                    placeholder="Select Truck"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <v-select
                    v-model="newAllocation.trailerId"
                    label="registrationNumber"
                    :options="unallocatedTrailers"
                    :reduce="(trailers) => trailers.id"
                    placeholder="Select Trailer"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <v-select
                    v-model="newAllocation.driverId"
                    :options="unallocatedDrivers"
                    label="firstName"
                    :filterBy="driverSearch"
                    :reduce="(drivers) => drivers.id"
                    placeholder="Select Driver"
                  >
                    <template v-slot:option="option">
                      {{ option.firstName }}
                      {{ option.middleName }}
                      {{ option.lastName }}
                    </template>
                  </v-select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to create Allocation combination for WHEELS TRUCKS -->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="newWheelsAllocationModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Allocation"
        @ok="handleCreateAllocation"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="createAllocation">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <v-select
                    v-model="newAllocation.vehicleId"
                    label="registrationNumber"
                    :options="wheelsVehicles"
                    :reduce="(wheelsVehicles) => wheelsVehicles.id"
                    placeholder="Select Truck"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <v-select
                    v-model="newAllocation.trailerId"
                    label="registrationNumber"
                    :options="unallocatedTrailers"
                    :reduce="(trailers) => trailers.id"
                    placeholder="Select Trailer"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <v-select
                    v-model="newAllocation.driverId"
                    :options="unallocatedDrivers"
                    label="firstName"
                    :filterBy="driverSearch"
                    :reduce="(drivers) => drivers.id"
                    placeholder="Select Driver"
                  >
                    <template v-slot:option="option">
                      {{ option.firstName }}
                      {{ option.middleName }}
                      {{ option.lastName }}
                    </template>
                  </v-select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to update/delete Allocation combinations-->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="updateAllocationModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        title=" Update Allocation"
        ok-title="Delete"
        ok-variant="danger"
        @ok="handleDeleteAllocation"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h6>Truck</h6>
              <p>{{ editAllocation.vehicle.registrationNumber }}</p>

              <h6>Trailer</h6>
              <p>{{ editAllocation.trailer.tlNumber }}</p>

              <h6>Driver</h6>
              <p>
                {{ editAllocation.driver.firstName }}
                {{ editAllocation.driver.middleName }}
                {{ editAllocation.driver.lastName }}
              </p>
            </div>
          </div>
        </div>
      </b-modal>
      <!-- modal to quickly add new client-->
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
      <!-- modal to add new cargo-->
      <b-modal
        ok-title="Save"
        tall
        title="New Cargo"
        class="modal fade"
        button-size="sm"
        id="newCargoModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleCreateCargo"
      >
        <form ref="form" @submit.stop.prevent="createCargo">
          <b-form-group label="Name" invalid-feedback="Name is required">
            <input
              id="client-name"
              type="text"
              class="form-control"
              v-model="newCargo.name"
              placeholder="Enter cargo name"
              required
            />
          </b-form-group>
          <b-form-group label="Cargo Type">
            <v-select
              v-model="newCargo.cargoTypeId"
              label="name"
              :options="cargoType"
              :reduce="(cargoType) => cargoType.id"
              placeholder="Select Cargo Type"
            ></v-select>
          </b-form-group>
          <b-form-group label="Hazard Class">
            <v-select
              v-model="newCargo.hazardClassId"
              label="name"
              :options="hazardClass"
              :reduce="(hazardClass) => hazardClass.id"
              placeholder="Select hazard Class"
            ></v-select>
          </b-form-group>
        </form>
      </b-modal>
      <!-- modal to add new destination-->
      <b-modal
        ok-title="Save"
        scrollable
        title="New Destination"
        class="modal fade"
        button-size="sm"
        id="newDestinationModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleCreateDestination"
      >
        <form ref="form" @submit.stop.prevent="createDestination">
          <b-form-group label="Name" invalid-feedback="Name is required">
            <input
              id="client-name"
              type="text"
              class="form-control"
              v-model="newDestination.name"
              placeholder="Enter destination name"
              required
            />
          </b-form-group>
        </form>
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
      isSuccess: false,
      allocations: [],
      allocationsFields: [
        { key: "select" },
        { key: "vehicle.registrationNumber", label: "Truck" },
        { key: "trailer.registrationNumber", label: "Trailer" },
        { key: "driverName", label: "Driver" },
        { key: "activityStatus.name", label: "Activity Status" },
      ],
      tableHeadVariant: "dark",
      company: [],
      clients: [],
      cargo: [],
      cargoType: [],
      hazardClass: [],
      locations: [],
      vehicles: [],
      trailers: [],
      drivers: [],
      tripClass: [],
      newAllocation: {},
      newTrip: {
        clientId: "",
        cargoId: "",
        destinationId: "",
        tripClassId: "",
        checkedAllocations: [],
      },
      editAllocation: {
        vehicle: "",
        trailer: "",
        driver: "",
      },
      newClient: {},
      newCargo: {},
      newDestination: {},
      driverSearch(option, label, search) {
        return (
          option.firstName.toLowerCase().indexOf(search.toLowerCase()) > -1 ||
          option.middleName.toLowerCase().indexOf(search.toLowerCase()) > -1 ||
          option.lastName.toLowerCase().indexOf(search.toLowerCase()) > -1
        );
      },
    };
  },
  computed: {
    // compute allocations by company and add render to allocations table for trip assignment
    coachAllocations() {
      return this.allocations.filter(
        (allocation) =>
          allocation.vehicle.company.id === 1 &&
          allocation.activityStatus.id === 1
      );
    },
    fleetAllocations() {
      return this.allocations.filter(
        (allocation) =>
          allocation.vehicle.company.id === 2 &&
          allocation.activityStatus.id === 1
      );
    },
    wheelsAllocations() {
      return this.allocations.filter(
        (allocation) =>
          allocation.vehicle.company.id === 3 &&
          allocation.activityStatus.id === 1
      );
    },
    //compute vehicles by company name and render to company tabs to be selected during allocation
    coachVehicles() {
      return this.vehicles.filter(
        (vehicle) => vehicle.company.id === 1 && vehicle.activityStatus.id === 1
      );
    },
    fleetVehicles() {
      return this.vehicles.filter(
        (vehicle) => vehicle.company.id === 2 && vehicle.activityStatus.id === 1
      );
    },
    wheelsVehicles() {
      return this.vehicles.filter(
        (vehicle) => vehicle.company.id === 3 && vehicle.activityStatus.id === 1
      );
    },
    unallocatedDrivers() {
      return this.drivers.filter((driver) => driver.activityStatus.id === 1);
    },
    unallocatedTrailers() {
      return this.trailers.filter((trailer) => trailer.activityStatus.id === 1);
    },
  },
  mounted() {
    this.getAllocations();
  },

  methods: {
    async getAllocations() {
      try {
        this.loading = true;
        this.isSuccess = false;
        const response = await api.get("allocations");
        this.allocations = response.data.allocations;
        this.company = response.data.company;
        this.clients = response.data.clients;
        this.cargo = response.data.cargo;
        this.cargoType = response.data.cargoType;
        this.hazardClass = response.data.hazardClass;
        this.locations = response.data.locations;
        this.vehicles = response.data.vehicles;
        this.trailers = response.data.trailers;
        this.drivers = response.data.drivers;
        this.tripClass = response.data.tripClass;
        this.isSuccess = true;
        this.loading = false;
      } catch (error) {
        console.log(error);
      }
    },

    handleCreateAllocation(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      this.createAllocation();
    },
    async createAllocation() {
      try {
        await api.post("/allocations", this.newAllocation);
        this.$nextTick(() => {
          this.$bvModal.hide("newCoachAllocationModal");
          this.$bvModal.hide("newFleetAllocationModal");
          this.$bvModal.hide("newWheelsAllocationModal");
          this.newAllocation = {};
          this.getAllocations();
        });
      } catch (error) {
        console.log(error);
      }
    },

    //creating trips
    async sendTripData() {
      try {
        await api.post("trips", this.newTrip);
        this.$nextTick(() => {
          this.getAllocations();
          this.newClient = {};
          this.newCargo = {};
          this.newDestination = {};
        });
      } catch (error) {
        console.log(error);
      }
    },
    // deleting Allocation
    allocationInfo(item, button) {
      this.editAllocation = item;
      this.$root.$emit("bv::show::modal", "updateAllocationModal", button);
    },
    handleDeleteAllocation(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      this.deleteFreeAllocation();
    },
    deleteFreeAllocation() {
      //allocation should be archived and not deleted
      api
        .delete("allocations/" + this.editAllocation.id)
        .then((response) => {
          console.log(response);
          console.log("allocation deleted");
        })
        .catch((error) => console.log(error));
      this.$nextTick(() => {
        this.$bvModal.hide("updateAllocationModal");
        this.getAllocations();
      });
    },
    handleCreateClient(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createClient();
    },
    async createClient() {
      try {
        await api.post("clients/", this.newClient);
        this.$nextTick(() => {
          this.$bvModal.hide("newClientModal");
          this.newClient = {};
          this.getAllocations();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleCreateCargo(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createCargo();
    },
    async createCargo() {
      try {
        await api.post("cargo/", this.newCargo);
        this.$nextTick(() => {
          this.$bvModal.hide("newCargoModal");
          this.newCargo = {};
          this.getAllocations();
        });
      } catch (error) {}
    },
    handleCreateDestination(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createDestination();
    },
    async createDestination() {
      try {
        await api.post("locations/", this.newDestination);
        this.$nextTick(() => {
          this.$bvModal.hide("newDestinationModal");
          this.newDestination = {};
          this.getAllocations();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>