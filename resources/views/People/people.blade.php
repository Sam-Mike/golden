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

              {{-- Placing our modal here --}}
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Person</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Person</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hnameden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="people">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" class="form-control" name="middle_name" placeholder="Enter your middle name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Date of Birth</label>
            <input type="text" class="form-control" name="dob" placeholder="Enter date of birth" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Start Date</label>
            <input type="date" class="form-control" name="start_date"  placeholder="Enter employment date" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">License Number</label>
            <input type="email" class="form-control" name="license_number" placeholder="Enter License Number" required>
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
              <label for="exampleInputEmail1">Department</label>
              <select type="email" class="form-control" name="license_number" placeholder="Choose company" required>
            @foreach ($departments as $departments)
              <option value="{{$departments->id}}">{{$departments->department_name}}</option>
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
</div>

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NAME</th>
                      <th>DOB</th>
                      <th>MOBILE</th>
                      <th>START DATE</th>
                      <th>COMPANY</th>
                      <th>DEPARTMENT</th>
                      <th>LICENSE NUMBER</th>
                      <th>ISSUE DATE</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NAME</th>
                      <th>DOB</th>
                      <th>MOBILE</th>
                      <th>START DATE</th>
                      <th>COMPANY</th>
                      <th>DEPARTMENT</th>
                      <th>LICENSE NUMBER</th>
                      <th>ISSUE DATE</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($people as $people)
                      <tr>
                        <td>{{$people->first_name}}</td>
                        <td>{{$people->middle_name}}</td>
                        <td>{{$people->last_name}}</td>
                        <td>{{$people->dob}}</td>
                        <td>{{$people->mobile}}</td>
                        <td>{{$people->start_date}}</td>
                        <td>{{$people->company->company_name}}</td>
                        <td>{{$people->departments->department_name}}</td>
                        <td>{{$people->license_number}}</td>
                        <td>{{$people->license_issue_date}}</td>
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