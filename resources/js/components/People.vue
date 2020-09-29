<template>
  <div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="d-flex row justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">People</h6>
          <!-- Button trigger Add Person modal -->
          <button
            v-b-modal.addPerson
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            Add Person
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
              <tr v-for="person in people.people" :key="person.id">
                <td>
                  {{ person.first_name }} {{ person.middle_name }}
                  {{ person.last_name }}
                </td>
                <td>{{ person.dob }}</td>
                <td>{{ person.mobile }}</td>
                <td>{{ person.start_date }}</td>
                <td>{{ person.company.company_name }}</td>
                <td>{{ person.departments.department_name }}</td>
                <td>{{ person.license_number }}</td>
                <td>{{ person.license_issue_date }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Add Person Modal -->
    <b-modal
      class="modal fade"
      id="addPerson"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      ok-title="Save"
      @ok="handleOk"
      title="Add Person"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <form ref="form" @submit.stop.prevent="submitPerson">
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="person.first_name"
                  placeholder="Enter your first name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Middle Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="person.middle_name"
                  placeholder="Enter your middle name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="person.last_name"
                  placeholder="Enter your last name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Date of Birth</label>
                <input
                  type="date"
                  class="form-control"
                  v-model="person.dob"
                  placeholder="Enter date of birth"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile Number</label>
                <input
                  type="date"
                  class="form-control"
                  v-model="person.mobile"
                  placeholder="Enter Mobile Number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Start Date</label>
                <input
                  type="date"
                  class="form-control"
                  v-model="person.start_date"
                  placeholder="Enter employment date"
                  required
                />
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Company</label>
                <select
                  v-for="company in people.company"
                  :key="company.id"
                  type="text"
                  class="form-control"
                  name="company_name"
                  placeholder="Choose company"
                  required
                >
                  <option :value="company.id">
                    {{ company.company_name }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                <select
                  v-for="department in people.departments"
                  :key="department.id"
                  type="text"
                  class="form-control"
                  name="department_name"
                  placeholder="Choose department"
                  required
                >
                  <option :value="departments.id">
                    {{ departments.department_name }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">License Number</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="license_number"
                  placeholder="Enter License Number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">License Issue Date</label>
                <input
                  type="date"
                  class="form-control"
                  name="license_issue_date"
                  placeholder="Enter License Issue Date"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">License Class</label>
                <select
                  v-for="licenseClass in people.license_classes"
                  :key="licenseClass.id"
                  type="text"
                  class="form-control"
                  v-model="license_class"
                  placeholder="Choose company"
                  required
                >
                  <option :value="licenseClass.id">
                    {{ licenseClass.license_class }}
                  </option>
                </select>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </b-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      people: [],
      person: {},
    };
  },
  mounted() {
    this.getPeople();
  },
  methods: {
    getPeople() {
      axios
        .get("http://localhost:8000/api/people")
        .then(({ data }) => (this.people = data));
    },
    handleOk() {},
  },
};
</script>