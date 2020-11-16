<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Trailers</h6>

            <!-- Button trigger Add Trailer Modal -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.addTrailerModal
            >
              Add Trailer
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
              :items="trailers"
              :fields="trailersFields"
              :head-variant="tableHeadVariant"
              :sticky-header="true"
            >
            </b-table>
          </div>
        </div>
      </div>
      <!-- Add Trailer Modal -->
      <b-modal
        scrollable
        title="Add Trailer"
        ok-title="Save"
        class="modal fade"
        id="addTrailerModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
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
            <select
              type="email"
              class="form-control"
              v-model="newTrailer.trailerTypeId"
              placeholder="Choose Trailer Type"
              required
            >
              <option
                v-for="trailerType in trailerType"
                :key="trailerType.id"
                :value="trailerType.id"
              >
                {{ trailerType.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <select
              type="email"
              class="form-control"
              v-model="newTrailer.companyId"
              placeholder="Choose company"
              required
            >
              <option
                v-for="company in company"
                :key="company.id"
                :value="company.id"
              >
                {{ company.name }}
              </option>
            </select>
          </div>
        </form>
      </b-modal>

      <!-- Updare Trailer Modal -->
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
        <form ref="forms" @submit.stop.prevent="updateTrailer">
          <div class="form-group">
            <label for="exampleInputEmail1">Reg Number</label>
            <input
              type="text"
              class="form-control"
              v-model="updateTrailer.content.registrationNumber"
              placeholder="Enter trailer registration number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">TL Number</label>
            <input
              type="number"
              class="form-control"
              v-model="updateTrailer.content.tlNumber"
              placeholder="Enter trailer TL number"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trailer Type</label>
            <select
              type="email"
              class="form-control"
              v-model="updateTrailer.content.trailerTypeId"
              placeholder="Choose Trailer Type"
              required
            >
              <option
                v-for="trailerType in trailerType"
                :key="trailerType.id"
                :value="trailerType.id"
              >
                {{ trailerType.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <select
              type="email"
              class="form-control"
              v-model="updateTrailer.content.companyId"
              placeholder="Choose company"
              required
            >
              <option
                v-for="company in company"
                :key="company.id"
                :value="company.id"
              >
                {{ company.name }}
              </option>
            </select>
          </div>
        </form>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      trailers: [],
      trailersFields: [
        { key: "registrationNumber" },
        { key: "tlNumber", label: "TL Number", sortable: true },
        { key: "company.name", label: "Company" },
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
      updateTrailer: {
        id: "updateTrailerModal",
        content: "",
      },
    };
  },
  mounted() {
    this.getTrailers();
  },
  methods: {
    getTrailers() {
      this.loading = true;
      axios
        .get("http://localhost:8000/api/trailers")
        .then(({ data }) => {
          this.trailers = data.trailers;
          this.trailerType = data.trailerType;
          this.company = data.company;
          this.loading = false;
        })
        .catch((error) => {
          return console.log(error);
        });
    },
    handleCreateTrailer(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createTrailer();
    },
    createTrailer() {
      axios
        .post("http://localhost:8000/api/trailers", {
          registrationNumber: this.newTrailer.registrationNumber,
          tlNumber: this.newTrailer.tlNumber,
          trailerTypeId: this.newTrailer.trailerTypeId,
          companyId: this.newTrailer.companyId,
        })
        .then((res) => console.log("trailer added"));
      this.$nextTick(() => {
        this.$bvModal.hide("addTrailerModal");
        this.getTrailers();
      });
    },
  },
  handleUpdateTrailer(bvModalEvt) {
    bvModalEvt.preventDefault();
    this.updateTrailer();
  },
  updateTrailer() {
    axios
      .patch(
        "http://localhost:8000/api/trailers/" + this.updateTrailer.content.id,
        {
          registrationNumber: this.updateTrailer.content.registrationNumber,
          tlNumber: this.updateTrailer.content.tlNumber,
          trailerTypeId: this.updateTrailer.content.trailerTypeId,
          companyId: this.updateTrailer.content.companyId,
        }
      )
      .then((res)=>{
        console.log("Trailer updated");
      });
      this.$nextTick(()=>{
        this.$bvModal.hide("updateTrailerModal");
        this.getTrailers();
      });
  },
  handleDeleteTrailer() {
    this.deleteTrailer();
  },
  deleteTrailer() {
    axios
    .delete("http://localhost:8000/api/trailers/" + this.updateTrailer.content.id)
    .then((res)=>{
      console.log("Trailer deleted");
    });
  },
};
</script>