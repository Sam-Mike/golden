<template>
  <div>
    <b-overlay :show="loading">
      <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
        <!-- ACTIVE TRAILERS -->
        <b-tab title="COACH">
          <!-- DataTales Example -->
          <div class="card shadow">
            <div class="card-header py-auto">
              <div class="col-md-auto justify-content-end">
                <h6 class="m-0 font-weight-bold text-primary"></h6>

                <!-- Button trigger New Trailer Modal -->
                <b-button
                  class="float-right"
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newTrailerModal
                >
                  New Trailer
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
                :items="coachTrailers"
                :fields="trailerFields"
                :filter="tableFilter"
                :head-variant="tableHeadVariant"
                sticky-header="60vh"
                @row-clicked="trailerInfo"
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

                <!-- Button trigger New Trailer Modal -->
                <b-button
                  class="float-right"
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newTrailerModal
                >
                  New Trailer
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
                :items="fleetTrailers"
                :fields="trailerFields"
                :filter="tableFilter"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                @row-clicked="trailerInfo"
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

                <!-- Button trigger New Trailer Modal -->
                <b-button
                  class="float-right"
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newTrailerModal
                >
                  New Trailer
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
                :items="wheelsTrailers"
                :fields="trailerFields"
                :filter="tableFilter"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                @row-clicked="trailerInfo"
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
              <div class="col-md-auto justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <!-- Button trigger New Trailer Modal -->
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
                :items="inactiveTrailers"
                :fields="trailerFields"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                @row-clicked="inactiveTrailerInfo"
              >
              </b-table>
            </div>
            <!-- </div> -->
          </div>
        </b-tab>
      </b-tabs>

      <!-- New Trailer Modal -->
      <b-modal
        scrollable
        title="New Trailer"
        class="modal fade"
        button-size="sm"
        id="newTrailerModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreateTrailer"
      >
        <form ref="forms" @submit.stop.prevent="createTrailer">
          <div class="form-group">
            <label for="exampleInputEmail1">Registration Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTrailer.registrationNumber"
              placeholder="Enter trailer registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">TL Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTrailer.tlNumber"
              placeholder="Enter trailer TL number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trailer Make</label>
            <v-select
              v-model="newTrailer.trailerMakeId"
              label="name"
              :options="trailerMake"
              :reduce="(trailerMake) => trailerMake.id"
              placeholder="Select Trailer Make"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Year Model</label>
            <input
              type="number"
              min="1900"
              class="form-control"
              v-model="newTrailer.yearModel"
              placeholder="Enter trailer year model"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Chassis Number</label>
            <input
              type="text"
              class="form-control"
              v-model="newTrailer.chassisNumber"
              placeholder="Enter Trailer Chassis Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Length (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="newTrailer.length"
              placeholder="Enter Trailer Length"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Width (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="newTrailer.width"
              placeholder="Enter Trailer Width"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Height (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="newTrailer.height"
              placeholder="Enter Trailer Height"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Maximum Weight (T)</label>
            <input
              type="number"
              class="form-control"
              v-model="newTrailer.maximumWeight"
              placeholder="Enter Trailer maximum Weight"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trailer Type</label>
            <v-select
              v-model="newTrailer.trailerTypeId"
              label="name"
              :options="trailerType"
              :reduce="(trailerType) => trailerType.id"
              placeholder="Select Trailer Type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <v-select
              v-model="newTrailer.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Select Company"
            ></v-select>
          </div>
        </form>
      </b-modal>

      <!-- Update Trailer Modal -->
      <b-modal
        scrollable
        title="Trailer Info"
        ok-title="Save"
        class="modal fade"
        id="updateTrailerModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleUpdateTrailer"
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            v-if="editTrailer.activityStatus.id == 1"
            size="sm"
            variant="danger"
            @click="hide(handleDeactivateTrailer())"
            >Deactivate</b-button
          >
          <b-button size="sm" @click="cancel()">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok()">Update</b-button>
        </template>
        <form ref="forms" @submit.stop.prevent="updateTrailer">
          <div class="form-group">
            <label for="exampleInputEmail1">Registration Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editTrailer.registrationNumber"
              placeholder="Enter trailer registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">TL Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editTrailer.tlNumber"
              placeholder="Enter trailer TL number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trailer Make</label>
            <v-select
              v-model="editTrailer.trailerMakeId"
              label="name"
              :options="trailerMake"
              :reduce="(trailerMake) => trailerMake.id"
              placeholder="Select Trailer Make"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Year Model</label>
            <input
              type="number"
              min="1900"
              class="form-control"
              v-model="editTrailer.yearModel"
              placeholder="Enter trailer year model"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Chassis Number</label>
            <input
              type="text"
              class="form-control"
              v-model="editTrailer.chassisNumber"
              placeholder="Enter Trailer Chassis Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Length (m)</label>
            <input
              type="number"
              step=".01"
              class="form-control"
              v-model="editTrailer.length"
              placeholder="Enter Trailer Length"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Width (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="editTrailer.width"
              placeholder="Enter Trailer Width"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Height (m)</label>
            <input
              type="number"
              class="form-control"
              v-model="editTrailer.height"
              placeholder="Enter Trailer Height"
              required
            />
          </div>
          <div class="form-group">
            <label for="chassisNumber"> Trailer Maximum Weight (T)</label>
            <input
              type="number"
              class="form-control"
              v-model="editTrailer.maximumWeight"
              placeholder="Enter Trailer maximum Weight"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trailer Type</label>
            <v-select
              v-model="editTrailer.trailerTypeId"
              label="name"
              :options="trailerType"
              :reduce="(trailerType) => trailerType.id"
              placeholder="Select Trailer Type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <v-select
              v-model="editTrailer.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Select Company"
            ></v-select>
          </div>
        </form>
      </b-modal>
      <!-- Inactive Trailer Modal -->
      <b-modal
        scrollable
        title="Trailer Info"
        ok-title="Activate"
        class="modal fade"
        id="inactiveTrailerModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleActivateTrailer"
      >
        <h6>TL Number</h6>
        <p>{{ editTrailer.tlNumber }}</p>
        <h6>Registration Number</h6>
        <p>{{ editTrailer.registrationNumber }}</p>
        <h6>Trailer Make</h6>
        <p>{{ editTrailer.trailerMake.name }}</p>
        <h6>Year Model</h6>
        <p>{{ editTrailer.yearModel }}</p>
        <h6>Chassis Number</h6>
        <p>{{ editTrailer.chassisNumber }}</p>
        <h6>Length (m)</h6>
        <p>{{ editTrailer.length }}</p>
        <h6>Width (m)</h6>
        <p>{{ editTrailer.width }}</p>
        <h6>Height (m)</h6>
        <p>{{ editTrailer.height }}</p>
        <h6>Maximum Weight (T)</h6>
        <p>{{ editTrailer.maximumWeight }}</p>
        <h6>Trailer Type</h6>
        <p>{{ editTrailer.trailerType.name }}</p>
        <h6>Company</h6>
        <p>{{ editTrailer.company.name }}</p>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
import api from "../apis/api";
export default {
  data() {
    return {
      loading: null,
      trailers: [],
      trailerFields: [
        { key: "registrationNumber" },
        { key: "tlNumber", label: "TL Number", sortable: true },
        { key: "trailerMake.name", label: "Trailer Make" },
        { key: "chassisNumber" },
        { key: "trailerType.name", label: "Trailer Type" },
        { key: "maximumWeight" },
        { key: "activityStatus.name", label: "Assignment Status" },
      ],
      tableFilter: null,
      tableHeadVariant: "dark",
      trailerType: [],
      trailerMake: [],
      company: [],
      newTrailer: {},
      editTrailer: {
        id: "",
        tlNumber: "",
        registrationNumber: "",
        trailerMakeId: "",
        trailerMake: "",
        yearModel: "",
        chassisNumber: "",
        length: "",
        width: "",
        height: "",
        maximumWeight: "",
        trailerTypeId: "",
        trailerType: "",
        companyId: "",
        company: "",
        activityStatus: "",
      },
    };
  },
  computed: {
    coachTrailers() {
      return this.trailers.filter(
        (trailer) => trailer.company.id === 1 && trailer.activityStatus.id !== 3
      );
    },
    fleetTrailers() {
      return this.trailers.filter(
        (trailer) => trailer.company.id === 2 && trailer.activityStatus.id !== 3
      );
    },
    wheelsTrailers() {
      return this.trailers.filter(
        (trailer) => trailer.company.id === 3 && trailer.activityStatus.id !== 3
      );
    },
    inactiveTrailers() {
      return this.trailers.filter((trailer) => trailer.activityStatus.id === 3);
    },
    sortOptions() {
      // Create an options list from our fields
      return this.trailerFields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
    },
  },
  mounted() {
    this.getTrailers();
  },
  methods: {
    async getTrailers() {
      try {
        this.loading = true;
        const response = await api.get("trailers");
        this.trailers = response.data.trailers;
        this.trailerType = response.data.trailerType;
        this.trailerMake = response.data.trailerMake;
        this.company = response.data.company;
        //await this.$store.dispatch("trailer/getTrailers");
        this.loading = false;
      } catch (error) {
        console.log(error);
      }
    },

    handleCreateTrailer(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createTrailer();
    },
    async createTrailer() {
      await api.post("trailers", this.newTrailer);
      this.$nextTick(() => {
        this.$bvModal.hide("newTrailerModal");
        this.getTrailers();
      });
    },
    trailerInfo(item, button) {
      console.log(item);
      this.editTrailer.id = item.id;
      this.editTrailer.tlNumber = item.tlNumber;
      this.editTrailer.registrationNumber = item.registrationNumber;
      this.editTrailer.trailerMakeId = item.trailerMake.id;
      this.editTrailer.yearModel = item.yearModel;
      this.editTrailer.chassisNumber = item.chassisNumber;
      this.editTrailer.length = item.length;
      this.editTrailer.width = item.width;
      this.editTrailer.height = item.height;
      this.editTrailer.maximumWeight = item.maximumWeight;
      this.editTrailer.trailerTypeId = item.trailerType.id;
      this.editTrailer.companyId = item.company.id;
      this.editTrailer.activityStatus = item.activityStatus;
      this.$root.$emit("bv::show::modal", "updateTrailerModal", button);
    },
    handleUpdateTrailer(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateTrailer();
    },
    async updateTrailer() {
      try {
        await api.patch("trailers/" + this.editTrailer.id, this.editTrailer);
        console.log("Trailer updated");
        this.$nextTick(() => {
          this.$bvModal.hide("updateTrailerModal");
          this.getTrailers();
          //code to set the vmodel empty
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleDeactivateTrailer() {
      this.deactivateTrailer();
    },
    async deactivateTrailer() {
      try {
        await api.patch("switch_trailer_activity/" + this.editTrailer.id, {
          activityStatusId: 3,
        });
        this.$nextTick(() => {
          this.$bvModal.hide("updateTrailerModal");
          this.getTrailers();
        });
      } catch (error) {
        console.log(error);
      }
    },
    inactiveTrailerInfo(item, button) {
      this.editTrailer.id = item.id;
      this.editTrailer.tlNumber = item.tlNumber;
      this.editTrailer.registrationNumber = item.registrationNumber;
      this.editTrailer.trailerMake = item.trailerMake;
      this.editTrailer.yearModel = item.yearModel;
      this.editTrailer.chassisNumber = item.chassisNumber;
      this.editTrailer.length = item.length;
      this.editTrailer.width = item.width;
      this.editTrailer.height = item.height;
      this.editTrailer.maximumWeight = item.maximumWeight;
      this.editTrailer.trailerType = item.trailerType;
      this.editTrailer.company = item.company;
      this.$root.$emit("bv::show::modal", "inactiveTrailerModal", button);
    },
    handleActivateTrailer() {
      this.activateTrailer();
    },
    async activateTrailer() {
      try {
        await api.patch("switch_trailer_activity/" + this.editTrailer.id, {
          activityStatusId: 1,
        });
        console.log("Trailer activated");
        this.$nextTick(() => {
          this.$bvModal.hide("inactiveTrailerModal");
          this.getTrailers();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>