<template>
<div>
        <!-- DataTales Example -->
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">People</h6>
                <!-- Button trigger Add Person modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                    Person</button>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead class="thead-dark">
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

                    <tbody>
                        <tr v-for="person in people" :key="person.id">
                            <td>{{person.first_name}} {{person.middle_name}} {{person.last_name}}</td>
                            <td>{{person.dob}}</td>
                            <td>{{person.mobile}}</td>
                            <td>{{person.start_date}}</td>
                            <td>{{person.company.company_name}}</td>
                            <td>{{person.departments.department_name}}</td>
                            <td>{{person.license_number}}</td>
                            <td>{{person.license_issue_date}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Person Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <input type="text" class="form-control" name="first_name" placeholder="Enter your first name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Enter your middle name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter your last name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter date of birth" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="date" class="form-control" name="mobile" placeholder="Enter Mobile Number"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Start Date</label>
                            <input type="date" class="form-control" name="start_date" placeholder="Enter employment date"
                                required>
                        </div>
    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company</label>
                            <select type="text" class="form-control" name="company_name" placeholder="Choose company"
                                required>
                                @foreach ($company as $company)
                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <select type="text" class="form-control" name="department_name" placeholder="Choose company"
                                required>
                                @foreach ($departments as $departments)
                                <option value="{{$departments->id}}">{{$departments->department_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">License Number</label>
                            <input type="number" class="form-control" name="license_number"
                                placeholder="Enter License Number" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">License Issue Date</label>
                            <input type="date" class="form-control" name="license_issue_date"
                                placeholder="Enter License Issue Date" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">License Class</label>
                            <select type="text" class="form-control" name="license_class" placeholder="Choose company"
                                required>
                                @foreach ($license_classes as $license_class)
                                <option value="{{$license_class->id}}">{{$license_class->license_class}}
                                </option>
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
    data(){
        return{
            people:[]
        }
    },
    mounted(){
        axios
        .get("http://localhost:8000/api/people")
        .then(({data})=>(this.people= data));

    }
    
}
</script>