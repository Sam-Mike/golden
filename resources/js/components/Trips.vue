<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs content-class="mt-2">
          <b-tab title="ACTIVE">
            <!-- TRIPS FOR ACTIVE TRIPS -->
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
    <b-modal
      scrollable
      id="updateTripModal"
      size="xl"
      title="Update Trip Info"
      v-if="rowDetails"
      ><template #modal-footer="{ ok, cancel, hide }">
        <b-button
          class="float-left"
          size="sm"
          variant="danger"
          @click="hide(endtrip())"
          >End Trip</b-button
        >
        <b-button size="sm" @click="cancel()">Cancel</b-button>
        <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
      </template>
      <b-container fluid>
        <b-row>
          <b-col class="border rounded">
            <b-row class="border rounded">
              <ul style="list-style-type: none">
                <li>Truck</li>
                <p>
                  {{ editTrip.content.allocation.truck.registrationNumber }}
                </p>
                <li>Trailer</li>
                <p>
                  {{ editTrip.content.allocation.trailer.registrationNumber }}
                </p>
                <li>Driver</li>
                <p>
                  {{ editTrip.content.allocation.driver.firstName }}
                  {{ editTrip.content.allocation.driver.middleName }}
                  {{ editTrip.content.allocation.driver.lastName }}
                </p>
              </ul>
            </b-row>
            <b-row class="border rounded">
              <ul style="list-style-type: none">
                <b-form-group label="Manifest"
                  ><b-input
                    size="sm"
                    v-model="editTrip.content.manifestNumber"
                    placeholder="Enter Manifest Number"
                  ></b-input
                ></b-form-group>
                <li>Client</li>
                <p>{{ editTrip.content.client.name }}</p>
                <b-form-group label="Client Ref. Number"
                  ><b-input
                    size="sm"
                    placeholder="Enter reference Number"
                  ></b-input
                ></b-form-group>
              </ul>
            </b-row>
          </b-col>
          <b-col class="border rounded">
            <!-- location -->
            <b-row class="border rounded"
              ><ul style="list-style-type: none">
                <li>CURRENT LOCATION</li>
                <p>{{ editTrip.content.currentLocation }}</p>
                <b-form-group label="Dispatch Date"
                  ><b-input
                    type="date"
                    size="sm"
                    placeholder="Enter Dispatch date"
                  ></b-input
                ></b-form-group>
                <li>Destination</li>
                <p>{{ editTrip.content.destination.name }}</p>
                <b-form-group label="ETA"
                  ><b-input
                    type="number"
                    size="sm"
                    placeholder="Enter eta"
                  ></b-input
                ></b-form-group>
                <li>Trip Status</li>
                <p>{{ editTrip.content.activityStatus.name }}</p>
                <li>Job Class</li>
                <p>{{ editTrip.content.activityStatus.name }}</p>
              </ul>
            </b-row>
            <!-- CARGO -->
            <b-row class="border rounded"
              ><ul style="list-style-type: none">
                <li>Cargo Name</li>
                <p>{{ editTrip.content.cargo.name }}</p>
                <li>Cargo Weight</li>
                <p>{{ editTrip.content.cargoWeight }}</p>
                <b-form-group label="Cargo Quantity"
                  ><b-input
                    size="sm"
                    placeholder="Enter cargo Quantity"
                  ></b-input
                ></b-form-group></ul
            ></b-row>
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
  },
};
</script>