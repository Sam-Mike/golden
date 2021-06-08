<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs
          active-nav-item-class="font-weight-bold text-uppercase"
          content-class="mt-2"
        >
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
                    :items="localTrips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                    @row-clicked="activeTripInfo"
                  >
                    <template #cell(driverName)="methods">
                      {{ methods.item.allocation.driver.firstName }}
                      {{ methods.item.allocation.driver.middleName }}
                      {{ methods.item.allocation.driver.lastName }}
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
                    :items="transitTrips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                    @row-clicked="activeTripInfo"
                  >
                    <template #cell(driverName)="methods">
                      {{ methods.item.allocation.driver.firstName }}
                      {{ methods.item.allocation.driver.middleName }}
                      {{ methods.item.allocation.driver.lastName }}
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
                    :items="archivedTrips"
                    :fields="tripFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                    @row-clicked="archiveTripInfo"
                  >
                    <template #cell(driverName)="methods">
                      {{ methods.item.allocation.driver.firstName }}
                      {{ methods.item.allocation.driver.middleName }}
                      {{ methods.item.allocation.driver.lastName }}
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
          @click="hide(handleEndTrip())"
          >End Trip</b-button
        >
        <b-button size="sm" @click="cancel()">Cancel</b-button>
        <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
      </template>
      <form id="tripForm" @submit="updateTrip" enctype="multipart/form-data">
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
                  name="dispatchDate"
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
                  type="number"
                  name="manifestNumber"
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
                  name="manifestDate"
                  v-model="editTrip.manifestDate"
                  placeholder="Enter manifest number"
                ></b-input>
              </p>
            </b-col>
            <b-col class="border rouded">
              <b>MANIFEST DOCUMENT</b>
              <b-col v-if="editTrip.manifestDocument" class="border rounded">
                <p>
                  <a :href="filesPath + editTrip.manifestDocument"
                    >manifestDocument</a
                  >
                </p>
              </b-col>
              <b-form-file
                v-else
                size="sm"
                placeholder="Choose a file..."
                drop-placeholder="Drop file here..."
                name="manifestDocument"
              ></b-form-file>
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
                type="number"
                name="cargoWeight"
                v-model="editTrip.cargoWeight"
                placeholder="Enter cargo Weight"
              ></b-input>
            </b-col>
            <b-col class="border rounded">
              <b>Cargo Quantity</b>
              <b-input
                size="sm"
                type="number"
                name="cargoWeight"
                v-model="editTrip.cargoQuantity"
                placeholder="Enter cargo Quantity"
              ></b-input>
            </b-col>
            <b-col class="border rounded">
              <b>Seal No</b>
              <b-input
                size="sm"
                type="number"
                name="sealNumber"
                v-model="editTrip.sealNumber"
                placeholder="Enter seal Number"
              ></b-input>
            </b-col>
            <b-col class="border rounded">
              <b>Container No</b>
              <b-input
                size="sm"
                type="number"
                name="containerNumber"
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
      </form>
    </b-modal>
    <!-- MODAL TO SHOW ARCHIVED TRIP INFORMATION -->
    <b-modal
      scrollable
      id="archiveTripModal"
      size="xl"
      title="Archive Trip Info"
      @ok="handleUpdateTrip"
      ><template #modal-footer="{ cancel }">
        <b-button size="sm" @click="cancel()">Cancel</b-button>
      </template>
      <form id="tripForm">
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
                {{ editTrip.dispatchDate }}
              </p>
            </b-col>
          </b-row>
          <!-- MANIFEST INFORMATION -->
          <b-row class="border rounded">
            <b-col class="border rounded">
              <b>MANIFEST NO</b>
              <p>
                {{ editTrip.manifestNumber }}
              </p>
            </b-col>
            <b-col class="border rounded">
              <b>MANIFEST DATE</b>
              <p>
                {{ editTrip.manifestDate }}
              </p>
            </b-col>
            <b-col class="border rouded">
              <b>MANIFEST DOCUMENT</b>
              <p>
                <a
                  v-if="editTrip.manifestDocument"
                  :href="filesPath + editTrip.manifestDocument"
                  >manifestDocument</a
                >
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
              <p>{{ editTrip.cargoWeight }}</p>
            </b-col>
            <b-col class="border rounded">
              <b>Cargo Quantity</b>
              <p>{{ editTrip.cargoQuantity }}</p>
            </b-col>
            <b-col class="border rounded">
              <b>Seal No</b>
              <p>{{ editTrip.sealNumber }}</p>
            </b-col>
            <b-col class="border rounded">
              <b>Container No</b>
              <p>{{ editTrip.containerNumber }}</p>
            </b-col>
            <b-col class="border rounded">
              <b>Loading Location</b>
              <p>{{ editTrip.loadingLocation }}</p>
            </b-col>
          </b-row>
        </b-container>
      </form>
    </b-modal>
  </div>
