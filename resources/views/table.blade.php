@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="widget widget-table action-table">
            @yield ('content')
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
              <button class="btn btn-primary">Add client</button>
              </div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Contact</th>
                      <th>Mobile</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Contact</th>
                      <th>Mobile</th>
                      <th>Email</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($clients as $client)
                      <tr>
                        <td>{{ $client->client_name }}</td>
                        <td> <button class="btn btn-warning">Edit</button></td>
                        <td> <button class="btn btn-danger"> Delete</button></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        @endsection

        @section('srripts')
            
        @endsection