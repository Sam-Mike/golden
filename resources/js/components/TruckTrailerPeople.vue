<template>
  <div>
    <div class="card shadow mb-4">
      <div style="padding: 20px">
        <!--inserting the list here-->
        <div calss="row">
          <button
            type="button"
            style="float: right"
            class="btn btn-primary"
            onclick="setAllocationData()"
          >
            Create Allocation
          </button>
        </div>
        <div class="row">
          <div class="input-group mb-1 col">
            <div class="col-md-8">
              <select
                v-model="allocation.selectedClient"
                class="custom-select"
                id="clientSelector"
              >
                <option :value="undefined" disabled>Choose Client</option>
                <option
                  v-for="client in truckTrailerDriver.clients"
                  :key="client.id"
                  :value="client.id"
                >
                  {{ client.client_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="input-group mb-1 col">
            <div class="col-md-8">
              <select
                v-model="allocation.selectedCargo"
                class="custom-select"
                id="cargoSelector"
              >
                <option :value="undefined" disabled>Choose Cargo</option>
                <option
                  v-for="cargo in truckTrailerDriver.cargo"
                  :key="cargo.id"
                  :value="cargo.id"
                >
                  {{ cargo.cargo_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="input-group mb-1 col">
            <div class="col-md-8">
              <select
                v-model="allocation.selectedLocation"
                class="custom-select"
                id="destinationSelector"
              >
                <option value="undefined" disabled>Choose Destination</option>
                <option
                  v-for="location in truckTrailerDriver.locations"
                  :key="location.id"
                  :value="location.id"
                >
                  {{ location.location_name }}
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Allocation Tabs -->
    <div>
      <b-card no-body>
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
                    v-b-modal.addTruckTrailerDriver
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
                        v-for="ttp in truckTrailerDriver.truck_trailer_people"
                        :key="ttp.id"
                      >
                        <td>
                          <input
                            class="form-check-input ml-2"
                            type="checkbox"
                            :value="ttp.id"
                            :id="ttp.id"
                            v-model="allocation.checkedTtp"
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
                    v-b-modal.addTruckTrailerDriver
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
                        v-for="ttp in truckTrailerDriver.truck_trailer_people"
                        :key="ttp.id"
                      >
                        <td>
                          <input
                            class="form-check-input ml-2"
                            type="checkbox"
                            :value="ttp.id"
                            :id="ttp.id"
                            v-model="allocation.checkedTtp"
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
                    v-b-modal.addTruckTrailerDriver
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
                        v-for="ttp in truckTrailerDriver.truck_trailer_people"
                        :key="ttp.id"
                      >
                        <td>
                          <input
                            class="form-check-input ml-2"
                            type="checkbox"
                            :value="ttp.id"
                            :id="ttp.id"
                            v-model="allocation.checkedTtp"
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
    </div>
   
    <!-- Modal to add TruckTrailerDriver combination -->
    <b-modal
      class="modal fade"
      id="addTruckTrailerDriver"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      ok-title="Save"
      title=" New Truck Trailer Driver"
      @ok="handleOk"
      b-v-modal.addTruckTrailerDriver
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
                  v-model="newTruckTrailerDriver.truck"
                  placeholder="Choose truck"
                  required
                >
                  <option
                    v-for="truck in truckTrailerDriver.trucks"
                    :key="truck.id"
                    :value="truck.id"
                  >
                    {{ truck.reg_number }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Trailer</label>
                <select
                  type="email"
                  class="form-control"
                  v-model="newTruckTrailerDriver.trailer"
                  placeholder="Choose trailer"
                  required
                >
                  <option
                    v-for="trailer in truckTrailerDriver.trailers"
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
                  v-model="newTruckTrailerDriver.driver"
                  placeholder="Choose Person"
                  required
                >
                  <option
                    v-for="person in truckTrailerDriver.people"
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      truckTrailerDriver: [],
      newTruckTrailerDriver: {
        truck: "",
        trailer: "",
        driver: "",
      },
      allocation: {
        selectedClient: "",
        selectedCargo: "",
        selectedLocation: "",
        checkedTtp: [], //check with the controller accepting the arrays for allocation
      },
    };
  },
  computed:{
    
  },
  mounted() {
    this.getTruckTrailerDrivers();
  },
  methods: {
    getTruckTrailerDrivers() {
      axios
        .get("http://localhost:8000/api/truck_trailer_people")
        .then(({ data }) => {
          this.truckTrailerDriver = data;
        });
      console.log("here i am");
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.sendAllocationData();
    },

    sendAllocationData() {
      axios
        .post("http://127.0.0.1:8000/api/allocation", {
          cargoId: this.allocation.selectedCargo,
          clientId: this.allocation.selectedClient,
          destinationId: this.allocation.selectedLocation,
          trucksList: this.allocation.checkedTtp,
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