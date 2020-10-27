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
            onclick="setAllocationData()"
          >
            Create Allocation
          </button>
          <div class="row">
            <div class="input-group mb-1 col">
              <div class="col-md-8">
                <v-select
                  v-model="newAllocation.clientId"
                  label="client_name"
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
                  label="cargo_name"
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
                  label="location_name"
                  :options="locations"
                  :reduce="(locations) => locations.id"
                  placeholder="Choose Destination"
                ></v-select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Allocation Tabs -->
      <b-card no-body>
        <!-- COACH TAB -->
        <b-tabs content-class="mt-3">
          <b-tab title="Golden Coach" active>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Allocations</h6>
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
                  <table
                    class="table table-bordered table-sm table-striped table-hover"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="thead-dark">
                      <tr>
                        <th></th>
                        <th>TRUCK REGISTRATION</th>
                        <th>TRAILER</th>
                        <th>TL NUMBER</th>
                        <th>DRIVER</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="ttp in coachTruckTrailerDriver()"
                        :key="ttp.id"
                      >
                        <td>
                          <input
                            class="form-check-input ml-2"
                            type="checkbox"
                            :value="ttp.id"
                            :id="ttp.id"
                            v-model="newAllocation.checkedTruckTrailerDriver"
                          />
                        </td>
                        <td>{{ ttp.trucks.reg_number }}</td>
                        <td>{{ ttp.trailers.reg_number }}</td>
                        <td>{{ ttp.trailers.tl_number }}</td>
                        <td>
                          {{ ttp.people.first_name }}
                          {{ ttp.people.middle_name }}
                          {{ ttp.people.last_name }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
                  <table
                    class="table table-bordered table-sm table-striped table-hover"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="thead-dark">
                      <tr>
                        <th></th>
                        <th>TRUCK REGISTRATION</th>
                        <th>TRAILER</th>
                        <th>TL NUMBER</th>
                        <th>DRIVER</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr
                        v-for="ttp in fleetTruckTrailerDriver()"
                        :key="ttp.id"
                      >
                        <td>
                          <input
                            class="form-check-input ml-2"
                            type="checkbox"
                            :value="ttp.id"
                            :id="ttp.id"
                            v-model="newAllocation.checkedTruckTrailerDriver"
                          />
                        </td>
                        <td>{{ ttp.trucks.reg_number }}</td>
                        <td>{{ ttp.trailers.reg_number }}</td>
                        <td>{{ ttp.trailers.tl_number }}</td>
                        <td>
                          {{ ttp.people.first_name }}
                          {{ ttp.people.middle_name }}
                          {{ ttp.people.last_name }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
                  <table
                    class="table table-bordered table-sm table-striped table-hover"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="thead-dark">
                      <tr>
                        <th></th>
                        <th>TRUCK REGISTRATION</th>
                        <th>TRAILER</th>
                        <th>TL NUMBER</th>
                        <th>DRIVER</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr
                        v-for="ttp in wheelsTruckTrailerDriver()"
                        :key="ttp.id"
                      >
                        <td>
                          <input
                            class="form-check-input ml-2"
                            type="checkbox"
                            :value="ttp.id"
                            :id="ttp.id"
                            v-model="newAllocation.checkedTruckTrailerDriver"
                          />
                        </td>
                        <td>{{ ttp.trucks.reg_number }}</td>
                        <td>{{ ttp.trailers.reg_number }}</td>
                        <td>{{ ttp.trailers.tl_number }}</td>
                        <td>
                          {{ ttp.people.first_name }}
                          {{ ttp.people.middle_name }}
                          {{ ttp.people.last_name }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </b-tab>
        </b-tabs>
      </b-card>

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
        @ok="handleOk"
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
                      {{ coachTruck.reg_number }}
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
                      {{ trailer.tl_number }}
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
                      {{ person.first_name }} {{ person.middle_name }}
                      {{ person.last_name }}
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
        @ok="handleOk"
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
                      {{ fleetTruck.reg_number }}
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
                      {{ trailer.tl_number }}
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
                      {{ person.first_name }} {{ person.middle_name }}
                      {{ person.last_name }}
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
        @ok="handleOk"
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
                      {{ wheelsTruck.reg_number }}
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
                      {{ trailer.tl_number }}
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
                      {{ person.first_name }} {{ person.middle_name }}
                      {{ person.last_name }}
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
      loading: false,
      isSuccess: false,
      truckTrailerDrivers: [],
      truckTrailerDriversFields: [
        {},{}
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
        checkedTruckTrailerDriver: [], //check with the controller accepting the arrays for allocation
      },
    };
  },
  created() {
    this.getTruckTrailerDrivers();
  },
  methods: {
    getTruckTrailerDrivers() {
      this.loading = true;
      this.isSuccess = false;
      axios
        .get("http://localhost:8000/api/truck_trailer_driver")
        .then(({ data }) => {
          this.truckTrailerDrivers = data.truck_trailer_driver;
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

    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.submitTruckTrailerPeople();
    },

    submitTruckTrailerPeople() {
      axios
        .post("http://127.0.0.1:8000/api/truck_trailer_driver", {
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
    itemVisible(item) {
      return item.client_name
        .toLowerCase()
        .includes(this.clients.toLowerCase());
    },
    // compute TTP trucks by company and add render to ttp table for allocation process
    coachTruckTrailerDriver() {
      return this.truckTrailerDrivers.filter(
        (allTruckTrailerDriver) => allTruckTrailerDriver.trucks.company_id === 1
      );
    },
    fleetTruckTrailerDriver() {
      return this.truckTrailerDrivers.filter(
        (allTruckTrailerDriver) => allTruckTrailerDriver.trucks.company_id === 2
      );
    },
    wheelsTruckTrailerDriver() {
      return this.truckTrailerDrivers.filter(
        (allTruckTrailerDriver) => allTruckTrailerDriver.trucks.company_id === 3
      );
    },
    //compute truck_trailer_driver by company name and render to company tabs to be selected during TTP allocation
    coachTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company_id === 1 && allTrucks.allocation_status_id === 1
      );
    },
    fleetTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company_id === 2 && allTrucks.allocation_status_id === 1
      );
    },
    wheelsTrucks() {
      return this.trucks.filter(
        (allTrucks) =>
          allTrucks.company_id === 3 && allTrucks.allocation_status_id === 1
      );
    },

    sendAllocationData() {
      axios
        .post("http://127.0.0.1:8000/api/allocation", {
          cargoId: this.newAllocation.cargoId,
          clientId: this.newAllocation.clientlId,
          destinationId: this.newAllocation.destinationLocationId,
          truckTrailerDriverList: this.newAllocation.checkedTruckTrailerDriver,
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error.response);
        });
      this.$nextTick(() => {
        this.$bvModal.hide("addTruckTrailerDriver");
        this.getTruckTrailerDrivers();
      });
    },
  },
};
</script>