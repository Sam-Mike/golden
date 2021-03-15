<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs
          active-nav-item-class="font-weight-bold text-uppercase"
          content-class="mt-2"
        >
          <b-tab title="Intimated">
            <!-- CLAIMS WITH PENDING INFORMATION -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                    Intimated Claims
                  </h6>
                  <b-button
                    size="sm"
                    variant="primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    v-b-modal.createClaimModal
                  >
                    New Claim
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
                    :items="claims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
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
          <b-tab title="Submitted Document"
            ><!-- LOCAL TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Claims</h6>
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
                    :items="claims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
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
          <b-tab title="Assessed"
            ><!-- TRANSIT TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Claims</h6>
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
                    :items="claims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
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
          <b-tab title="Vouchers Discharged">
            <!-- ARCHIVE TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Claims</h6>
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
                    :items="claims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
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
          <b-tab title="Paid">
            <!-- ARCHIVE TRIPS -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Claims</h6>
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
                    :items="claims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
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
          <b-tab title="Declined">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="d-flex row justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Claims</h6>
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
                    :items="claims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
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
        </b-tabs>
      </b-card>
    </b-overlay>
    <!-- MODAL TO CREATE CLAIM -->
    <b-modal
      scrollable
      ok-title="Save"
      id="createClaimModal"
      size="lg"
      title="Create Claim"
      @ok="handleCreateClaim"
    >
      <form ref="forms" @submit.stop.prevent="createTrailer">
        <div class="form-group">
          <label for="">Claim Type</label>
          <v-select
            v-model="newClaim.claimTypeId"
            :options="claimType"
            label="name"
            placeholder="Choose Claim Type"
            :reduce="(claimType) => claimType.id"
          ></v-select>
        </div>
        <div class="form-group">
          <label for="">Claim Object</label>
          <input
            type="text"
            class="form-control"
            v-model="newClaim.claimObject"
            placeholder="Enter Claim Subject eg. Truck Number"
            required
          />
        </div>
        <div class="form-group">
          <label for="">Claim Object Owner</label>
          <v-select
            v-model="newClaim.claimObjectOwner"
            :options="clientsWithTransporters"
            label="name"
            placeholder="Choose Company"
            :reduce="(clientsWithTransporters) => clientsWithTransporters"
          ></v-select>
        </div></form
    ></b-modal>
    <!-- MODAL TO UPDATE CLAIM INFORMATION -->
    <b-modal
      scrollable
      id="updateClaimModal"
      size="xl"
      title="Update Claim Info"
      @ok="handleUpdateClaim"
      ><template #modal-footer="{ ok, cancel, hide }">
        <b-button
          class="float-left"
          size="sm"
          variant="danger"
          @click="hide(handleEndClaim())"
          >End Claim</b-button
        >
        <b-button size="sm" @click="cancel()">Cancel</b-button>
        <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
      </template>
      <b-container fluid>
        <!-- CLAIM INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>CLAIM NO.</b>
            <p>
              {{ editClaim.id }}
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>CLAIM TYPE</b>
            <p>
              {{ editClaim.claimType.id }}
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>CLAIM SUBJECT</b>
            <p>
              {{ editClaim.claimObject }}
            </p>
          </b-col>
        </b-row>
        <!-- INCIDENT ASSESSMENT -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>ASSESSOR</b>
            <p>
              <b-input
                v-model="editClaim.incidentAssessorName"
                size="sm"
                placeholder="Enter company name"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>ASSESS COMPANY</b>
            <p>
              <b-input
                v-model="editClaim.incidentAssessorCompany"
                size="sm"
                placeholder="Enter company name"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>COMMENT</b>
            <p>
              <b-input
                v-model="editClaim.incidentAssessorComment"
                size="sm"
                placeholder="Enter company name"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>DATE</b>
            <p>
            <b-input
                v-model="editClaim.incidentAssessDate"
                size="sm"
                type="date"
                placeholder="Enter discharge date"
              ></b-input>
            </p>
          </b-col>
        </b-row>
        <!-- DISCHARGE VOUCHER INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>DISCHARGE VOUCHER DOCUMENT</b>
            <p>
              <b-input
                size="sm"
                type="date"
                placeholder="Enter discharge date"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>COMMENT</b>
            <p>
              <b-input
                size="sm"
                v-model="editClaim.dischargeVoucherComment"
                placeholder="Enter comment"
              ></b-input>
            </p>
          </b-col>
        </b-row>
        <!-- PAYMENT INFORMATION -->
        <b-row class="border rounded">
          <b-col class="border rounded">
            <b>PAYMENT DOCUMENT</b>
            <p>
              <b-input
                size="sm"
                v-model="editClaim.paymentDocument"
                placeholder="select payment document"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rounded">
            <b>PAYMENT COMMENT</b>
            <p>
              <b-input
                size="sm"
                v-model="editClaim.paymentComment"
                placeholder="enter payment comment"
              ></b-input>
            </p>
          </b-col>
          <b-col class="border rouded">
            <b>MANIFEST DOCUMENT</b>
            <p>
              <!-- <b-form-file
                size="sm"
                v-model="file1"
                :state="Boolean(file1)"
                placeholder="Choose a file or drop it here..."
                drop-placeholder="Drop file here..."
              ></b-form-file> -->
            </p>
          </b-col>
        </b-row>
      </b-container>
    </b-modal>
  </div>
