<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
          <!-- Active People -->
          <b-tab title="Active">
            <!-- DataTales  -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">People</h6>
                  <!-- Button trigger Create Person modal -->
                  <b-button
                    size="sm"
                    variant="primary"
                    v-b-modal.newPersonModal
                  >
                    New Person
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
                    :items="activePeople"
                    :fields="peopleFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    @row-clicked="personInfo"
                  >
                    <template #cell(Name)="data">
                      {{ data.item.firstName }} {{ data.item.middleName }}
                      {{ data.item.lastName }}
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
          <!-- Inactive People -->
          <b-tab title="In-active">
            <!-- DataTales  -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">People</h6>
                  <!-- Button trigger Create Person modal -->
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
                    :items="inactivePeople"
                    :fields="peopleFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    @row-clicked="inactivePersonInfo"
                  >
                    <template #cell(Name)="data">
                      {{ data.item.firstName }} {{ data.item.middleName }}
                      {{ data.item.lastName }}
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
        </b-tabs>
      </b-card>

      <!-- Create Person Modal -->
      <b-modal
        scrollable
        class="modal fade"
        id="newPersonModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreatePerson"
        title="New Person"
        button-size="sm"
      >
        <form id="newPersonForm" ref="form" @submit.stop.prevent="createPerson">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input
              type="text"
              class="form-control"
              name="firstName"
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
              name="middleName"
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
              name="lastName"
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
              name="dob"
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
              name="mobile"
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
              name="startDate"
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
            <label for="role">Department</label>
            <v-select
              v-model="newPerson.departmentId"
              label="name"
              :options="departments"
              :reduce="(departments) => departments.id"
              placeholder="Choose Department"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <v-select
              v-model="newPerson.departmentRoleId"
              label="name"
              :options="departmentRolesCascade"
              :reduce="(departmentRoles) => departmentRoles.id"
              placeholder="Choose Role"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input
              type="number"
              class="form-control"
              name="licenseNumber"
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
              name="licenseIssueDate"
              v-model="newPerson.licenseIssueDate"
              placeholder="Enter License Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label><br />
            <b-form-checkbox v-model="newPerson.licenseClasses" value="A"
              >A</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses" value="B"
              >B</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses" value="C"
              >C</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses" value="D"
              >D</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses" value="E"
              >E</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses" value="F"
              >F</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses" value="G"
              >G</b-form-checkbox
            >
          </div>
          <div class="form-group">
            <label for="Profile Picture">Profile Picture</label>
            <b-form-file
              size="sm"
              name="profilePicture"
              placeholder="Choose image..."
              drop-placeholder="Drop image here..."
            ></b-form-file>
          </div>
        </form>
      </b-modal>
      <!-- Update/Deactivate Person Modal -->
      <b-modal
        scrollable
        class="modal fade"
        id="updatePersonModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        @ok="handleUpdatePerson"
        title="Update Person"
      >
        <template #modal-footer="{ ok, cancel, hide }">
          <b-button
            v-if="editPerson.activityStatus.id == 1"
            size="sm"
            variant="danger"
            @click="hide(deactivatePerson())"
            >Deactivate</b-button
          >
          <b-button size="sm" variant="" @click="cancel">Cancel</b-button>
          <b-button size="sm" variant="primary" @click="ok">Update</b-button>
        </template>
        <form
          id="updatePersonForm"
          ref="form"
          @submit.stop.prevent="updatePerson"
        >
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input
              type="text"
              class="form-control"
              name="firstName"
              v-model="editPerson.firstName"
              placeholder="Enter your first name"
              required
            />
          </div>
          <div class="form-group">
            <label for="middleName">Middle Name</label>
            <input
              type="text"
              class="form-control"
              name="middleName"
              v-model="editPerson.middleName"
              placeholder="Enter your middle name"
              required
            />
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input
              type="text"
              class="form-control"
              name="lastName"
              v-model="editPerson.lastName"
              placeholder="Enter your last name"
              required
            />
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input
              type="date"
              class="form-control"
              name="dob"
              v-model="editPerson.dob"
              placeholder="Enter date of birth"
              required
            />
          </div>
          <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input
              type="tel"
              class="form-control"
              name="mobile"
              v-model="editPerson.mobile"
              placeholder="Enter Mobile Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="startDate">Start Date</label>
            <input
              type="date"
              class="form-control"
              name="startDate"
              v-model="editPerson.startDate"
              placeholder="Enter employment date"
              required
            />
          </div>

          <div class="form-group">
            <label for="company">Company</label>
            <v-select
              v-model="editPerson.company.id"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <v-select
              v-model="editPerson.departmentRole.id"
              label="name"
              :options="departmentRolesCascade"
              :reduce="(departmentRoles) => departmentRoles.id"
              placeholder="Choose Role"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input
              type="number"
              class="form-control"
              name="licenseNumber"
              v-model="editPerson.licenseNumber"
              placeholder="Enter License Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseIssueDate">License Issue Date</label>
            <input
              type="date"
              class="form-control"
              name="licenseIssueDate"
              v-model="editPerson.licenseIssueDate"
              placeholder="Enter License Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label><br />
            <b-form-checkbox v-model="editPerson.licenseClasses[0]" value="A"
              >A</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses[1]" value="B"
              >B</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses[2]" value="C"
              >C</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses[3]" value="D"
              >D</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses[4]" value="E"
              >E</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses[5]" value="F"
              >F</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses[6]" value="G"
              >G</b-form-checkbox
            >
          </div>
        </form>
      </b-modal>

      <!-- Inactive Person Modal -->
      <b-modal
        scrollable
        button-size="sm"
        class="modal fade"
        id="inactivePersonModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Activate"
        @ok="handleActivatePerson"
        title="Person Info"
      >
        <div class="modal-body">
          <h6>First Name</h6>
          <p>{{ editPerson.firstName }}</p>
          <h6>Middle Name</h6>
          <p>{{ editPerson.middleName }}</p>
          <h6>Last Name</h6>
          <p>{{ editPerson.lastName }}</p>
          <h6>Date of Birth</h6>
          <p>{{ editPerson.dob }}</p>
          <h6>Mobile Number</h6>
          <p>{{ editPerson.mobile }}</p>
          <h6>Start Date</h6>
          <p>{{ editPerson.startDate }}</p>
          <h6>Company</h6>
          <p>{{ editPerson.company.name }}</p>
          <h6>Role</h6>
          <p>{{ editPerson.departmentRole.name }}</p>
          <h6>License Number</h6>
          <p>{{ editPerson.licenseNumber }}</p>
          <h6>License Issue Date</h6>
          <p>{{ editPerson.licenseIssueDate }}</p>
          <h6>License Class</h6>
        </div>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
