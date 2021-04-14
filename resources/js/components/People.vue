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
            <label for="role">Role</label>
            <v-select
              v-model="newPerson.departmentId"
              label="name"
              :options="departments"
              :reduce="(departments) => departments.id"
              placeholder="Choose Role"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <v-select
              v-model="newPerson.departmentRoleId"
              label="name"
              :options="departmentRoles[newPerson.department]"
              :reduce="(departmentRoles) => departmentRoles.id"
              placeholder="Choose Role"
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
        <form ref="form" @submit.stop.prevent="updatePerson">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input
              type="text"
              class="form-control"
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
              v-model="editPerson.rolePosition.id"
              label="name"
              :options="rolePositions"
              :reduce="(rolePositions) => rolePositions.id"
              placeholder="Choose Role"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input
              type="number"
              class="form-control"
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
              v-model="editPerson.licenseIssueDate"
              placeholder="Enter License Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label>
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
        v-if="rowDetails == true"
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
          <p>{{ editPerson.rolePosition.name }}</p>
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
      rowDetails: false,
      loading: false,
      people: [],
      peopleFields: [
        { key: "Name", label: "Name" },
        { key: "dob" },
        { key: "age", sortable:true },
        { key: "mobile" },
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
        { key: "licenseExpiryDate" },
        { key: "activityStatus.name", label: "Assignment Status" },
      ],
      tableHeadVariant: "dark",
      company: [],
      departmentRoles: [],
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
        departmentId:"",
        rolePositionId: "",
        licenseNumber: "",
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
        rolePosition: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseExpiryDate: "",
        licenseClass: "",
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
  watch:{
    roles(){

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
        this.rolePositions = response.data.rolePositions;
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
        await api.post("people", {
          firstName: this.newPerson.firstName,
          middleName: this.newPerson.middleName,
          lastName: this.newPerson.lastName,
          dob: this.newPerson.dob,
          mobile: this.newPerson.mobile,
          startDate: this.newPerson.startDate,
          companyId: this.newPerson.companyId,
          rolePositionId: this.newPerson.rolePositionId,
          licenseNumber: this.newPerson.licenseNumber,
          licenseIssueDate: this.newPerson.licenseIssueDate,
          //licenseClassId: this.newPerson.licenseClassid,
        });
        this.$nextTick(() => {
          this.$bvModal.hide("newPersonModal");
          this.newPerson.firstName = "";
          this.newPerson.middleName = "";
          this.newPerson.dob = "";
          this.newPerson.mobile = "";
          this.newPerson.startDate = "";
          this.newPerson.companyId = "";
          this.newPerson.rolePositionId = "";
          this.newPerson.licenseIssueDate = "";
          this.newPerson.firstName = "";
          this.newPerson.firstName = "";
          this.getPeople();
        });
      } catch (error) {
        console.log(error);
      }
    },
    personInfo(item, button) {
      console.log(item);
      this.editPerson.id = item.id;
      this.editPerson.firstName = item.firstName;
      this.editPerson.middleName = item.middleName;
      this.editPerson.lastName = item.lastName;
      this.editPerson.dob = item.dob;
      this.editPerson.mobile = item.mobile;
      this.editPerson.startDate = item.startDate;
      this.editPerson.company = item.company;
      this.editPerson.departmentId = item.department;
      this.editPerson.licenseNumber = item.licenseNumber;
      this.editPerson.licenseIssueDate = item.licenseIssueDate;
      this.editPerson.licenceExpiryDate = item.licenceExpiryDate;
      this.editPerson.activityStatus = item.activityStatus;
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