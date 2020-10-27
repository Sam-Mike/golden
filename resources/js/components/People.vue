<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales  -->
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
            <b-table
              responsive
              bordered
              striped
              hover
              :small="true"
              :items="people"
              :fields="peopleFields"
              :head-variant="tableHeadVariant"
              :sticky-header="true"
            >
              <template #cell(fullname)="data">
                {{ data.item.first_name }} {{ data.item.middle_name }}
                {{ data.item.last_name }}
              </template>
            </b-table>
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
                    v-model="newPerson.firstName"
                    placeholder="Enter your first name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Middle Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="newPerson.middleName"
                    placeholder="Enter your middle name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="newPerson.lastName"
                    placeholder="Enter your last name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    v-model="newPerson.dob"
                    placeholder="Enter date of birth"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile Number</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="newPerson.mobile"
                    placeholder="Enter Mobile Number"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Start Date</label>
                  <input
                    type="date"
                    class="form-control"
                    v-model="newPerson.startDate"
                    placeholder="Enter employment date"
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Company</label>
                  <select
                    type="text"
                    class="form-control"
                    v-model="newPerson.companyName"
                    placeholder="Choose company"
                    required
                  >
                    <option
                      v-for="company in people.company"
                      :key="company.id"
                      :value="company.id"
                    >
                      {{ company.company_name }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Department</label>
                  <select
                    type="text"
                    class="form-control"
                    v-model="newPerson.departmentName"
                    placeholder="Choose department"
                    required
                  >
                    <option
                      v-for="department in people.departments"
                      :key="department.id"
                      :value="department.id"
                    >
                      {{ department.department_name }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">License Number</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="newPerson.licenseNumber"
                    placeholder="Enter License Number"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">License Issue Date</label>
                  <input
                    type="date"
                    class="form-control"
                    v-model="newPerson.licenseIssueDate"
                    placeholder="Enter License Issue Date"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">License Class</label>
                  <select
                    type="text"
                    class="form-control"
                    v-model="newPerson.license_class"
                    placeholder="Choose license class"
                    required
                  >
                    <option
                      v-for="licenseClass in licenseClasses"
                      :key="licenseClass.id"
                      :value="licenseClass.id"
                    >
                      {{ licenseClass.license_class }}
                    </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: false,
      people: [],
      peopleFields: [
        { key: "fullName", label: "Full Name" },
        { key: "dob" },
        { key: "mobile" },
        { key: "company.company_name", label: "Company", sortable: true },
        { key: "start_date", sortable: true },
        {
          key: "departments.department_name",
          label: "Department",
          sortable: true,
        },
        { key: "license_issue_date", label: "Company", sortable: true },
      ],
      tableHeadVariant: "dark",
      company: [],
      departments: [],
      licenseClasses: [],
      newPerson: {
        firstName: "",
        middleName: "",
        lastName: "",
        dob: "",
        mobile: "",
        startDate: "",
        companyName: "",
        departmentName: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseClass: "",
      },
      //remember to activate and deactivate people
    };
  },
  mounted() {
    this.getPeople();
  },
  methods: {
    getPeople() {
      this.loading = true;
      axios
        .get("http://localhost:8000/api/people")
        .then(({ data }) => {
          this.people = data.people;
          this.loading = false;
        })
        .catch((error) => {
          return console.log(error);
        });
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.submitPerson();
    },
    submitPerson() {
      axios
        .post("http://localhost:8000/api/people", {
          firstName: this.person.firstName,
          middleName: this.person.middleName,
          lastName: this.person.lastName,
          dob: this.person.dob,
          mobile: this.person.mobile,
          startDate: this.person.startDate,
          companyName: this.person.companyName,
          departmentName: this.person.departmentName,
          licenseNumber: this.person.licenseNumber,
          licenseIssue_date: this.person.licenseIssueDate,
          licenseClass: this.person.licenseClass,
        })
        .then((res) => console.log("Person added"))
        .catch((err) => console.log(err));
      this.$nextTick(() => {
        this.$bvModal.hide("addPerson");
        this.getPeople();
      });
    },
  },
};
</script>