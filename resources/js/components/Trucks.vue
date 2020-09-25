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
          >
            Add
            Truck
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
              <tr v-for="truck in trucks" :key="truck.id">
                <td>{{truck.reg_number}}</td>
                <td>{{truck.company.company_name}}</td>
                <td>{{truck.cluster.cluster_name}}</td>
                <td>{{truck.truck_type.truck_type_name}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Add Truck Modal -->
    <!-- <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Truck</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hnameden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="trucks">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Reg Number</label>
                <input
                  type="text"
                  class="form-control"
                  name="reg_number"
                  placeholder="Enter truck registration number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <select
                  type="email"
                  class="form-control"
                  name="company_name"
                  placeholder="Choose company"
                  required
                >
                  @foreach ($company as $company)
                  <option value="{{$company->id}}">{{$company->company_name}}</option>@endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cluster</label>
                <select
                  type="email"
                  class="form-control"
                  name="cluster_name"
                  placeholder="Choose Cluster"
                  required
                >
                  @foreach ($cluster as $cluster)
                  <option value="{{$cluster->id}}">{{$cluster->cluster_name}}</option>@endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Truck Type</label>
                <select
                  type="email"
                  class="form-control"
                  name="truck_type"
                  placeholder="Choose Truck Type"
                  required
                >
                  @foreach ($truck_type as $truck_type)
                  <option value="{{$truck_type->id}}">{{$truck_type->truck_type_name}}</option>@endforeach
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      trucks: [],
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/trucks")
      .then(({ data }) => (this.trucks = data));
      console.log('here i am');


  },
}
</script>