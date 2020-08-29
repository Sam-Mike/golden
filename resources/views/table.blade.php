@extends('layouts.app')

@section('content')

<div class="widget widget-table action-table">
            @yield ('content')
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Clients</h6>

              {{-- Placing our modal here --}}
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add client
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hnameden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="table">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="number" class="form-control" name="phone_number" placeholder="Enter phone number" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contact Name</label>
            <input type="text" class="form-control" name="contact_name"  placeholder="Enter contact name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Mobile Number</label>
            <input type="number" class="form-control" name="mobile"  placeholder="Enter mobile number" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->contact_name }}</td>
                        <td>{{ $client->mobile }}</td>
                        <td>{{ $client->email }}</td>
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