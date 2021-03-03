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
                    <template #cell(driverName)="methods">
                      {{ methods.item.allocation.driver.firstName }}
                      {{ methods.item.allocation.driver.middleName }}
                      {{ methods.item.allocation.driver.lastName }}
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
              {{ editTrip.id }}
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>Current Location</b>
            <p>
              {{ editTrip.currentLocation }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Destination</b>
            <p>
              {{ editTrip.destination.name }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>ETA</b>
            <p>
              {{ editTrip.etaSite }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Trip Status</b>
            <p>
              {{ editTrip.activityStatus.name }}
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
              {{ editTrip.allocation.truck.registrationNumber }}
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>Trailer</b>
            <p>
              {{ editTrip.allocation.trailer.registrationNumber }}
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>Driver</b>
            <p>
              {{ editTrip.allocation.driver.firstName }}
              {{ editTrip.allocation.driver.middleName }}
              {{ editTrip.allocation.driver.lastName }}
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
                v-model="editTrip.dispatchDate"
              ></b-input>
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
                v-model="editTrip.manifestNumber"
                placeholder="Enter manifest number"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>MANIFEST DATE</b>
            <p>
              <b-input
                size="sm"
                type="date"
                v-model="editTrip.manifestDate"
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
            <p>{{ editTrip.client.name }}</p>
          </b-col>
          <b-col class="border rouded">
            <b>Client No</b>
            <p>
              {{ editTrip.client.id }}
            </p>
          </b-col>
        </b-row>
        <!-- CARGO INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>Cargo Name</b>
            <p>{{ editTrip.cargo.name }}</p>
          </b-col>
          <b-col class="border rounded">
            <b>Cargo Weight</b>
            <b-input
              size="sm"
              v-model="editTrip.cargoWeight"
              placeholder="Enter cargo Weight"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Cargo Quantity</b>
            <b-input
              size="sm"
              v-model="editTrip.cargoQuantity"
              placeholder="Enter cargo Quantity"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Seal No</b>
            <b-input
              size="sm"
              v-model="editTrip.sealNumber"
              placeholder="Enter seal Number"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Container No</b>
            <b-input
              size="sm"
              v-model="editTrip.containerNumber"
              placeholder="Enter container Number"
            ></b-input>
          </b-col>
          <b-col class="border rounded">
            <b>Loading Location</b>
            <v-select
              v-model="editTrip.loadingLocation"
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
import api from "../apis/api";
export default {
  data() {
    return {
      loading: false,
      trips: [],
      people: [],
      locations: [],
      tripFields: [
        { key: "client.name", label: "Client", sortable: true },
        { key: "cargo.name", label: "Cargo", sortable: true },
        { key: "driverName", label: "Driver" },
        {
          key: "allocation.truck.registrationNumber",
          label: "Truck",
          sortable: true,
        },
        { key: "allocation.trailer.tlNumber", label: "Trailer" },
        { key: "currentLocation", label: "Current Location" },
        { key: "activityStatus.name", label: "Status" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      tableFilter: null,

      //when trip is declared ended we need to change the truck allocation status to free again
      editTrip: {
        id: "",
        client: "",
        cargo: "",
        destination: "",
        allocation: { truck: "", trailer: "", driver: "" },
        activityStatus: "",
        tripClass: "",
        dispatchDate: "",
        etaSite: "",
        routeCode: "",
        currentLocation: "",
        manifestNumber: "",
        manifestDate: "",
        manifestDoc: "",
        fileNumber: "",
        cargoOrderNumber: "",
        cargoWeight: "",
        cargoQuantity: "",
        sealNumber: "",
        containerNumber: "",
        loadingDate: "",
        loadingLocation: "",
      },
    };
  },

  mounted() {
    this.getTrips();
  },
  methods: {
    async getTrips() {
      try {
        this.loading = true;
        const response = await api.get("trips");
        this.trips = response.data.trips;
        this.people = response.data.dispatcher;
        this.locations = response.data.locations;
        this.loading = false;
        console.log("trips loaded");
      } catch (error) {
        console.log(error);
      }
    },
    info(item, button) {
      console.log(item);
      this.editTrip.id = item.id;
      this.editTrip.client = item.client;
      this.editTrip.cargo = item.cargo;
      this.editTrip.destination = item.destination;
      this.editTrip.allocation = item.allocation;
      this.editTrip.activityStatus = item.activityStatus;
      this.editTrip.tripClassId = item.tripClass;
      this.editTrip.dispatchDate = item.dispatchDate;
      this.editTrip.etaSite = item.etaSite;
      this.editTrip.routeCode = item.routeCode;
      this.editTrip.currentLocation = item.currentLocation;
      this.editTrip.manifestNumber = item.manifestNumber;
      this.editTrip.manifestDate = item.manifestDate;
      this.editTrip.manifestDoc = item.manifestDoc;
      this.editTrip.fileNumber = item.fileNumber;
      this.editTrip.cargoOrderNumber = item.cargoOrderNumber;
      this.editTrip.cargoWeight = item.cargoWeight;
      this.editTrip.cargoQuantity = item.cargoQuantity;
      this.editTrip.sealNumber = item.sealNumber;
      this.editTrip.containerNumber = item.containerNumber;
      this.editTrip.loadingDate = item.loadingDate;
      this.editTrip.loadingLocation = item.loadingLocation;
      this.$root.$emit("bv::show::modal", "updateTripModal", button);
    },
    //UPDATE TRIP INFORMATION
    handleUpdateTrip(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateTrip();
    },
    async updateTrip() {
      try {
        await api.patch("/trips/" + this.editTrip.id, {
          // clientId: this.editTrip.client.id,
          // cargoId: this.editTrip.cargo.id,
          // destinationId: this.editTrip.destination.id,
          // allocationId: this.editTrip.allocation.id,
          // activityStatusId: this.editTrip.activityStatus.id,
          tripClassId: this.editTrip.tripClassId,
          dispatchDate: this.editTrip.dispatchDate,
          etaSite: this.editTrip.etaSite,
          routeCode: this.editTrip.routeCode,
          currentLocation: this.editTrip.currentLocation,
          manifestNumber: this.editTrip.manifestNumber,
          manifestDate: this.editTrip.manifestDate,
          manifestDoc: this.editTrip.manifestDoc,
          fileNumber: this.editTrip.fileNumber,
          cargoOrderNumber: this.editTrip.cargoOrderNumber,
          cargoWeight: this.editTrip.cargoWeight,
          cargoQuantity: this.editTrip.cargoQuantity,
          sealNumber: this.editTrip.sealNumber,
          containerNumber: this.editTrip.containerNumber,
          loadingDate: this.editTrip.loadingDate,
          loadingLocation: this.editTrip.loadingLocationId,
        });
        console.log("trip updated successfully");
        this.$nextTick(() => {
          this.$bvModal.hide("updateTripModal");
          this.getTrips();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleEndTrip(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.endTrip();
    },
    async endTrip() {
      try {
        await api.patch("trips/" + this.editTrip.id, {
          // set truck, trailer and driver activity status to free again
          activityStatusId:3,
          truckActivityStatus:1,
          trailerActivityStatus:1,
          driverActivityStatus:1,
        });
        console.log("trip archived successfully");
        this.$nextTick(() => {
          this.$bvModal.hide("updateTripModal");
          this.getTrips();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<style lang="stylus"></style>