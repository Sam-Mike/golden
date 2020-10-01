<template>
  <div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="d-flex row justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">All Allocations</h6>
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
                <th>MANIFEST</th>
                <th>CLIENT</th>
                <th>CARGO</th>
                <th>TRUCK</th>
                <th>TRAILER</th>
                <th>DRIVER</th>
                <th>DESTINATION</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="allocation in allocations.allocations" :key="allocation.id">
                <td>{{ allocation.manifest_no }}</td>
                <td>{{ allocation.clients.client_name }}</td>
                <td>{{ allocation.cargo.cargo_name }}</td>
                <td>{{ allocation.truck_trailer_people.trucks.reg_number }}</td>
                <td>{{ allocation.truck_trailer_people.trailers.tl_number }}</td>
                <td>{{ allocation.truck_trailer_people.people.first_name }}</td>
                <td>{{ allocation.location.location_name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      allocations: [],
    }
  },
  mounted() {
    this.getAllocations()
  },
  methods: {
    getAllocations() {
      axios
        .get("http://localhost:8000/api/allocations")
        .then(({ data }) => (this.allocations = data));
        console.log('gotten allocations');
    },
  },
};
</script>