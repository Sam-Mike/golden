<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs content-class="mt-2">
          <b-tab title="PENDING">
            <!-- TRIPS FOR TRIPS WITH PENDING INFORMATION -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Trips</h6>
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
                    :items="trips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
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
          <b-tab title="LOCAL"
            ><!-- LOCAL TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Trips</h6>
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
                    :items="trips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="archiveInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div></b-tab
          >
          <b-tab title="TRANSIT"
            ><!-- TRANSIT TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Trips</h6>
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
                    :items="trips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="archiveInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div></b-tab
          >
          <b-tab title="ARCHIVE">
            <!-- ARCHIVE TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Trips</h6>
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
                    :items="trips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="archiveInfo(row.item)"
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
    </b-overlay>
    <!-- MODAL TO UPDATE TRIP INFORMATION -->
    <b-modal
      scrollable
      id="updateTripModal"
      size="xl"
      title="Update Trip Info"
      v-if="rowDetails"
      @ok="handleUpdateTrip"
      ><template #modal-footer="{ ok, cancel, hide }">
        <b-button
          class="float-left"
          size="sm"
          variant="danger"
          @click="hide(handleEndtrip())"
          >End Trip</b-button
        >
        <b-button size="sm" @click="cancel()">Cancel</b-button>
        <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
      </template>
      <b-container fluid>
        <!-- TRIP LOCATION INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>Trip No</b>
            <p>
              {{ editTrip.content.id }}
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>Current Location</b>
            <p>
              {{ editTrip.content.currentLocation }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Destination</b>
            <p>
              {{ editTrip.content.destination.name }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>ETA</b>
            <p>
              {{ editTrip.content.etaSite }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Trip Status</b>
            <p>
              {{ editTrip.content.activityStatus.name }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Job Class</b>
            <p>JOB CLASS INFO</p>
          </b-col>
        </b-row>
        <!-- ALLOCATION INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>Truck</b>
            <p>
              {{ editTrip.content.allocation.truck.registrationNumber }}
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>Trailer</b>
            <p>
              {{ editTrip.content.allocation.trailer.registrationNumber }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Driver</b>
            <p>
              {{ editTrip.content.allocation.driver.firstName }}
              {{ editTrip.content.allocation.driver.middleName }}
              {{ editTrip.content.allocation.driver.lastName }}
            </p>
          </b-col>
        </b-row>
        <!-- DISPATCH INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>Dispatch Date</b>
            <p>
              <b-input
                size="sm"
                type="date"
                placeholder="Enter dispatch date"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>DISPATCHER</b>
            <p>
              <v-select
                v-model="editTrip.content.dispatcher"
                label="name"
                :options="dispatcher"
                :reduce="(dispatcher) => dispatcher.id"
                placeholder="Enter dispatcher name"
              ></v-select>
            </p>
          </b-col>
        </b-row>
        <!-- MANIFEST INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>MANIFEST NO</b>
            <p>
              <b-input
                size="sm"
                v-model="editTrip.content.manifestNumber"
                placeholder="Enter manifest number"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>MANIFEST DOC</b>
            <p>
              <!-- <b-form-file
                size="sm"
                v-model="file1"
                :state="Boolean(file1)"
                placeholder="Choose a file or drop it here..."
                drop-placeholder="Drop file here..."
              ></b-form-file> -->
            </p>
          </b-col>
        </b-row>
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>Client</b>
            <p>{{ editTrip.content.client.name }}</p>
          </b-col>
          <b-col class="border rouded">
            <b>Client No</b>
            <p>
              {{ editTrip.content.client.id }}
            </p>
          </b-col>
        </b-row>
        <!-- CARGO INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>Cargo Name</b>
            <p>{{ editTrip.content.cargo.name }}</p>
          </b-col>
          <b-col class="border rounded">
            <b>Cargo Weight</b>
            <b-input
              size="sm"
              v-model="editTrip.content.cargoWeight"
              placeholder="Enter cargo Weight"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Cargo Quantity</b>
            <b-input
              size="sm"
              v-model="editTrip.content.cargoQuantity"
              placeholder="Enter cargo Quantity"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Seal No</b>
            <b-input
              size="sm"
              v-model="editTrip.content.sealNumber"
              placeholder="Enter seal Number"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Container No</b>
            <b-input
              size="sm"
              v-model="editTrip.content.containerNumber"
              placeholder="Enter container Number"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Loading Location</b>
            <v-select
              v-model="editTrip.content.loadingLocation"
              label="name"
              :options="locations"
              :reduce="(locations) => locations.id"
            ></v-select>
          </b-col>
        </b-row>
      </b-container>
    </b-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      rowDetails: false,
      trips: [],
      people: [],
      locations: [],
      tripFields: [
        { key: "client.name", label: "Client", sortable: true },
        { key: "cargo.name", label: "Cargo", sortable: true },
        {
          key: "allocation.truck.registrationNumber",
          label: "Truck",
          sortable: true,
        },
        { key: "allocation.trailer.tlNumber", label: "Trailer" },
        { key: "activityStatus.name", label: "Status" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      tableFilter: null,

      //when trip is declared ended we need to change the truck allocation status to free again
      editTrip: {
        content: "",
      },
    };
  },

  mounted() {
    this.getTrips();
  },
  methods: {
    getTrips() {
      this.loading = true;
      axios
        .get("http://localhost:8000/api/trips")
        .then((response) => {
          this.trips = response.data.trips;
          this.people = response.data.people;
          this.locations = response.data.locations;
          this.loading = false;
        })
        .catch((error) => {
          return console.log(error);
        });
      console.log("trips loaded");
    },
    info(item, button) {
      this.editTrip.content = item;
      this.rowDetails = true;
      this.$root.$emit("bv::show::modal", "updateTripModal", button);
    },
    //UPDATE TRIP INFORMATION
    handleUpdateTrip(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateTrip();
    },
    updateTrip() {
      axios
        .patch("http://localhost:8000/api/trips/" + this.editTrip.content.id, {
          clientId: this.editTrip.content.client.id,
          cargoId: this.editTrip.content.client.id,
          destinationId: this.editTrip.content.destination.id,
          allocationId: this.editTrip.content.allocation.id,
          activityStatusId: this.editTrip.content.activityStatus.id,
          tripClassId: this.editTrip.content.tripClass,
          dispatchDate: this.editTrip.content.dispatchDate,
          dispatcherId: this.editTrip.content.dispatcher,
          etaSite: this.editTrip.content.etaSite,
          routeCode: this.editTrip.content.routeCode,
          currentLocation: this.editTrip.content.currentLocation,
          manifestNumber: this.editTrip.content.manifestNumber,
          manifestDate: this.editTrip.content.manifestDate,
          manifestDoc: this.editTrip.content.manifestDoc,
          fileNumber: this.editTrip.content.fileNumber,
          cargoOrderNumber: this.editTrip.content.cargoOrderNumber,
          cargoWeight: this.editTrip.content.cargoWeight,
          cargoQuantity: this.editTrip.content.cargoQuantity,
          sealNumber: this.editTrip.content.sealNumber,
          containerNumber: this.editTrip.content.containerNumber,
          loadingDate: this.editTrip.content.loadingDate,
          loadingLocationId: this.editTrip.content.loadingLocation,
          truckActivityStatus: 2,
          trailerActivityStatus: 2,
          driverActivityStatus: 2,
        })
        .then((response) => console.log("trip updated successfully"))
        .catch((error) => console.error(error));
      this.$nextTick(() => {
        this.$bvModal.hide("updateTripModal");
        this.getTrips();
      });
    },
    handleEndTrip(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.endTrip();
    },
    endTrip() {
      axios
        .patch("http://localhost:8000/api/trips/" + this.editTrip.content.id, {
          clientId: this.editTrip.content.client.id,
          cargoId: this.editTrip.content.client.id,
          destinationId: this.editTrip.content.destination.id,
          allocationId: this.editTrip.content.allocation.id,
          activityStatusId: this.editTrip.content.activativityStatus.id,
          tripClassId: this.editTrip.content.tripClass.id,
          dispatchDate: this.editTrip.content.dispatchDate,
          dispatcherId: this.editTrip.content.dispatcher.id,
          etaSite: this.editTrip.content.etaSite,
          routeCode: this.editTrip.content.routeCode,
          currentLocation: this.editTrip.content.location.id,
          manifestNumber: this.editTrip.content.manifestNumber,
          manifestDate: this.editTrip.content.manifestDate,
          manifestDoc: this.editTrip.content.manifestDoc,
          fileNumber: this.editTrip.content.fileNumber,
          cargoOrderNumber: this.editTrip.content.cargoOrderNumber,
          cargoWeight: this.editTrip.content.cargoWeight,
          cargoQuantity: this.editTrip.content.cargoQuantity,
          sealNumber: this.editTrip.content.sealNumber,
          containerNumber: this.editTrip.content.containerNumber,
          loadingDate: this.editTrip.content.loadingDate,
          loadingLocationId: this.editTrip.content.loadingLocation.id,
          // setting truck, trailer and driver activity status to free again
          truckActivityStatus: 1,
          trailerActivityStatus: 1,
          driverActivityStatus: 1,
        })
        .then((response) => console.log("trip archived successfully"))
        .catch((error) => console.error(error));
      this.$nextTick(() => {
        this.$bvModal.hide("updateTripModal");
        this.getTrips();
      });
    },
  },
};
</script>
<style lang="stylus"></style>