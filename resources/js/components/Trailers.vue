<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
          <!-- ACTIVE TRAILERS -->
          <b-tab title="Active">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Trailers</h6>

                  <!-- Button trigger New Trailer Modal -->
                  <b-button
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
              <div class="card-body">
                <div class="table-responsive">
                  <b-table
                    class="table-list"
                    responsive
                    bordered
                    striped
                    hover
                    :small="true"
                    :items="activeTrailers"
                    :fields="trailersFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
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
          <b-tab title="In-Active">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Trailers</h6>

                  <!-- Button trigger New Trailer Modal -->
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
                    :items="inactiveTrailers"
                    :fields="trailersFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="inactiveInfo(row.item)"
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
            <label for="exampleInputEmail1">Reg Number</label>
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
              type="number"
              class="form-control"
              v-model="newTrailer.tlNumber"
              placeholder="Enter trailer TL number"
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
              placeholder="Choose Trailer Type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <v-select
              v-model="newTrailer.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
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
            <label for="exampleInputEmail1">Reg Number</label>
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
              type="number"
              class="form-control"
              v-model="editTrailer.tlNumber"
              placeholder="Enter trailer TL number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trailer Type</label>
            <v-select
              v-model="editTrailer.trailerType.id"
              label="name"
              :options="trailerType"
              :reduce="(trailerType) => trailerType.id"
              placeholder="Choose Trailer Type"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <v-select
              v-model="editTrailer.company.id"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
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
        <h6>Registration Number</h6>
        <p>{{ editTrailer.registrationNumber }}</p>

        <h6>TL Number</h6>
        <p>{{ editTrailer.tlNumber }}</p>

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
import { mapState } from "vuex";
export default {
  data() {
    return {
      loading: null,
      trailers: [],
      trailersFields: [
        { key: "registrationNumber" },
        { key: "tlNumber", label: "TL Number", sortable: true },
        { key: "company.name", label: "Company" },
        { key: "activityStatus.name", label: "Assignment Status" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      trailerType: [],
      company: [],
      newTrailer: {
        registrationNumber: "",
        tlNumber: "",
        trailerTypeId: "",
        companyId: "",
      },
      editTrailer: {
        id: "",
        registrationNumber: "",
        tlNumber: "",
        trailerType: "",
        company: "",
        activityStatus: "",
      },
    };
  },
  computed: {
    activeTrailers() {
      return this.trailers.filter(
        (trailers) =>
          trailers.activityStatus.id === 1 || trailers.activityStatus.id === 2 //or workshop
      );
    },
    inactiveTrailers() {
      return this.trailers.filter(
        (trailers) => trailers.activityStatus.id === 3
      );
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
    info(item, button) {
      console.log(item);
      this.editTrailer.id = item.id;
      this.editTrailer.registrationNumber = item.registrationNumber;
      this.editTrailer.tlNumber = item.tlNumber;
      this.editTrailer.trailerType = item.trailerType;
      this.editTrailer.company = item.company;
      this.editTrailer.activityStatus = item.activityStatus;
      this.$root.$emit("bv::show::modal", "updateTrailerModal", button);
    },
    handleUpdateTrailer(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateTrailer();
    },
    async updateTrailer() {
      try {
        await api.patch("trailers/" + this.editTrailer.id, {
          registrationNumber: this.editTrailer.registrationNumber,
          tlNumber: this.editTrailer.tlNumber,
          trailerTypeId: this.editTrailer.trailerType.id,
          companyId: this.editTrailer.company.id,
          activityStatusId: this.editTrailer.activityStatus.id,
        });
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
        await api.patch("trailers/" + this.editTrailer.id, {
          registrationNumber: this.editTrailer.registrationNumber,
          tlNumber: this.editTrailer.tlNumber,
          trailerTypeId: this.editTrailer.trailerType.id,
          companyId: this.editTrailer.company.id,
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
    inactiveInfo(item, button) {
      this.editTrailer.id = item.id;
      this.editTrailer.registrationNumber = item.registrationNumber;
      this.editTrailer.tlNumber = item.tlNumber;
      this.editTrailer.trailerType = item.trailerType;
      this.editTrailer.company = item.company;
      this.$root.$emit("bv::show::modal", "inactiveTrailerModal", button);
    },
    handleActivateTrailer() {
      this.activateTrailer();
    },
    async activateTrailer() {
      try {
        await api.patch("trailers/" + this.editTrailer.id, {
          registrationNumber: this.editTrailer.registrationNumber,
          tlNumber: this.editTrailer.tlNumber,
          trailerTypeId: this.editTrailer.trailerType.id,
          companyId: this.editTrailer.company.id,
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