@extends('layouts.app')

@section('content')

<div class="widget widget-table action-table">
    @yield ('content')

    <!-- create allocation modal-->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trucks</h6>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                    Truck</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Truck</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hnameden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="people">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Reg Number</label>
                                        <input type="text" class="form-control" name="reg_number"
                                            placeholder="Enter truck registration number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company</label>
                                        <select type="email" class="form-control" name="license_number" placeholder="Choose company" required>
                                            @foreach ($company as $company)
                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cluster</label>
                                        <select type="email" class="form-control" name="cluster_name" placeholder="Choose Cluster" required>
                                            @foreach ($cluster as $cluster)
                                            <option value="{{$cluster->id}}">{{$cluster->cluster_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Truck Type</label>
                                        <select type="email" class="form-control" name="truck_type" placeholder="Choose Truck Type" required>
                                            @foreach ($truck_type as $truck_type)
                                            <option value="{{$truck_type->id}}">{{$truck_type->truck_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Truck Status</label>
                                        <select type="email" class="form-control" name="status" placeholder="Status" required>
                                            @foreach ($status as $status)
                                            <option value="{{$status->id}}">{{$status->status_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>REG NUMBER</th>
                            <th>COMPANY</th>
                            <th>CLUSTER</th>
                            <th>TRUCK TYPE</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($trucks as $truck)
                        <tr>
                            <td><input class="form-check-input ml-2" type="checkbox" value="" id="{{$truck->id}}"
                                    onclick="trucksArray({{$truck->id}});"></td>
                            <td>{{$truck->reg_number}}</td>
                            <td>{{$truck->company->company_name}}</td>
                            <td>{{$truck->cluster->cluster_name}}</td>
                            <td>{{$truck->truck_type->truck_type_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var trucksList = [];
    var cargoId
    var clientId
    var destinationId

    function trucksArray() {};

    function trucksArray(id) {
        if (trucksList.indexOf(id) < 0) {
            trucksList.push(id);
        } else {
            trucksList.pop(id);
        }
        console.log('the trucksList array is ', trucksList);
    }

    function setAllocationData() {
        cargoId = document.getElementById('cargoSelector').value;
        clientId = document.getElementById('clientSelector').value;
        destinationId = document.getElementById('destinationSelector').value;
        $('#allocation_modal').modal('show');
        console.log(cargoId)
    }

    function sendAllocationData() {
        var manifestNo = document.getElementById('manifestNo').value

        axios.post('http://127.0.0.1:8000/api/allocation', {
                cargoId: cargoId,
                clientId: clientId,
                destinationId: destinationId,
                manifestNo: manifestNo,
                trucksList: trucksList
            })
            .then(function (response) {
                console.log(response);
                $('#allocation_modal').modal('toggle');
            })
            .catch(function (error) {
                console.log(error);
            });
    }

</script>

@endsection
