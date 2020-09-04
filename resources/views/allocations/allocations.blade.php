@extends('layouts.app')

@section('content')

<div class="widget widget-table action-table">
    @yield ('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Allocations</h6>

                {{-- Placing our modal here --}}
                <!-- Button trigger modal -->

                <!-- Modal -->

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
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
                        @foreach ($allocations as $allocation)
                        <tr>
                            <td>{{$allocation->manifest_no}}</td>
                            <td>{{$allocation->clients->client_name}}</td>
                            <td>{{$allocation->cargo->cargo_name}}</td>
                            <td>{{$allocation->truck_trailer_people->trucks->reg_number}}</td>
                            <td>{{$allocation->truck_trailer_people->trailer->tl_number}}</td>
                            <td>{{$allocation->location->location_name}}</td>
                            <td>{{$allocation->truck_trailer_people->people->first_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')

    @endsection

    <script>

    </script>