</template>
<script>
import api from "../apis/api";
export default {
  data() {
    return {
      loading: false,
      claims: [],
      company: [],
      clients: [],
      claimType: [], //load also trucks, trailers, goods, fidelity
      claimFields: [
        { key: "claimObject", label: "Claim Object", sortable: true },
        { key: "claimObjectOwner", sortable: true },
        { key: "claimType.name", label: "Claim Type", sortable: true },
        { key: "incidentAssessorName", label: "Incindent Assessor" },
        {
          key: "incidentAssessorCompany",
          label: "Assess Company",
          sortable: true,
        },
        { key: "incidentAssessDate", label: "Assessment Date" },
        { key: "incidentAssessComment", label: "Assessment Comment" },
        { key: "dischargeVoucher", label: "DischargeVoucher" },
        { key: "actions" },
      ],
      tableHeadVariant: "dark",
      tableFilter: null,
      newClaim: {
        claimTypeId: "",
        claimObject: "",
        claiObjectOwner: "",
      },
      editClaim: {
        claimType: "",
        claimObject: "",
        claimObjectOwner:"",
        claimDocument: "",
        incidentAssessorName: "",
        incidentAssessorCompany: "",
        incidentAssessDate: "",
        incidentAssessComment: "",
        incidentAssessDocument: "",
        dischargeVoucherDocument: "",
        dischargeVoucherComment: "",
        paymentDocument: "",
        paymentComment: "",
      },
    };
  },
  computed: {
    clientsWithTransporters(){
      const clientTransporter =  this.clients.concat(this.company);
      const final = clientTransporter.map(item=>item.name);
      return final;
    }
  },
  mounted() {
    this.getClaims();
  },
  methods: {
    async getClaims() {
      try {
        this.loading = true;
        const response = await api.get("claims");
        this.claims = response.data.claims;
        this.claimType = response.data.claimType;
        this.company = response.data.company;
        this.clients = response.data.clients;
        this.loading = false;
        console.log("claims loaded");
      } catch (error) {
        console.log(error);
      }
    },
    handleCreateClaim(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createClaim();
    },
    async createClaim() {
      try {
        await api.post("claims", this.newClaim);
        console.log("claim created");
        this.$nextTick(() => {
          this.$bvModal.hide("createClaimModal");
          this.getClaims();
        });
      } catch (error) {
        console.log(error);
      }
    },
    info(item, button) {
      console.log(item);
      this.editClaim.id = item.id;
      this.editClaim.claimType = item.claimType;
      this.editClaim.claimObject = item.claimObject;
      this.editClaim.claimObjectOwner = item.claimObjectOwner;
      this.editClaim.claimDocument = item.claimDocument;
      this.editClaim.incidentAssessorName = item.incidentAssessorName;
      this.editClaim.incidentAssessorCompany = item.incidentAssessorCompany;
      this.editClaim.incidentAssessComment = item.incidentAssessComment;
      this.editClaim.incidentAssessDate = item.incidentAssessDate;
      this.editClaim.incidentAssessDocument = item.incidentAssessDocument;
      this.editClaim.dischargeVoucherDocument = item.dischargeVoucherDocument;
      this.editClaim.dischargeVoucherComment = item.dischargeVoucherComment;
      this.editClaim.paymentDocument = item.paymentDocument;
      this.editClaim.paymentComment = item.paymentComment;

      this.$root.$emit("bv::show::modal", "updateClaimModal", button);
    },
    //UPDATE TRIP INFORMATION
    handleUpdateClaim(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.updateClaim();
    },
    async updateClaim() {
      try {
        await api.patch("/claims/" + this.editClaim.id, {
          claimTypeId: this.editClaim.claimType.id,
          claimObject: this.editClaim.claimObject,
          claimObjectOwner: this.editClaim.claimObjectOwner,
          claimDocument: this.editClaim.claimDocument,
          incidentAssessorName: this.editClaim.incidentAssessorName,
          incidentAssessorCompany: this.editClaim.incidentAssessorCompany,
          incidentAssessorComment: this.editClaim.incidentAssessorComment,
          incidentAssessorDate: this.editClaim.incidentAssessorDate,
          incidentAssessDocument: this.editClaim.incidentAssessDocument,
          dischargeVoucherDocument: this.editClaim.dischargeVoucherDocument,
          dischargeVoucherComment: this.editClaim.dischargeVoucherComment,
          paymentDocument: this.editClaim.paymentDocument,
          paymentComment: this.editClaim.paymentComment,
        });
        console.log("claim updated successfully");
        this.$nextTick(() => {
          this.$bvModal.hide("updateClaimModal");
          this.getClaims();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleEndClaim(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.endClaim();
    },
    async endClaim() {
      //need to check if all status are filled before end claim
      try {
        await api.patch("claims/" + this.editClaim.id, {
          claimStatus: this.editClaim.claimStatus,
          clientId: this.editClaim.client.id,
          cargoId: this.editClaim.client.id,

          // set truck, trailer and driver activity status to free again
        });
        console.log("claim archived successfully");
        this.$nextTick(() => {
          this.$bvModal.hide("updateClaimModal");
          this.getClaims();
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<style lang="stylus"></style>