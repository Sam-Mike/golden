<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs>
          <!-- Active People -->
          <b-tab title="Active">
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
                    :items="activePeople"
                    :fields="peopleFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                  >
                    <template #cell(Name)="data">
                      {{ data.item.firstName }} {{ data.item.middleName }}
                      {{ data.item.lastName }}
                    </template>
                    <template #cell(actions)="row">
                      <b-button size="sm" @click="info(row.item)" class="mr-1"
                        >DETAILS
                      </b-button>
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
                  <!-- Button trigger Add Person modal -->
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
                  >
                    <template #cell(Name)="data">
                      {{ data.item.firstName }} {{ data.item.middleName }}
                      {{ data.item.lastName }}
                    </template>
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="inactiveInfo(row.item)"
                        class="mr-1"
                        >DETAILS</b-button
                      >
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
        </b-tabs>
      </b-card>

      <!-- Add Person Modal -->
      <b-modal
        scrollable
        class="modal fade"
        id="addPersonModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreatePerson"
        title="Add Person"
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
              v-model="newPerson.rolePositionId"
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
        v-if="rowDetails == true"
      >
      <template #modal-footer="{ok, cancel, hide}">
        <b-button size="sm" variant="danger" @click="hide(handleDeactivatePerson())">Deactivate</b-button>
        <b-button size="sm" variant="" @click="cancel">Cancel</b-button>
        <b-button size="sm" variant="primary" @click="ok">Update</b-button>
      </template>
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
            <v-select
              v-model="editPerson.content.company.id"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <v-select
              v-model="editPerson.content.rolePosition.id"
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
          <p>{{ editPerson.content.firstName }}</p>
          <h6>Middle Name</h6>
          <p>{{ editPerson.content.middleName }}</p>
          <h6>Last Name</h6>
          <p>{{ editPerson.content.lastName }}</p>
          <h6>Date of Birth</h6>
          <p>{{ editPerson.content.dob }}</p>
          <h6>Mobile Number</h6>
          <p>{{ editPerson.content.mobile }}</p>
          <h6>Start Date</h6>
          <p>{{ editPerson.content.startDate }}</p>
          <h6>Company</h6>
          <p>{{ editPerson.content.company.name }}</p>
          <h6>Role</h6>
          <p>{{ editPerson.content.rolePosition.name }}</p>
          <h6>License Number</h6>
          <p>{{ editPerson.content.licenseNumber }}</p>
          <h6>License Issue Date</h6>
          <p>{{ editPerson.content.licenseIssueDate }}</p>
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
        { key: "mobile" },
        { key: "company.name", label: "Company", sortable: true },
        { key: "startDate", sortable: true },
        {
          key: "rolePosition.department.name",
          label: "Department",
          sortable: true,
        },
        { key: "rolePosition.name", label:"Role"},
        { key: "licenseIssueDate" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      company: [],
      rolePositions: [],
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
        rolePositionId: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseClassId: "",
      },
      editPerson: {
        id: "updatePersonModal",
        content: "",
      },
    };
  },
  computed:{
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
  mounted() {
    this.getPeople();
  },
  methods: {
    getPeople() {
      this.loading = true;
      api
        .get("people")
        .then(({ data }) => {
          this.people = data.people;
          this.company = data.company;
          this.rolePositions = data.rolePositions;
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
      api
        .post("people", {
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
        })
        .then((res) => console.log("Person added"))
        .catch((err) => console.log(err));
      this.$nextTick(() => {
        this.$bvModal.hide("addPersonModal");
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
      api
        .patch(
          "people/" + this.editPerson.content.id,
          {
            firstName: this.editPerson.content.firstName,
            middleName: this.editPerson.content.middleName,
            lastName: this.editPerson.content.lastName,
            dob: this.editPerson.content.dob,
            mobile: this.editPerson.content.mobile,
            startDate: this.editPerson.content.startDate,
            companyId: this.editPerson.content.company.id,
            rolePositionId: this.editPerson.content.rolePosition.id,
            //departmentId: this.editPerson.content.department.id,
            licenseNumber: this.editPerson.content.licenseNumber,
            licenseIssueDate: this.editPerson.content.licenseIssueDate,
            //licenseClassId: this.editPerson.content.licenseClass.id,
            activityStatusId: this.editPerson.content.activityStatus.id,
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
    handleDeactivatePerson() {
      this.deactivatePerson();
    },
    deactivatePerson() {
      api
        .patch(
          "people/" + this.editPerson.content.id,
          {
            firstName: this.editPerson.content.firstName,
            middleName: this.editPerson.content.middleName,
            lastName: this.editPerson.content.lastName,
            dob: this.editPerson.content.dob,
            mobile: this.editPerson.content.mobile,
            startDate: this.editPerson.content.startDate,
            companyId: this.editPerson.content.company.id,
            departmentId: this.editPerson.content.department.id,
            licenseNumber: this.editPerson.content.licenseNumber,
            licenseIssueDate: this.editPerson.content.licenseIssueDate,
            //licenseClassId: this.editPerson.content.licenseClass.id,
            activityStatus: 3,
          }
        )
        .then((res) => {
          console.log("Person Deactivated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("updatePersonModal");
        this.getPeople();
      });
    },
    inactiveInfo(item, button) {
      this.editPerson.content = item;
      this.rowDetails = true;
      this.$root.$emit("bv::show::modal", "inactivePersonModal", button);
    },
    handleActivatePerson() {
      this.activatePerson();
    },
    activatePerson() {
      api
        .patch(
          "people/" + this.editPerson.content.id,
          {
            firstName: this.editPerson.content.firstName,
            middleName: this.editPerson.content.middleName,
            lastName: this.editPerson.content.lastName,
            dob: this.editPerson.content.dob,
            mobile: this.editPerson.content.mobile,
            startDate: this.editPerson.content.startDate,
            companyId: this.editPerson.content.company.id,
            departmentId: this.editPerson.content.department.id,
            licenseNumber: this.editPerson.content.licenseNumber,
            licenseIssueDate: this.editPerson.content.licenseIssueDate,
            //licenseClassId: this.editPerson.content.licenseClass.id,
            activityStatus: 1,
          }
        )
        .then((res) => {
          console.log("Person Activated");
        });
      this.$nextTick(() => {
        this.$bvModal.hide("inactivePersonModal");
        this.getPeople();
      });
    },
  },
};
</script>