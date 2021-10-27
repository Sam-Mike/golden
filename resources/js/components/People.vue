<template>
  <div>
    <b-overlay :show="loading">
      <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
        <!-- COACH People -->
        <b-tab title="COACH">
          <!-- DataTales  -->
          <div class="card shadow">
            <div class="card-header py-auto">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <!-- Button trigger Create Person modal -->
                <b-button size="sm" variant="primary" v-b-modal.newPersonModal>
                  Add New Person
                </b-button>
              </div>
            </div>
            <!-- <div class="card-body"> -->
            <div class="table-search">
              <b-input-group size="sm">
                <b-form-input
                  id="tableFilter"
                  type="search"
                  v-model="tableFilter"
                  placeholder="Search"
                  size="sm"
                ></b-form-input>
              </b-input-group>
            </div>
            <div class="table-responsive-sm">
              <b-table
                class="table-list"
                responsive
                bordered
                striped
                hover
                :small="true"
                :items="coachPeople"
                :fields="peopleFields"
                :filter="tableFilter"
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
            <!-- </div> -->
          </div>
        </b-tab>
        <!-- FLEET People -->
        <b-tab title="FLEET">
          <!-- DataTales  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <!-- Button trigger Create Person modal -->
                <b-button size="sm" variant="primary" v-b-modal.newPersonModal>
                  Add New Person
                </b-button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-search">
                <b-input-group size="sm">
                  <b-form-input
                    id="tableFilter"
                    type="search"
                    v-model="tableFilter"
                    placeholder="Search"
                  ></b-form-input>
                </b-input-group>
              </div>
              <div class="table-responsive">
                <b-table
                  class="table-list"
                  responsive
                  bordered
                  striped
                  hover
                  :small="true"
                  :items="fleetPeople"
                  :fields="peopleFields"
                  :filter="tableFilter"
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
        <!-- WHEELS People -->
        <b-tab title="WHEELS">
          <!-- DataTales  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <!-- Button trigger Create Person modal -->
                <b-button size="sm" variant="primary" v-b-modal.newPersonModal>
                  Add New Person
                </b-button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-search">
                <b-input-group size="sm">
                  <b-form-input
                    id="tableFilter"
                    type="search"
                    v-model="tableFilter"
                    placeholder="Search"
                  ></b-form-input>
                </b-input-group>
              </div>
              <div class="table-responsive">
                <b-table
                  class="table-list"
                  responsive
                  bordered
                  striped
                  hover
                  :small="true"
                  :items="wheelsPeople"
                  :fields="peopleFields"
                  :filter="tableFilter"
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
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <!-- Button trigger Create Person modal -->
              </div>
            </div>
            <div class="card-body">
              <div class="table-search">
                <b-input-group size="sm">
                  <b-form-input
                    id="tableFilter"
                    type="search"
                    v-model="tableFilter"
                    placeholder="Search"
                  ></b-form-input>
                </b-input-group>
              </div>
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
                  :filter="tableFilter"
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
        <form
          id="newPersonForm"
          ref="form"
          @submit.stop.prevent="createPerson"
          enctype="multipart/form-data"
        >
          <div class="form-group">
            <label for="employeeNumber">Employee Number</label>
            <input
              type="number"
              class="form-control"
              name="employeeNumber"
              size="20"
              v-model="newPerson.employeeNumber"
              placeholder="Enter Employee Number"
              required
            />
          </div>
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
            <label for="nidaNumber">NIDA Number</label>
            <input
              type="text"
              class="form-control"
              name="nidaNumber"
              v-model="newPerson.nidaNumber"
              placeholder="Enter NIDA Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="ssNumber">Social Security Number</label>
            <input
              type="number"
              class="form-control"
              name="ssNumber"
              v-model="newPerson.ssNumber"
              placeholder="Enter Social Security Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="tinNumber">TIN</label>
            <input
              type="number"
              class="form-control"
              name="tinNumber"
              v-model="newPerson.tinNumber"
              placeholder="Enter TIN"
              required
            />
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
            <label for="licenseExpiryDate">License Expiry Date</label>
            <input
              type="date"
              class="form-control"
              name="licenseExpiryDate"
              v-model="newPerson.licenseExpiryDate"
              placeholder="Enter License Expiry Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label><br />
            <b-form-checkbox v-model="newPerson.licenseClasses.classA"
              >A</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses.classB"
              >B</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses.classC"
              >C</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses.classD"
              >D</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses.classE"
              >E</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses.classF"
              >F</b-form-checkbox
            >
            <b-form-checkbox v-model="newPerson.licenseClasses.classG"
              >G</b-form-checkbox
            >
          </div>
          <div class="form-group">
            <label for="passportNumber">Passport Number</label>
            <input
              type="number"
              class="form-control"
              name="passportNumber"
              v-model="newPerson.passportNumber"
              placeholder="Enter Passport Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="passportIssueDate">Passport Issue Date</label>
            <input
              type="date"
              class="form-control"
              name="passportIssueDate"
              v-model="newPerson.passportIssueDate"
              placeholder="Enter Passport Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="passportExpiryDate">Passport Expiry Date</label>
            <input
              type="date"
              class="form-control"
              name="passportExpiryDate"
              v-model="newPerson.passportExpiryDate"
              placeholder="Enter Passport Expiry Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="nextKinName">Next of Kin</label>
            <input
              type="text"
              class="form-control"
              name="nextKinName"
              v-model="newPerson.nextKinName"
              placeholder="Enter name of next of kin"
              required
            />
          </div>
          <div class="form-group">
            <label for="nextKinMobile">Next of Kin Mobile Contact</label>
            <input
              type="tel"
              class="form-control"
              name="nextKinMobile"
              v-model="newPerson.nextKinMobile"
              placeholder="Enter mobile contact of next of kin"
              required
            />
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
          enctype="multipart/form-data"
        >
          <img
            id="profile-picture"
            v-bind:src="editPerson.profilePicture"
            alt=""
            style="
              border-radius: 50%;
              width: 100px;
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 50%;
            "
          />
          <div class="form-group">
            <label for="employeeNumber">Employee Number</label>
            <input
              type="number"
              class="form-control"
              name="employeeNumber"
              v-model="editPerson.employeeNumber"
              placeholder="Enter Employee Number"
              required
            />
          </div>
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
              v-model="editPerson.companyId"
              label="name"
              :options="company"
              :reduce="(company) => company.id"
              placeholder="Choose Company"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="role">Department</label>
            <v-select
              v-model="editPerson.departmentId"
              label="name"
              :options="departments"
              :reduce="(departments) => departments.id"
              placeholder="Choose Department"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <v-select
              v-model="editPerson.departmentRoleId"
              label="name"
              :options="departmentRolesCascade"
              :reduce="(departmentRoles) => departmentRoles.id"
              placeholder="Choose Role"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="nidaNumber">NIDA Number</label>
            <input
              type="text"
              class="form-control"
              name="nidaNumber"
              v-model="editPerson.nidaNumber"
              placeholder="Enter NIDA Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="ssNumber">Social Security Number</label>
            <input
              type="number"
              class="form-control"
              name="ssNumber"
              v-model="editPerson.ssNumber"
              placeholder="Enter Social Security Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="tinNumber">TIN</label>
            <input
              type="number"
              class="form-control"
              name="tinNumber"
              v-model="editPerson.tinNumber"
              placeholder="Enter TIN"
              required
            />
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
            <label for="licenseExpiryDate">License Expiry Date</label>
            <input
              type="date"
              class="form-control"
              name="licenseExpiryDate"
              v-model="editPerson.licenseExpiryDate"
              placeholder="Enter License Expiry Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="licenseClass">License Class</label><br />
            <b-form-checkbox v-model="editPerson.licenseClasses.classA"
              >A</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses.classB"
              >B</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses.classC"
              >C</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses.classD"
              >D</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses.classE"
              >E</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses.classF"
              >F</b-form-checkbox
            >
            <b-form-checkbox v-model="editPerson.licenseClasses.classG"
              >G</b-form-checkbox
            >
          </div>
          <div class="form-group">
            <label for="passportNumber">Passport Number</label>
            <input
              type="number"
              class="form-control"
              name="passportNumber"
              v-model="editPerson.passportNumber"
              placeholder="Enter Passport Number"
              required
            />
          </div>
          <div class="form-group">
            <label for="passportIssueDate">Passport Issue Date</label>
            <input
              type="date"
              class="form-control"
              name="passportIssueDate"
              v-model="editPerson.passportIssueDate"
              placeholder="Enter Passport Issue Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="passportExpiryDate">Passport Expiry Date</label>
            <input
              type="date"
              class="form-control"
              name="passportExpiryDate"
              v-model="editPerson.passportExpiryDate"
              placeholder="Enter Passport Expiry Date"
              required
            />
          </div>
          <div class="form-group">
            <label for="nextKinName">Next of Kin</label>
            <input
              type="text"
              class="form-control"
              name="nextKinName"
              v-model="editPerson.nextKinName"
              placeholder="Enter name of next of kin"
              required
            />
          </div>
          <div class="form-group">
            <label for="nextKinMobile">Next of Kin Mobile Contact</label>
            <input
              type="tel"
              class="form-control"
              name="nextKinMobile"
              v-model="editPerson.nextKinMobile"
              placeholder="Enter mobile contact of next of kin"
              required
            />
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
          <img
            id="profile-picture"
            v-bind:src="editPerson.profilePicture"
            alt=""
            style="
              border-radius: 50%;
              width: 100px;
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 50%;
            "
          />
          <h6>Employee Number</h6>
          <p>{{ editPerson.employeeNumber }}</p>
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
          <h6>NIDA Number</h6>
          <p>{{ editPerson.nidaNumber }}</p>
          <h6>License Number</h6>
          <p>{{ editPerson.licenseNumber }}</p>
          <h6>License Issue Date</h6>
          <p>{{ editPerson.licenseIssueDate }}</p>
          <h6>Next of Kin</h6>
          <p>{{ editPerson.nextKinName }}</p>
          <h6>Next of Kin Mobile Contact</h6>
          <p>{{ editPerson.nextKinMobile }}</p>
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
        { key: "employeeNumber", label: "Emp. No", sortable: true },
        { key: "Name", label: "Name", sortable: true },
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
        { key: "activityStatus.name", label: "Assignment Status" },
      ],
      tableFilter: null,
      tableHeadVariant: "dark",
      company: [],
      departmentRoles: [],
      departmentRolesCascade: [],
      departments: [],
      newPerson: {
        employeeNumber: "",
        firstName: "",
        middleName: "",
        lastName: "",
        dob: "",
        mobile: "",
        startDate: "",
        companyId: "",
        departmentId: "",
        departmentRoleId: "",
        nidaNumber: "",
        ssNumber: "",
        tinNumber: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseExpiryDate: "",
        licenseClasses: {
          classA: false,
          classB: false,
          classC: false,
          classD: false,
          classE: false,
          classF: false,
          classG: false,
        },
        passportNumber: "",
        passportIssueDate: "",
        passportExpiryDate: "",
        nextKinName: "",
        nextKinMobile: "",
        activityStatus: "",
      },
      editPerson: {
        id: "",
        employeeNumber: "",
        firstName: "",
        middleName: "",
        lastName: "",
        dob: "",
        profilePicture: "",
        mobile: "",
        startDate: "",
        company: "",
        companyId: "",
        departmentId: "",
        departmentRole: "",
        departmentRoleId: "",
        nidaNumber: "",
        ssNumber: "",
        tinNumber: "",
        licenseNumber: "",
        licenseIssueDate: "",
        licenseExpiryDate: "",
        licenseClasses: "",
        passportNumber: "",
        passportIssueDate: "",
        passportExpiryDate: "",
        nextKinName: "",
        nextKinMobile: "",
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
    coachPeople() {
      return this.people.filter(
        (people) =>
          people.company.id === 1 &&
          (people.activityStatus.id === 1 || people.activityStatus.id === 2)
      );
    },
    fleetPeople() {
      return this.people.filter(
        (people) =>
          people.company.id === 2 &&
          (people.activityStatus.id === 1 || people.activityStatus.id === 2)
      );
    },
    wheelsPeople() {
      return this.people.filter(
        (people) =>
          people.company.id === 3 &&
          (people.activityStatus.id === 1 || people.activityStatus.id === 2)
      );
    },
    inactivePeople() {
      return this.people.filter((people) => people.activityStatus.id === 3);
    },
    sortOptions() {
      // Create an options list from our fields
      return this.peopleFields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
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
      bvModalEvt.preventDefault();
      this.createPerson();
    },
    async createPerson() {
      try {
        let newPersonForm = document.getElementById("newPersonForm");
        let newPersonFormData = new FormData(newPersonForm);
        if (this.newPerson.companyId) {
          newPersonFormData.append("companyId", this.newPerson.companyId);
        }
        if (this.newPerson.departmentRoleId) {
          newPersonFormData.append(
            "departmentRoleId",
            this.newPerson.departmentRoleId
          );
        }
        if (this.newPerson.licenseClasses) {
          newPersonFormData.append(
            "licenseClasses",
            JSON.stringify(this.newPerson.licenseClasses)
          );
        }
        const config = {
          headers: {
            "content-type": "multipart/form-data",
            //enctype: "multipart/form-data",
          },
        };
        for (var person of newPersonFormData.entries()) {
          console.log(person);
        }
        await api
          .post("people", newPersonFormData, config)
          .then((response) => console.log(response))
          .catch((error) => console.log(error));
        this.$nextTick(() => {
          this.$bvModal.hide("newPersonModal");
          this.getPeople();
        });
      } catch (error) {
        console.log(error);
      }
    },
    personInfo(item, button) {
      this.editPerson.id = item.id;
      this.editPerson.employeeNumber = item.employeeNumber;
      this.editPerson.firstName = item.firstName;
      this.editPerson.middleName = item.middleName;
      this.editPerson.lastName = item.lastName;
      this.editPerson.dob = item.dob;
      this.editPerson.profilePicture = item.profilePicture;
      this.editPerson.mobile = item.mobile;
      this.editPerson.startDate = item.startDate;
      this.editPerson.companyId = item.company.id;
      this.editPerson.departmentId = item.departmentRole.department.id;
      this.editPerson.departmentRoleId = item.departmentRole.id;
      this.editPerson.nidaNumber = item.nidaNumber;
      this.editPerson.ssNumber = item.ssNumber;
      this.editPerson.tinNumber = item.tinNumber;
      this.editPerson.licenseNumber = item.licenseNumber;
      this.editPerson.licenseClasses = item.licenseClasses;
      this.editPerson.licenseIssueDate = item.licenseIssueDate;
      this.editPerson.licenseExpiryDate = item.licenceExpiryDate;
      this.editPerson.passportNumber = item.passportNumber;
      this.editPerson.passportIssueDate = item.passportIssueDate;
      this.editPerson.passportExpiryDate = item.passportExpiryDate;
      this.editPerson.nextKinName = item.nextKinName;
      this.editPerson.nextKinMobile = item.nextKinMobile;
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
        let updatePersonForm = document.getElementById("updatePersonForm");
        let updatePersonFormData = new FormData(updatePersonForm);
        updatePersonFormData.append("_method", "PATCH");
        updatePersonFormData.append(
          "activityStatusId",
          this.editPerson.activityStatus.id
        );
        if (this.editPerson.companyId) {
          updatePersonFormData.append("companyId", this.editPerson.companyId);
        }
        if (this.editPerson.departmentRoleId) {
          updatePersonFormData.append(
            "departmentRoleId",
            this.editPerson.departmentRoleId
          );
        }
        if (this.editPerson.licenseClasses) {
          updatePersonFormData.append(
            "licenseClasses",
            JSON.stringify(this.editPerson.licenseClasses)
          );
        }
        for (var person of updatePersonFormData.entries()) {
          console.log(person);
        }
        await api
          .post("people/" + this.editPerson.id, updatePersonFormData)
          .then((response) => console.log(response))
          .catch((error) => console.log(error));
        this.$nextTick(() => {
          this.$bvModal.hide("updatePersonModal");
          this.getPeople();
        });
        console.log("Person updated");
      } catch (error) {
        console.log(error);
      }
    },
    async deactivatePerson() {
      try {
        await api.patch("switch_person_activity/" + this.editPerson.id, {
          activityStatusId: 3,
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
        await api.patch("switch_person_activity/" + this.editPerson.id, {
          activityStatusId: 1,
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