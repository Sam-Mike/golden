<template>
  <div>
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
          <table
            class="table table-bordered table-sm table-striped table-hover"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead class="thead-dark">
              <tr>
                <th>REG NUMBER</th>
                <th>COMPANY</th>
                <th>CLUSTER</th>
                <th>TRUCK TYPE</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="truck in trucks.trucks" :key="truck.id">
                <td>{{ truck.reg_number }}</td>
                <td>{{ truck.company.company_name }}</td>
                <td>{{ truck.cluster.cluster_name }}</td>
                <td>{{ truck.truck_type.truck_type_name }}</td>
              </tr>
            </tbody>
          </table>
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      trucks: [],
      newTruck: {
        registrationNumber:"",
        companyId:"",
        clusterId:"",
        truckTypeId:""

      },
    };
  },
  mounted() {
    this.getTrucks();
  },
  methods: {
    getTrucks() {
      axios
        .get("http://localhost:8000/api/trucks")
        .then(({ data }) => (this.trucks = data));
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