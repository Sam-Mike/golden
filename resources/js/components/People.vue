<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales  -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">People</h6>
            <!-- Button trigger Add Person modal -->
            <b-button
              size="sm"
              variant="primary"
              v-b-modal.addPersonModal
              data-toggle="modal"
              data-target="#exampleModal"
            >
              Add Person
            </b-button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <b-table
              class="table-list"
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
                {{ data.item.firstName }} {{ data.item.middleName }}
                {{ data.item.lastName }}
              </template>
              <template #cell(actions)="row">
                <b-button size="sm" @click="info(row.item)" class="mr-1"
                  >DETAILS</b-button
                >
              </template>
            </b-table>
          </div>
        </div>
      </div>
      <!-- Add Person Modal -->
      <b-modal
        scrollable
        class="modal fade"
        id="addPersonModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreatePerson"
        title="Add Person"
      >
        <form ref="form" @submit.stop.prevent="createPerson">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input
              type="text"
              class="form-control"
              v-model="newPerson.firstName"
              placeholder="Enter your first name"
              required
            />
          </div>
          <div class="form-group">
            <label for="middleName">Middle Name</label>
            <input
              type="text"
              class="form-control"
              v-model="newPerson.middleName"
              placeholder="Enter your middle name"
              required
            />
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input
              type="text"
              class="form-control"
              v-model="newPerson.lastName"
              placeholder="Enter your last name"
              required
            />
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input
              type="date"
              class="form-control"
              v-model="newPerson.dob"
              placeholder="Enter date of birth"
              required
            />
          </div>
          <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input
              type="tel"
              class="form-control"
              v-model="newPerson.mobile"
              placeholder="Enter Mobile Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="startDate">Start Date</label>
            <input
              type="date"
              class="form-control"
              v-model="newPerson.startDate"
              placeholder="Enter employment date"
              required
            />
          </div>

          <div class="form-group">
            <label for="company">Company</label>
            <v-select
              v-model="newPerson.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="department">Department</label>
            <v-select
              v-model="newPerson.departmentId"
              label="name"
              :options="departments"
              :reduce="(departments) => departments.id"
              placeholder="Choose Department"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input
              type="number"
              class="form-control"
              v-model="newPerson.licenseNumber"
              placeholder="Enter License Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseIssueDate">License Issue Date</label>
            <input
              type="date"
              class="form-control"
              v-model="newPerson.licenseIssueDate"
              placeholder="Enter License Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label>
            <select
              type="text"
              class="form-control"
              v-model="newPerson.licenseClass"
              placeholder="Choose license class"
              required
            >
              <option
                v-for="licenseClass in licenseClasses"
                :key="licenseClass.id"
                :value="licenseClass.id"
              >
                {{ licenseClass.name }}
              </option>
            </select>
          </div>
        </form>
      </b-modal>

      <!-- Update Person Modal -->
      <b-modal
        scrollable
        class="modal fade"
        id="updatePersonModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleUpdatePerson"
        title="Person Info"
        v-if="rowDetails == true"
      >
        <form ref="form" @submit.stop.prevent="updatePerson">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input
              type="text"
              class="form-control"
              v-model="editPerson.content.firstName"
              placeholder="Enter your first name"
              required
            />
          </div>
          <div class="form-group">
            <label for="middleName">Middle Name</label>
            <input
              type="text"
              class="form-control"
              v-model="editPerson.content.middleName"
              placeholder="Enter your middle name"
              required
            />
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input
              type="text"
              class="form-control"
              v-model="editPerson.content.lastName"
              placeholder="Enter your last name"
              required
            />
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input
              type="date"
              class="form-control"
              v-model="editPerson.content.dob"
              placeholder="Enter date of birth"
              required
            />
          </div>
          <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input
              type="tel"
              class="form-control"
              v-model="editPerson.content.mobile"
              placeholder="Enter Mobile Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="startDate">Start Date</label>
            <input
              type="date"
              class="form-control"
              v-model="editPerson.content.startDate"
              placeholder="Enter employment date"
              required
            />
          </div>

          <div class="form-group">
            <label for="company">Company</label>
            <select
              type="text"
              class="form-control"
              v-model="editPerson.content.companyId"
              placeholder="Choose company"
              required
            >
              <option
                v-for="company in company"
                :key="company.id"
                :value="company.id"
              >
                {{ company.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="department">Department</label>
            <select
              type="text"
              class="form-control"
              v-model="editPerson.content.departmentId"
              placeholder="Choose department"
              required
            >
              <option
                v-for="department in departments"
                :key="department.id"
                :value="department.id"
              >
                {{ department.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input
              type="number"
              class="form-control"
              v-model="editPerson.content.licenseNumber"
              placeholder="Enter License Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseIssueDate">License Issue Date</label>
            <input
              type="date"
              class="form-control"
              v-model="editPerson.content.licenseIssueDate"
              placeholder="Enter License Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label>
            <select
              type="text"
              class="form-control"
              v-model="editPerson.content.licenseClass"
              placeholder="Choose license class"
              required
            >
              <option
                v-for="licenseClass in licenseClasses"
                :key="licenseClass.id"
                :value="licenseClass.id"
              >
                {{ licenseClass.name }}
              </option>
            </select>
          </div>
        </form>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
export default {
  data() {
    return {
      rowDetails: false,
      loading: false,
      people: [],
      peopleFields: [
        { key: "fullName", label: "Full Name" },
        { key: "dob" },
        { key: "mobile" },
        { key: "company.name", label: "Company", sortable: true },
        { key: "startDate", sortable: true },
        {
          key: "department.name",
          label: "Department",
          sortable: true,
        },
        { key: "licenseIssueDate" },
        { key: "actions" },
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
        companyId: "",
        departmentId: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseClass: "",
      },
      //remember to activate and deactivate people
      editPerson: {
        id: "updatePersonModal",
        content: "",
      },
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
          this.company = data.company;
          this.departments = data.departments;
          this.loading = false;
        })
        .catch((error) => {
          return console.log(error);
        });
    },
    handleCreatePerson(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createPerson();
    },
    createPerson() {
      axios
        .post("http://localhost:8000/api/people", {
          firstName: this.newPerson.firstName,
          middleName: this.newPerson.middleName,
          lastName: this.newPerson.lastName,
          dob: this.newPerson.dob,
          mobile: this.newPerson.mobile,
          startDate: this.newPerson.startDate,
          companyId: this.newPerson.companyId,
          departmentId: this.newPerson.departmentId,
          licenseNumber: this.newPerson.licenseNumber,
          licenseIssueDate: this.newPerson.licenseIssueDate,
          licenseClass: this.newPerson.licenseClass,
        })
        .then((res) => console.log("Person added"))
        .catch((err) => console.log(err));
      this.$nextTick(() => {
        this.$bvModal.hide("addPersonModal");
        this.getPeople();
      });
    },
    info(item, button) {
      this.editPerson.content = item;
      this.rowDetails = true;
      this.$root.$emit("bv::show::modal", this.editPerson.id, button);
    },
    handleUpdatePerson(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.updatePerson();
    },
    updatePerson() {
      axios
        .patch(
          "http://127.0.0.1:8000/api/people/" + this.updatePerson.content.id,
          {
            firstName: this.updatePerson.content.firstName,
            middleName: this.updatePerson.content.middleName,
            lastName: this.updatePerson.content.lastName,
            dob: this.updatePerson.content.dob,
            mobile: this.updatePerson.content.mobile,
            startDate: this.updatePerson.content.startDate,
            companyId: this.updatePerson.content.companyId,
            departmentId: this.updatePerson.content.departmentId,
            licenseNumber: this.updatePerson.content.licenseNumber,
            licenseIssueDate: this.updatePerson.content.licenseIssueDate,
            licenseClass: this.updatePerson.content.licenseClass,
          }
        )
        .then((res) => {
          console.log("Person updated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updatePersonModal");
        this.getPeople();
      });
    },
    handleDeletePerson() {
      this.deletePerson();
    },
    deletePerson() {
      axios
        .delete(
          "http://127.0.0.1:8000/api/people/" + this.updatePerson.content.id
        )
        .then((res) => {
          console.log("Person Deleted");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updatePersonModal");
        this.getPeople();
      });
    },
  },
};
</script>