<template>
  <div>
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
            data-target="#addTrailer"
          >
            Add Trailer
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
                <th>REG NUMBER</th>
                <th>TL NUMBER</th>
                <th>TRAILER TYPE</th>
                <th>COMPANY</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="trailer in trailers" :key="trailer.id">
                <td></td>
                <td>{{ trailer.reg_number }}</td>
                <td>{{ trailer.tl_number }}</td>
                <td>{{ trailer.trailer_type.trailer_type_name }}</td>
                <td>{{ trailer.company.company_name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Add Trailer Modal -->
    <b-modal
      title="Add Trailer"
      ok-title="Save"
      class="modal fade"
      id="addTrailer"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      @ok="submitTrailer"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Reg Number</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="trailer.reg_number"
                  placeholder="Enter trailer registration number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">TL Number</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="trailer.tl_number"
                  placeholder="Enter trailer TL number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Trailer Type</label>
                <select
                  type="email"
                  class="form-control"
                  v-model="trailer.trailer_type"
                  placeholder="Choose Trailer Type"
                  required
                >
                  <option
                    v-for="trailer_type in trailers.trailer_type"
                    :key="trailer_type.id"
                    :value="trailer_type.id"
                  >
                    {{ trailer_type.trailer_type_name }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <select
                  type="email"
                  class="form-control"
                  v-model="trailer.company_name"
                  placeholder="Choose company"
                  required
                >
                  <option
                    v-for="company in trailers.company"
                    :key="company.id"
                    :value="company.id"
                  >
                    {{ company.company_name }}
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
      trailers: [],
      trailer: {
        reg_number: "",
        tl_number: "",
        trailer_type: "",
        company_name: "",
      },
    };
  },
  mounted() {
    this.getTrailers();
  },
  methods: {
    getTrailers() {
      axios
        .get("http://localhost:8000/api/trailers")
        .then(({ data }) => (this.trailers = data));
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.submitTrailer();
    },
    submitTrailer() {
      axios
        .post("http://localhost:8000/api/trailers", {
          reg_number: this.trailer.reg_number,
          tl_number: this.trailer.tl_number,
          trailer_type: this.trailer.trailer_type,
          trailer_type: this.trailer.company_name,
        })
        .then((res) => console.log("trailer added"));
        this.$nextTick(() => {
        this.$bvModal.hide("addTrailer");
        this.getTrailers();
      });
    },
  },
};
</script>