</template>
<script>
import api from "../apis/api";
import { mapState } from "vuex";
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
        { key: "activityStatus.name", label: "Status", sortable: true },
      ],
      tableHeadVariant: "dark",
      tableFilter: null,
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
        manifestDocument: "",
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
  computed: {
    localTrips() {
      return this.trips.filter((trip) => trip.tripClass.id === 1);
    },
    transitTrips() {
      return this.trips.filter((trip) => trip.tripClass.id === 2);
    },
    archivedTrips() {
      return this.trips.filter((trip) => trip.activityStatus.id === 1);
    },
    ...mapState({
      filesPath: "filesPath",
    }),
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
        this.locations = response.data.locations;
        this.loading = false;
      } catch (error) {
        console.log(error);
      }
    },
    activeTripInfo(item, button) {
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
      this.editTrip.manifestDocument = item.manifestDocument;
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
        let tripForm = document.getElementById("tripForm");
        let tripData = new FormData(tripForm);
        tripData.append("_method", "PATCH");
        //temporary
        if (this.editTrip.loadingLocation) {
          tripData.append("loadingLocation", this.editTrip.loadingLocation);
        }
        const config = {
          headers: {
            "content-type": "multipart/form-data",
            enctype: "multipart/form-data",
          },
        };
        for (var entry of tripData.entries()) {
          console.log(entry);
        }
        await api.post("/trips/" + this.editTrip.id, tripData, config);
        this.$nextTick(() => {
          this.$bvModal.hide("updateTripModal");
          this.getTrips();
        });
      } catch (error) {
        console.log(error);
      }
    },
    async updateTruckLocation() {},
    handleEndTrip() {
      this.endTrip();
    },
    async endTrip() {
      try {
        await api.patch("endTrip/" + this.editTrip.id, {
          tripActivityStatusId: 3,
          truckActivityStatusId: 1,
          trailerActivityStatusId: 1,
          driverActivityStatusId: 1,
        });
        this.$nextTick(() => {
          this.$bvModal.hide("updateTripModal");
          this.getTrips();
        });
      } catch (error) {
        console.log(error);
      }
    },
    archiveTripInfo(item, button) {
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
      this.editTrip.manifestDocument = item.manifestDocument;
      this.editTrip.fileNumber = item.fileNumber;
      this.editTrip.cargoOrderNumber = item.cargoOrderNumber;
      this.editTrip.cargoWeight = item.cargoWeight;
      this.editTrip.cargoQuantity = item.cargoQuantity;
      this.editTrip.sealNumber = item.sealNumber;
      this.editTrip.containerNumber = item.containerNumber;
      this.editTrip.loadingDate = item.loadingDate;
      this.editTrip.loadingLocation = item.loadingLocation;
      this.$root.$emit("bv::show::modal", "archiveTripModal", button);
    },
  },
};
</script>
<style lang="stylus"></style>