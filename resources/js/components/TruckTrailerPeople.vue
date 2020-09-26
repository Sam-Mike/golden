<template>
  <div>
    <div class="card shadow mb-4">
      <div style="padding: 20px">
        <!--inserting the list here-->
        <div calss="row">
          <button
            type="button"
            style="float: right"
            class="btn btn-primary"
            onclick="setAllocationData()"
          >
            Create Allocation
          </button>
        </div>
        <div class="row">
          <div class="input-group mb-1 col">
            <div class="col-md-8">
              <select
                v-model="selectedClient"
                class="custom-select"
                id="clientSelector"
              >
                <option selected>Choose Client</option>
                <option
                  v-for="client in truckTrailerDriver.clients"
                  :key="client.id"
                  :value="client.id"
                >
                  {{ client.client_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="input-group mb-1 col">
            <div class="col-md-8">
              <select v-model="selectedCargo" class="custom-select" id="cargoSelector">
                <option selected>Choose Cargo</option>
                <option
                  v-for="cargo in truckTrailerDriver.cargo"
                  :key="cargo.id"
                  :value="cargo.id"
                >
                  {{ cargo.cargo_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="input-group mb-1 col">
            <div class="col-md-8">
              <select v-model="selectedLocation" class="custom-select" id="destinationSelector">
                <option selected>Choose Destination</option>
                <option
                  v-for="location in truckTrailerDriver.locations"
                  :key="location.id"
                  :value="location.id"
                >
                  {{ location.location_name }}
                </option>
              </select>
            </div>
          </div>
        </div>

        <!-- create allocation modal-->
        <!-- <div class="modal fade" id="allocation_modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Allocation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hnameden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Manifest Number</label>
                                <input type="number" class="form-control" name="manifestNo" id="manifestNo"
                                    placeholder="Enter the manifest number" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="sendAllocationData()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
      </div>
    </div>
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
            Add TruckTrailerDriver
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
                <th>TRUCK DRIVER</th>
                <th>TRANSPORTER</th>
                <th>CLUSTER</th>
                <th>TRUCK TYPE</th>
                <th>TRAILER</th>
              </tr>
            </thead>

            <tbody>
              <tr
                v-for="ttp in truckTrailerDriver.truck_trailer_people"
                :key="ttp.id"
              >
                <td>
                  <input
                    class="form-check-input ml-2"
                    type="checkbox"
                    :value="ttp.id"
                    :id="ttp.id"
                    v-model="checkedTtp"
                  />
                </td>
                <td>{{ ttp.trucks.reg_number }}</td>
                <td>{{ ttp.people.first_name }}</td>
                <td>{{ ttp.trucks.company.company_name }}</td>
                <td>{{ ttp.trucks.cluster.cluster_name }}</td>
                <td>{{ ttp.trucks.truck_type.truck_type_name }}</td>
                <td>{{ ttp.trailers.reg_number }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal to add TruckTrailerDriver combination -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add TruckTrailerPeople</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hnameden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="truck_trailer_people">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Truck</label>
                        <select type="email" class="form-control" name="truck" placeholder="Choose truck" required>
                            @foreach ($trucks as $truck)
                            <option value="{{$truck->id}}">{{$truck->reg_number}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trailer</label>
                        <select type="email" class="form-control" name="trailer" placeholder="Choose trailer" required>
                            @foreach ($trailers as $trailer)
                            <option value="{{$trailer->id}}">{{$trailer->tl_number}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Driver</label>
                        <select type="email" class="form-control" name="driver" placeholder="Choose Person" required>
                            @foreach ($people as $person)
                            <option value="{{$person->id}}">{{$person->first_name}}</option>
                            @endforeach
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
</div> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      truckTrailerDriver: [],
      selectedClient: "",
      selectedCargo:"",
      selectedLocation:"",
      checkedTtp: [],
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/truck_trailer_people")
      .then(({ data }) => {
        this.truckTrailerDriver = data;
      });
    console.log("here i am");
    
    function setAllocationData() {
      cargoId = document.getElementById("cargoSelector").value;
      clientId = document.getElementById("clientSelector").value;
      destinationId = document.getElementById("destinationSelector").value;
      $("#allocation_modal").modal("show");
      console.log(cargoId);
    }

    function sendAllocationData() {
      var manifestNo = document.getElementById("manifestNo").value;

      axios
        .post("http://127.0.0.1:8000/api/allocation", {
          cargoId: cargoId,
          clientId: clientId,
          destinationId: destinationId,
          manifestNo: manifestNo,
          trucksList: trucksList,
        })
        .then(function (response) {
          console.log(response);
          $("#allocation_modal").modal("toggle");
        })
        .catch(function (error) {
          console.log(error.response);
        });
    }
  },
};
</script>