import api from "../apis/api";
export default {
  data() {
    return {
      loading: false,
      people: [],
      peopleFields: [
        { key: "Name", label: "Name" },
        { key: "dob" },
        { key: "age", sortable: true },
        { key: "company.name", label: "Company", sortable: true },
        {
          key: "departmentRole.department.name",
          label: "Department",
          sortable: true,
        },
        { key: "departmentRole.name", label: "Role" },
        { key: "startDate", sortable: true },
        { key: "serviceTime", sortable: true },
        { key: "licenseIssueDate" },
        { key: "licenseExpiryDate", label: "License Expiry", sortable: true },
        { key: "activityStatus.name", label: "Assignment Status" },
      ],
      tableHeadVariant: "dark",
      company: [],
      departmentRoles: [],
      departmentRolesCascade: [],
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
        departmentRoleId: "",
        licenseNumber: "",
        licenseClasses: [],
        licenseIssueDate: "",
        licenseClassId: "",
      },
      editPerson: {
        id: "",
        firstName: "",
        middleName: "",
        lastName: "",
        dob: "",
        mobile: "",
        startDate: "",
        company: "",
        department: "",
        departmentRole: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseClasses: [],
        activityStatus: "",
      },
    };
  },
  computed: {
    activePeople() {
      return this.people.filter(
        (people) =>
          people.activityStatus.id === 1 || people.activityStatus.id === 2
      );
    },
    inactivePeople() {
      return this.people.filter((people) => people.activityStatus.id === 3);
    },
  },
  watch: {
    "newPerson.departmentId": function (value) {
      this.departmentRolesCascade = this.departmentRoles.filter(
        (departmentRole) => departmentRole.department.id == value
      );
    },
    "editPerson.departmentId": function (value) {
      this.departmentRolesCascade = this.departmentRoles.filter(
        (departmentRole) => departmentRole.department.id == value
      );
    },
  },
  mounted() {
    this.getPeople();
  },
  methods: {
    async getPeople() {
      try {
        this.loading = true;
        const response = await api.get("people");
        this.people = response.data.people;
        this.company = response.data.company;
        this.departmentRoles = response.data.departmentRoles;
        this.departments = response.data.departments;
        this.loading = false;
      } catch (error) {
        console.log(error);
      }
    },
    handleCreatePerson(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.createPerson();
    },
    async createPerson() {
      try {
        let newPersonForm = document.getElementById("newPersonForm");
        let newPersonData = new FormData(newPersonForm);
        if (this.newPerson.companyId) {
          newPersonData.append("companyId", this.newPerson.companyId);
        }
        if (this.newPerson.departmentRoleId) {
          newPersonData.append(
            "departmentRoleId",
            this.newPerson.departmentRoleId
          );
        }
        if (this.newPerson.licenseClasses){
          newPersonData.append("licenseClasses", this.newPerson.licenseClasses);
        }
        const config = {
          headers: {
            "content-type": "multipart/form-data",
            enctype: "multipart/form-data",
          },
        };
        for (var person of newPersonData.entries()) {
          console.log(person);
        }
        // await api.post("people", {
        //   firstName: this.newPerson.firstName,
        //   middleName: this.newPerson.middleName,
        //   lastName: this.newPerson.lastName,
        //   dob: this.newPerson.dob,
        //   mobile: this.newPerson.mobile,
        //   startDate: this.newPerson.startDate,
        //   companyId: this.newPerson.companyId,
        //   departmentRoleId: this.newPerson.departmentRoleId,
        //   licenseNumber: this.newPerson.licenseNumber,
        //   licenseIssueDate: this.newPerson.licenseIssueDate,
        //   //licenseClassId: this.newPerson.licenseClassid,
        // });
        this.$nextTick(() => {
          // this.$bvModal.hide("newPersonModal");
          // this.newPerson.firstName = "";
          // this.newPerson.middleName = "";
          // this.newPerson.dob = "";
          // this.newPerson.mobile = "";
          // this.newPerson.startDate = "";
          // this.newPerson.companyId = "";
          // this.newPerson.departmentRoleId = "";
          // this.newPerson.licenseIssueDate = "";
          // this.newPerson.firstName = "";
          // this.newPerson.firstName = "";
          this.getPeople();
        });
      } catch (error) {
        console.log(error);
      }
    },
    personInfo(item, button) {
      this.editPerson.id = item.id;
      this.editPerson.firstName = item.firstName;
      this.editPerson.middleName = item.middleName;
      this.editPerson.lastName = item.lastName;
      this.editPerson.dob = item.dob;
      this.editPerson.mobile = item.mobile;
      this.editPerson.startDate = item.startDate;
      this.editPerson.company = item.company;
      this.editPerson.department = item.department;
      this.editPerson.departmentRole = item.departmentRole;
      this.editPerson.licenseNumber = item.licenseNumber;
      this.editPerson.licenseClasses = item.licenseClasses;
      this.editPerson.licenseIssueDate = item.licenseIssueDate;
      this.editPerson.licenceExpiryDate = item.licenceExpiryDate;
      this.$root.$emit("bv::show::modal", "updatePersonModal", button);
    },
    handleUpdatePerson(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.updatePerson();
    },
    async updatePerson() {
      try {
        await api.patch("people/" + this.editPerson.id, {
          firstName: this.editPerson.firstName,
          middleName: this.editPerson.middleName,
          lastName: this.editPerson.lastName,
          dob: this.editPerson.dob,
          mobile: this.editPerson.mobile,
          startDate: this.editPerson.startDate,
          companyId: this.editPerson.company.id,
          //departmentId: this.editPerson.licenseNumber,
          licenseIssueDate: this.editPerson.licenseIssueDate,
          //licenseClassId: this.editPerson.licenseClass.id,
          activityStatusId: this.editPerson.activityStatus.id,
        });
        this.$nextTick(() => {
          this.$bvModal.hide("updatePersonModal");
          this.getPeople();
        });
        console.log("Person updated");
      } catch (error) {}
    },
    async deactivatePerson() {
      try {
        await api.patch("people/" + this.editPerson.id, {
          firstName: this.editPerson.firstName,
          middleName: this.editPerson.middleName,
          lastName: this.editPerson.lastName,
          dob: this.editPerson.dob,
          mobile: this.editPerson.mobile,
          startDate: this.editPerson.startDate,
          companyId: this.editPerson.company.id,
          departmentId: this.editPerson.department.id,
          licenseNumber: this.editPerson.licenseNumber,
          licenseIssueDate: this.editPerson.licenseIssueDate,
          //licenseClassId: this.editPerson.licenseClass.id,
          activityStatus: 3,
        });
        console.log("Person Deactivated");
        this.$nextTick(() => {
          this.$bvModal.hide("updatePersonModal");
          this.getPeople();
        });
      } catch (error) {
        console.log(error);
      }
    },
    inactivePersonInfo(item, button) {
      this.editPerson = item;
      this.$root.$emit("bv::show::modal", "inactivePersonModal", button);
    },
    handleActivatePerson() {
      this.activatePerson();
    },
    async activatePerson() {
      try {
        await api.patch("people/" + this.editPerson.id, {
          firstName: this.editPerson.firstName,
          middleName: this.editPerson.middleName,
          lastName: this.editPerson.lastName,
          dob: this.editPerson.dob,
          mobile: this.editPerson.mobile,
          startDate: this.editPerson.startDate,
          companyId: this.editPerson.company.id,
          departmentId: this.editPerson.department.id,
          licenseNumber: this.editPerson.licenseNumber,
          licenseIssueDate: this.editPerson.licenseIssueDate,
          //licenseClassId: this.editPerson.licenseClass.id,
          activityStatus: 1,
        });
        console.log("Person Activated");
        this.$nextTick(() => {
          this.$bvModal.hide("inactivePersonModal");
          this.getPeople();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>