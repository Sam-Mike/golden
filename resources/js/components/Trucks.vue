<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>

            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.addTruck
            >
              Add Truck
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <b-table
            responsive
              bordered
              striped
              hover
              :small="true"
              :items="trucks"
              :fields="trucksFields"
              :head-variant="tableHeadVariant"
              :sticky-header="true"
              >

            </b-table>
          </div>
        </div>
      </div>

      <!-- Add Truck Modal -->
      <b-modal
        title="Add Truck"
        ok-title="Save"
        class="modal fade"
        id="addTruck"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @ok="handleOk"
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
                    v-model="newTruck.registrationNumber"
                    placeholder="Enter truck registration number"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Company</label>
                  <select
                    type="text"
                    class="form-control"
                    v-model="newTruck.companyId"
                    placeholder="Choose company"
                    required
                  >
                    <option
                      v-for="company in trucks.company"
                      :key="company.id"
                      :value="company.id"
                    >
                      {{ company.company_name }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cluster</label>
                  <select
                    type="text"
                    class="form-control"
                    v-model="newTruck.clusterId"
                    placeholder="Choose Cluster"
                    required
                  >
                    <option
                      v-for="cluster in trucks.cluster"
                      :key="cluster.id"
                      :value="cluster.id"
                    >
                      {{ cluster.cluster_name }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Truck Type</label>
                  <select
                    type="text"
                    class="form-control"
                    v-model="newTruck.truckTypeId"
                    placeholder="Choose Truck Type"
                    required
                  >
                    <option
                      v-for="truck_type in trucks.truck_type"
                      :key="truck_type.id"
                      :value="truck_type.id"
                    >
                      {{ truck_type.truck_type_name }}
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
      trucks: [],
      trucksFields:[
        {key:"reg_number"},
        {key:"company.company_name", label:"Company"},
        {key:"cluster.cluster_name", label:"Cluster Name"},
        {key:"truck_type.truck_type_name", label:"Truck Type"}
      ],
      tableHeadVariant:"dark",
      newTruck: {
        registrationNumber: "",
        companyId: "",
        clusterId: "",
        truckTypeId: "",
      },
    };
  },
  mounted() {
    this.getTrucks();
  },
  methods: {
    getTrucks() {
      this.loading = true;
      axios.get("http://localhost:8000/api/trucks").then(({ data }) => {
        this.trucks = data.trucks;
        this.loading = false;
      });
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.submitTruck();
    },
    submitTruck() {
      axios
        .post("http://localhost:8000/api/trucks", {
          registrationNumber: this.newTruck.registrationNumber,
          companyId: this.newTruck.companyId,
          clusterId: this.newTruck.clusterId,
          truckTypeId: this.newTruck.truckTypeId,
        })
        .then((res) => console.log("truck added"));

      this.$nextTick(() => {
        this.$bvModal.hide("addTruck");
        this.getTrucks();
      });
    },
  },
};
</script>