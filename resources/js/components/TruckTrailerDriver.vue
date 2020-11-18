<template>
  <div>
    <b-overlay :show="loading">
      <div class="card shadow mb-4">
        <div style="padding: 20px">
          <!--inserting the list here-->
          <button
            type="button"
            style="float: right"
            class="btn btn-primary"
            @click="sendAllocationData()"
          >
            Create Allocation
          </button>
          <div class="row">
            <div class="input-group mb-1 col">
              <div class="col-md-8">
                <v-select
                  v-model="newAllocation.clientId"
                  label="name"
                  :options="clients"
                  :reduce="(clients) => clients.id"
                  placeholder="Choose Client"
                ></v-select>
              </div>
            </div>
            <div class="input-group mb-1 col">
              <div class="col-md-8">
                <v-select
                  v-model="newAllocation.cargoId"
                  label="name"
                  :options="cargo"
                  :reduce="(cargo) => cargo.id"
                  placeholder="Choose Cargo"
                ></v-select>
              </div>
            </div>
            <div class="input-group mb-1 col">
              <div class="col-md-8">
                <v-select
                  v-model="newAllocation.destinationLocationId"
                  label="name"
                  :options="locations"
                  :reduce="(locations) => locations.id"
                  placeholder="Choose Destination"
                ></v-select>
              </div>
            </div>
          </div>
        </div>
        <b-card no-body>
          <!-- COACH TAB -->
          <b-tabs content-class="mt-3">
            <b-tab title="Golden Coach" active>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="d-flex row justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Allocations
                    </h6>
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      v-b-modal.addGoldenCoachTruckTrailerDriver
                    >
                      Add TruckTrailerDriver
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- dataTable -->
                    <b-table
                      class="table-list"
                      responsive
                      bordered
                      striped
                      hover
                      :small="true"
                      :items="coachTruckTrailerDrivers()"
                      :fields="truckTrailerDriversFields"
                      :head-variant="tableHeadVariant"
                      :sticky-header="true"
                    >
                      <template #cell(select)="methods"
                        ><b-form-checkbox
                          v-model="newAllocation.checkedTruckTrailerDrivers"
                          :value="methods.item.id"
                          unchecked-value=""
                        ></b-form-checkbox
                      ></template>
                      <template #cell(driverName)="methods">
                        {{ methods.item.driver.firstName }}
                        {{ methods.item.driver.middleName }}
                        {{ methods.item.driver.lastName }}
                      </template>
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
            <!-- FLEET TAB -->
            <b-tab title="Golden Fleet">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="d-flex row justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      v-b-modal.addGoldenFleetTruckTrailerDriver
                    >
                      Add TruckTrailerDriver
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
                      :items="fleetTruckTrailerDrivers()"
                      :fields="truckTrailerDriversFields"
                      :head-variant="tableHeadVariant"
                      :sticky-header="true"
                    >
                      <template #cell(driverName)="methods">
                        {{ methods.item.driver.firstName }}
                        {{ methods.item.driver.middleName }}
                        {{ methods.item.driver.lastName }}
                      </template>
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
            <!-- WHEELS TAB -->
            <b-tab title="Golden Wheels">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="d-flex row justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      v-b-modal.addGoldenWheelsTruckTrailerDriver
                    >
                      Add TruckTrailerDriver
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
                      :items="wheelsTruckTrailerDrivers()"
                      :fields="truckTrailerDriversFields"
                      :head-variant="tableHeadVariant"
                      :sticky-header="true"
                    >
                      <template #cell(driverName)="methods">
                        {{ methods.item.driver.firstName }}
                        {{ methods.item.driver.middleName }}
                        {{ methods.item.driver.lastName }}
                      </template>
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
          </b-tabs>
        </b-card>
      </div>
      <!-- Allocation Tabs -->

      <!-- Modal to create TruckTrailerDriver combination for COACH TRUCKS -->
      <b-modal
        class="modal fade"
        id="addGoldenCoachTruckTrailerDriver"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Truck Trailer Driver"
        @ok="handleCreateTruckTrailerDriver"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="submitTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.truckId"
                    placeholder="Choose truck"
                    required
                  >
                    <option
                      v-for="coachTruck in coachTrucks()"
                      :key="coachTruck.id"
                      :value="coachTruck.id"
                    >
                      {{ coachTruck.registrationNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.trailerId"
                    placeholder="Choose trailer"
                    required
                  >
                    <option
                      v-for="trailer in trailers"
                      :key="trailer.id"
                      :value="trailer.id"
                    >
                      {{ trailer.tlNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.driverId"
                    placeholder="Choose Person"
                    required
                  >
                    <option
                      v-for="person in people"
                      :key="person.id"
                      :value="person.id"
                    >
                      {{ person.firstName }} {{ person.middleName }}
                      {{ person.lastName }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to create TruckTrailerDriver combination for FLEET TRUCKS -->
      <b-modal
        class="modal fade"
        id="addGoldenFleetTruckTrailerDriver"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Truck Trailer Driver"
        @ok="handleCreateTruckTrailerDriver"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="submitTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.truckId"
                    placeholder="Choose truck"
                    required
                  >
                    <option
                      v-for="fleetTruck in fleetTrucks()"
                      :key="fleetTruck.id"
                      :value="fleetTruck.id"
                    >
                      {{ fleetTruck.registrationNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.trailerId"
                    placeholder="Choose trailer"
                    required
                  >
                    <option
                      v-for="trailer in trailers"
                      :key="trailer.id"
                      :value="trailer.id"
                    >
                      {{ trailer.tlNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.driverId"
                    placeholder="Choose Person"
                    required
                  >
                    <option
                      v-for="person in people"
                      :key="person.id"
                      :value="person.id"
                    >
                      {{ person.firstName }} {{ person.middleName }}
                      {{ person.lastName }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to create TruckTrailerDriver combination for WHEELS TRUCKS -->
      <b-modal
        class="modal fade"
        id="addGoldenWheelsTruckTrailerDriver"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Truck Trailer Driver"
        @ok="handleCreateTruckTrailerDriver"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="submitTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.truckId"
                    placeholder="Choose truck"
                    required
                  >
                    <option
                      v-for="wheelsTruck in wheelsTrucks()"
                      :key="wheelsTruck.id"
                      :value="wheelsTruck.id"
                    >
                      {{ wheelsTruck.registrationNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.trailerId"
                    placeholder="Choose trailer"
                    required
                  >
                    <option
                      v-for="trailer in trailers"
                      :key="trailer.id"
                      :value="trailer.id"
                    >
                      {{ trailer.tlNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.driverId"
                    placeholder="Choose Person"
                    required
                  >
                    <option
                      v-for="person in people"
                      :key="person.id"
                      :value="person.id"
                    >
                      {{ person.firstName }} {{ person.middleName }}
                      {{ person.lastName }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to edit CoachTruckTrailerDriver combinations-->
      <b-modal
        class="modal fade"
        id="addGoldenWheelsTruckTrailerDriver"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Truck Trailer Driver"
        @ok="handleUpdateTruckTrailerDriver"
        v-if="this.rowDetails ==true"
      >
      <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            size="sm"
            variant="danger"
            @click="hide(handleDeleteTruckTrailerDriver())"
            >Delete</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
        </template>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="updateTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="editTruckTrailerDriver.truckId"
                    placeholder="Choose truck"
                    required
                  >
                    <option
                      v-for="wheelsTruck in coachTrucks()"
                      :key="wheelsTruck.id"
                      :value="wheelsTruck.id"
                    >
                      {{ wheelsTruck.registrationNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.trailerId"
                    placeholder="Choose trailer"
                    required
                  >
                    <option
                      v-for="trailer in trailers"
                      :key="trailer.id"
                      :value="trailer.id"
                    >
                      {{ trailer.tlNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.driverId"
                    placeholder="Choose Person"
                    required
                  >
                    <option
                      v-for="person in people"
                      :key="person.id"
                      :value="person.id"
                    >
                      {{ person.firstName }} {{ person.middleName }}
                      {{ person.lastName }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to edit wheelsTruckTrailerDriver combinations-->
      <b-modal
        class="modal fade"
        id="addGoldenWheelsTruckTrailerDriver"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Truck Trailer Driver"
        @ok="handleUpdateTruckTrailerDriver"
        v-if="this.rowDetails ==true"
      >
      <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            size="sm"
            variant="danger"
            @click="hide(handleDeleteTruckTrailerDriver())"
            >Delete</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
        </template>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="updateTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="editTruckTrailerDriver.truckId"
                    placeholder="Choose truck"
                    required
                  >
                    <option
                      v-for="wheelsTruck in wheelsTrucks()"
                      :key="wheelsTruck.id"
                      :value="wheelsTruck.id"
                    >
                      {{ wheelsTruck.registrationNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.trailerId"
                    placeholder="Choose trailer"
                    required
                  >
                    <option
                      v-for="trailer in trailers"
                      :key="trailer.id"
                      :value="trailer.id"
                    >
                      {{ trailer.tlNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.driverId"
                    placeholder="Choose Person"
                    required
                  >
                    <option
                      v-for="person in people"
                      :key="person.id"
                      :value="person.id"
                    >
                      {{ person.firstName }} {{ person.middleName }}
                      {{ person.lastName }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>

      <!-- Modal to edit FleetTruckTrailerDriver combinations-->
      <b-modal
        class="modal fade"
        id="addGoldenWheelsTruckTrailerDriver"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        title=" New Truck Trailer Driver"
        @ok="handleUpdateTruckTrailerDriver"
        v-if="this.rowDetails ==true"
      >
      <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            size="sm"
            variant="danger"
            @click="hide(handleDeleteTruckTrailerDriver())"
            >Delete</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
        </template>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <form ref="form" @submit.stop.prevent="updateTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="editTruckTrailerDriver.truckId"
                    placeholder="Choose truck"
                    required
                  >
                    <option
                      v-for="wheelsTruck in fleetTrucks()"
                      :key="wheelsTruck.id"
                      :value="wheelsTruck.id"
                    >
                      {{ wheelsTruck.registrationNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.trailerId"
                    placeholder="Choose trailer"
                    required
                  >
                    <option
                      v-for="trailer in trailers"
                      :key="trailer.id"
                      :value="trailer.id"
                    >
                      {{ trailer.tlNumber }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <select
                    type="email"
                    class="form-control"
                    v-model="newTruckTrailerDriver.driverId"
                    placeholder="Choose Person"
                    required
                  >
                    <option
                      v-for="person in people"
                      :key="person.id"
                      :value="person.id"
                    >
                      {{ person.firstName }} {{ person.middleName }}
                      {{ person.lastName }}
                    </option>
                  </select>
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
      rowDetails: false,
      loading: false,
      isSuccess: false,
      truckTrailerDrivers: [],
      truckTrailerDriversFields: [
        { key: "select" },
        { key: "truck.registrationNumber", label: "Truck" },
        { key: "trailer.tlNumber", label: "Trailer" },
        { key: "driverName", label: "Driver" },
        { label: "Assignment Status" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      company: [],
      clients: [],
      cargo: [],
      locations: [],
      trucks: [],
      trailers: [],
      people: [],
      newTruckTrailerDriver: {
        truckId: "",
        trailerId: "",
        driverId: "",
      },
      newAllocation: {
        clientId: "",
        cargoId: "",
        destinationLocationId: "",
        checkedTruckTrailerDrivers: [], //check with the controller accepting the arrays for allocation
      },
      editTruckTrailerDriver: {
        id: "updateTtpModal",
        content: "",
      },
    };
  },
  mounted() {
    this.getTruckTrailerDrivers();
  },

  methods: {
    getTruckTrailerDrivers() {
      this.loading = true;
      this.isSuccess = false;
      axios
        .get("http://localhost:8000/api/truckTrailerDriver")
        .then(({ data }) => {
          this.truckTrailerDrivers = data.truckTrailerDrivers;
          this.company = data.company;
          this.clients = data.clients;
          this.cargo = data.cargo;
          this.locations = data.locations;
          this.trucks = data.trucks;
          this.trailers = data.trailers;
          this.people = data.people;
          this.isSuccess = true;
        })
        .finally(() => (this.loading = false));
      console.log("gotten ttp");
    },

    handleCreateTruckTrailerDriver(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      this.createTruckTrailerPeople();
    },

    createTruckTrailerPeople() {
      axios
        .post("http://127.0.0.1:8000/api/truckTrailerDriver", {
          truckId: this.newTruckTrailerDriver.truckId,
          trailerId: this.newTruckTrailerDriver.trailerId,
          driverId: this.newTruckTrailerDriver.driverId,
        })
        .then((res) => console.log("truck trailer driver added"))
        .catch((err) => res.err);
      this.$nextTick(() => {
        this.$bvModal.hide("addGoldenCoachTruckTrailerDriver");
        this.$bvModal.hide("addGoldenFleetTruckTrailerDriver");
        this.$bvModal.hide("addGoldenWheelsTruckTrailerDriver");
        this.getTruckTrailerDrivers();
      });
    },

    // compute TTP trucks by company and add render to ttp table for allocation process
    coachTruckTrailerDrivers() {
      return this.truckTrailerDrivers.filter(
        (all) => all.truck.company.id === 1
      );
    },
    fleetTruckTrailerDrivers() {
      return this.truckTrailerDrivers.filter(
        (all) => all.truck.company.id === 2
      );
    },
    wheelsTruckTrailerDrivers() {
      return this.truckTrailerDrivers.filter(
        (all) => all.truck.company.id === 3
      );
    },
    //compute truck_trailer_driver by company name and render to company tabs to be selected during TTP allocation
    coachTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company.id === 1 && allTrucks.assignmentStatus.id === 1
      );
    },
    fleetTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company.id === 2 && allTrucks.assignmentStatus.id === 1
      );
    },
    wheelsTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company.id === 3 && allTrucks.assignmentStatus.id === 1
      );
    },

    //sending allocation
    sendAllocationData() {
      axios
        .post("http://127.0.0.1:8000/api/allocations", {
          cargoId: this.newAllocation.cargoId,
          clientId: this.newAllocation.clientId,
          destinationId: this.newAllocation.destinationLocationId,
          truckTrailerDriverList: this.newAllocation.checkedTruckTrailerDrivers,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error.response);
        });
      this.$nextTick(() => {
        this.$bvModal.hide("addTruckTrailerDriver");
        this.getTruckTrailerDrivers();
      });
    },
    //updating and or deleting Truck Trailer Drivers
    info(item, button) {
      this.editTruckTrailerDriver.content = item;
      this.rowDetails = true;
      this.$root.$emit(
        "bv::show::modal",
        this.editTruckTrailerDriver.id,
        button
      );
    },
    handleUpdateTruckTrailerDriver(bvModalEvt){
      this.bvModalEvt.preventDefault();
      this.updateTruckTrailerDriver();
    },
    updateTruckTrailerDriver() {
      axios
        .patch("http://127.0.0.1:8000/api/truckTrailerDriver/" + this.editTruckTrailerDriver.content.id, {
          truckId: this.editTruckTrailerDriver.content.truck.id,
          trailerId: this.editTruckTrailerDriver.content.trailer.id,
          driverId: this.editTruckTrailerDriver.content.driver.id,
        })
        .then((res) => console.log("truck trailer driver updated"))
        .catch((err) => res.err);
      this.$nextTick(() => {
        this.$bvModal.hide("updateTruckTrailerDriverModal");
        this.getTruckTrailerDrivers();
      });
    },
    handleDeleteTruckTrailerDriver(bvModalEvt){
      this.bvModalEvt.preventDefault();
      this.deleteTruckTrailerDriver();
    },
    deleteTruckTrailerDriver(){
      axios.delete("http://127.0.0.1:8000/api/truckTrailerDriver/" +this.editTruckTrailerDriver.content.id)
      .then();
    },
  },
};
</script>