<template>
  <div>
    <b-overlay :show="loading">
      <div class="card shadow mb-4">
        <div style="padding: 20px">
          <!--inserting the list here-->
          <b-button
            size="sm"
            variant="primary"
            type="button"
            style="float: right"
            class="btn btn-primary"
            @click="sendAllocationData()"
          >
            Create Allocation
          </b-button>
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
                    <b-button
                      size="sm"
                      variant="primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      v-b-modal.addCoachTruckTrailerDriverModal
                    >
                      Add TruckTrailerDriver
                    </b-button>
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
                        <b-button
                          size="sm"
                          @click="truckTrailerDriverInfo(row.item)"
                          class="mr-1"
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
                    <h6 class="m-0 font-weight-bold text-primary">
                      Allocations
                    </h6>
                    <b-button
                      size="sm"
                      variant="primary"
                      data-toggle="modal"
                      v-b-modal.addFleetTruckTrailerDriverModal
                    >
                      Add TruckTrailerDriver
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
                      :items="fleetTruckTrailerDrivers()"
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
                        <b-button
                          size="sm"
                          @click="truckTrailerDriverInfo(row.item)"
                          class="mr-1"
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
                    <h6 class="m-0 font-weight-bold text-primary">
                      Allocations
                    </h6>
                    <b-button
                      size="sm"
                      variant="primary"
                      data-toggle="modal"
                      v-b-modal.addWheelsTruckTrailerDriverModal
                    >
                      Add TruckTrailerDriver
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
                      :items="wheelsTruckTrailerDrivers()"
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
                        <b-button
                          size="sm"
                          @click="truckTrailerDriverInfo(row.item)"
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
      </div>
      <!-- Allocation Tabs -->

      <!-- Modal to create TruckTrailerDriver combination for COACH TRUCKS -->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="addCoachTruckTrailerDriverModal"
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
                  <v-select
                    v-model="newTruckTrailerDriver.truckId"
                    label="registrationNumber"
                    :options="coachTrucks()"
                    :reduce="(coachTrucks) => coachTrucks.id"
                    placeholder="Choose Truck"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <v-select
                    v-model="newTruckTrailerDriver.trailerId"
                    label="tlNumber"
                    :options="trailers"
                    :reduce="(trailers) => trailers.id"
                    placeholder="Choose Trailer"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="search">Driver</label>
                  <v-select
                    v-model="newTruckTrailerDriver.driverId"
                    :options="people"
                    label="firstName"
                    :filterBy="peopleSearch"
                    :reduce="(people) => people.id"
                    placeholder="Choose Driver"
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

      <!-- Modal to create TruckTrailerDriver combination for FLEET TRUCKS -->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="addFleetTruckTrailerDriverModal"
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
                  <v-select
                    v-model="newTruckTrailerDriver.truckId"
                    label="registrationNumber"
                    :options="fleetTrucks()"
                    :reduce="(fleetTrucks) => fleetTrucks.id"
                    placeholder="Choose Truck"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <v-select
                    v-model="newTruckTrailerDriver.trailerId"
                    label="tlNumber"
                    :options="trailers"
                    :reduce="(trailers) => trailers.id"
                    placeholder="Choose Trailer"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <v-select
                    v-model="newTruckTrailerDriver.driverId"
                    :options="people"
                    label="firstName"
                    :filterBy="peopleSearch"
                    :reduce="(people) => people.id"
                    placeholder="Choose Driver"
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

      <!-- Modal to create TruckTrailerDriver combination for WHEELS TRUCKS -->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="addWheelsTruckTrailerDriverModal"
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
              <form ref="form" @submit.stop.prevent="createTruckTrailerDriver">
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck</label>
                  <v-select
                    v-model="newTruckTrailerDriver.truckId"
                    label="registrationNumber"
                    :options="wheelsTrucks()"
                    :reduce="(fleetTrucks) => fleetTrucks.id"
                    placeholder="Choose Truck"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Trailer</label>
                  <v-select
                    v-model="newTruckTrailerDriver.trailerId"
                    label="tlNumber"
                    :options="trailers"
                    :reduce="(trailers) => trailers.id"
                    placeholder="Choose Trailer"
                  ></v-select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>
                  <v-select
                    v-model="newTruckTrailerDriver.driverId"
                    :options="people"
                    label="firstName"
                    :filterBy="peopleSearch"
                    :reduce="(people) => people.id"
                    placeholder="Choose Driver"
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

      <!-- Modal to update/delete truckTrailerDriver combinations-->
      <b-modal
        class="modal fade"
        button-size="sm"
        id="updateTruckTrailerDriverModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        title=" Update Truck Trailer Driver"
        ok-title="Delete"
        ok-variant="danger"
        @ok="handleDeleteTruckTrailerDriver"
        v-if="this.rowDetails == true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h6>Truck</h6>
              <p>{{ editTruckTrailerDriver.truck.registrationNumber }}</p>

              <h6>Trailer</h6>
              <p>{{ editTruckTrailerDriver.trailer.tlNumber }}</p>

              <h6>Driver</h6>
              <p>
                {{ editTruckTrailerDriver.driver.firstName }}
                {{ editTruckTrailerDriver.driver.middleName }}
                {{ editTruckTrailerDriver.driver.lastName }}
              </p>
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
        { key: "activityStatus.name", label: "Activity Status" },
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
      editTruckTrailerDriver: "",
      peopleSearch(option, label, search) {
        return (
          option.firstName.toLowerCase().indexOf(search.toLowerCase()) > -1 ||
          option.middleName.toLowerCase().indexOf(search.toLowerCase()) > -1 ||
          option.lastName.toLowerCase().indexOf(search.toLowerCase()) > -1
        );
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
      console.log("allocations loaded");
    },

    handleCreateTruckTrailerDriver(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      this.createTruckTrailerDriver();
    },

    createTruckTrailerDriver() {
      axios
        .post("http://127.0.0.1:8000/api/truckTrailerDriver", {
          truckId: this.newTruckTrailerDriver.truckId,
          trailerId: this.newTruckTrailerDriver.trailerId,
          driverId: this.newTruckTrailerDriver.driverId,
        })
        .then((res) => console.log("truck trailer driver added"))
        .catch((err) => res.err);
      this.$nextTick(() => {
        this.$bvModal.hide("addCoachTruckTrailerDriverModal");
        this.$bvModal.hide("addFleetTruckTrailerDriverModal");
        this.$bvModal.hide("addWheelsTruckTrailerDriverModal");
        this.getTruckTrailerDrivers();
      });
    },

    // compute allocation trucks by company and add render to ttp table for trip assignment
    coachTruckTrailerDrivers() {
      return this.truckTrailerDrivers.filter(
        (all) => all.truck.company.id === 1 && all.activityStatus.id === 1
      );
    },
    fleetTruckTrailerDrivers() {
      return this.truckTrailerDrivers.filter(
        (all) => all.truck.company.id === 2 && all.activityStatus.id === 1
      );
    },
    wheelsTruckTrailerDrivers() {
      return this.truckTrailerDrivers.filter(
        (all) => all.truck.company.id === 3 && all.activityStatus.id === 1
      );
    },
    //compute truck_trailer_driver by company name and render to company tabs to be selected during TTP allocation
    coachTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company.id === 1 && allTrucks.activityStatus.id === 1
      );
    },
    fleetTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company.id === 2 && allTrucks.activityStatus.id === 1
      );
    },
    wheelsTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company.id === 3 && allTrucks.activityStatus.id === 1
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
        this.$bvModal.hide("addTruckTrailerDriverModal");
        this.getTruckTrailerDrivers();
      });
    },
    // deleting Truck Trailer Drivers
    truckTrailerDriverInfo(item, button) {
      this.editTruckTrailerDriver = item;
      this.rowDetails = true;
      this.$root.$emit(
        "bv::show::modal",
        "updateTruckTrailerDriverModal",
        button
      );
    },
    handleDeleteTruckTrailerDriver(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      this.deleteTruckTrailerDriver();
    },
    deleteTruckTrailerDriver() {
      axios
        .delete(
          "http://127.0.0.1:8000/api/truckTrailerDriver/" +
            this.editTruckTrailerDriver.id
        )
        .then((res) => console.log("truck trailer driver deleted"))
        .catch((err) => res.err);
      this.$nextTick(() => {
        this.$bvModal.hide("updateTruckTrailerDriverModal");

        this.getTruckTrailerDrivers();
      });
    },
  },
};
</script>