<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs content-class="mt-2">
          <b-tab title="ACTIVE">
            <!-- ALLOCATIONS FOR ACTIVE TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                    All Allocations
                  </h6>
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
                  <h6 class="m-0 font-weight-bold text-primary">
                    All Allocations
                  </h6>
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
        </b-tabs>
      </b-card>
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
        {
          key: "truckTrailerDriver.truck.registrationNumber",
          label: "Truck",
          sortable: true,
        },
        { key: "truckTrailerDriver.trailer.tlNumber", label: "Trailer" },
        { key: "tripStatus", label: "Status" },
        { key: "actions" },
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
      console.log("trips loaded");
    },
  },
};
</script>