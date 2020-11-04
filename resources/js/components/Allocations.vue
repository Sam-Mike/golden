<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Allocations</h6>
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
              :items="allocations"
              :fields="allocationFields"
              :head-variant="tableHeadVariant"
              :sticky-header="true"
              :filter="tableFilter"
            >
            </b-table>
          </div>
        </div>
      </div>
    </b-overlay>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      allocations: [],
      allocationFields: [
        { key: "client.name", label: "Client", sortable: true },
        { key: "cargo.name", label: "Cargo", sortable: true },
        { key: "truckTrailerDriver.truck.registrationNumber", label: "Truck", sortable: true },
        { key: "truckTrailerDriver.trailer.tlNumber", label: "Trailer" },
        { key: "tripStatus", label: "Status" },
      ],
      tableHeadVariant: "dark",
      tableFilter: null,

      //when trip is declared ended we need to change the truck allocation status to free again
    };
  },
  mounted() {
    this.getAllocations();
  },
  methods: {
    getAllocations() {
      this.loading = true;
      axios
        .get("http://localhost:8000/api/allocations")
        .then(({ data }) => {
          this.allocations = data.allocations;
          this.loading = false;
        })
        .catch((error) => {
          return console.log(error);
        });
      console.log("gotten allocations");
    },
  },
};
</script>