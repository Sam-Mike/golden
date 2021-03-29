<template>
  <div>
    <b-overlay :show="loading">
      <b-card no-body>
        <b-tabs
          active-nav-item-class="font-weight-bold text-uppercase"
          content-class="mt-2"
        >
          <b-tab title="Intimated">
            <!-- INTIMATED CLAIMS -->
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
                    :items="intimatedClaims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="claimInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Submitted Document"
            ><!-- CLAIMS WITH SUBMITTED DOCUMENTS -->
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
                    :items="submittedClaims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="claimInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Assessed"
            ><!-- ASSESSED CLAIMS -->
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
                    :items="assessedClaims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="claimInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Vouchers Discharged">
            <!-- CLAIMS WITH DISCHARGED VOUCHERS -->
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
                    :items="vouchersDischargedClaims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="claimInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Paid">
            <!-- PAID CLAIMS -->
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
                    :items="paidClaims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="claimInfo(row.item)"
                        class="mr-1"
                        >DETAILS
                      </b-button>
                    </template>
                  </b-table>
                </div>
              </div>
            </div>
          </b-tab>
          <b-tab title="Declined">
            <!-- DECLINED CLAIMS -->
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
                    :items="declinedClaims"
                    :fields="claimFields"
                    :head-variant="tableHeadVariant"
                    :sticky-header="true"
                    :filter="tableFilter"
                  >
                    <template #cell(actions)="row">
                      <b-button
                        size="sm"
                        @click="claimInfo(row.item)"
                        class="mr-1"
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
      </div>
    </b-modal>
    <!-- MODAL TO UPDATE CLAIM INFORMATION -->
    <b-modal
      scrollable
      id="updateClaimModal"
      size="xl"
      title="Update Claim"
      @ok="handleUpdateClaim"
      ><template #modal-footer="{ ok, cancel, hide }">
        <b-button
          class="float-left"
          size="sm"
          variant="danger"
          @click="hide(handleDeclineClaim())"
          >Declined Claim</b-button
        >
        <b-button size="sm" @click="cancel()">Cancel</b-button>
        <b-button size="sm" variant="primary" @click="ok()">Save</b-button>
      </template>
      <form id="claimForm" method="post">
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
                {{ editClaim.claimType.name }}
              </p>
            </b-col>
            <b-col class="border rouded">
              <b>CLAIM OBJECT</b>
              <p>
                {{ editClaim.claimObject }}
              </p>
            </b-col>
            <b-col class="border rouded">
              <b>CLAIM OBJECT OWNER</b>
              <p>
                {{ editClaim.claimObjectOwner }}
              </p>
            </b-col>
            <b-col
              v-if="editClaim.claimDocument === null"
              class="border rouded"
            >
              <b>CLAIM DOCUMENT</b>
              <b-form-file
                size="sm"
                name="claimDocument"
                placeholder="Choose file..."
                drop-placeholder="Drop file here..."
              ></b-form-file>
            </b-col>
            <b-col v-else class="border rouded">
              <b>CLAIM DOCUMENT</b>
              <p>
                <a :href="this.path + this.editClaim.claimDocument"
                  >claim document</a
                >
              </p>
            </b-col>
          </b-row>
          <!-- INCIDENT ASSESSMENT -->
          <b-row class="border rounded">
            <b-col class="border rounded">
              <b>ASSESSMENT DATE</b>
              <b-input
                name="incidentAssessDate"
                v-model="editClaim.incidentAssessDate"
                size="sm"
                type="date"
                placeholder="Enter discharge date"
              ></b-input>
            </b-col>
            <b-col class="border rounded">
              <b>ASSESSOR</b>
              <b-input
                type="text"
                v-model="editClaim.incidentAssessAgent"
                name="incidentAssessAgent"
                size="sm"
                placeholder="Enter company name"
              ></b-input>
            </b-col>
            <b-col class="border rouded">
              <b>ASSESS COMPANY</b>
              <b-input
                type="text"
                v-model="editClaim.incidentAssessCompany"
                name="incidentAssessCompany"
                size="sm"
                placeholder="Enter company name"
              ></b-input>
            </b-col>
            <b-col class="border rounded">
              <b>COMMENT</b>
              <b-input
                type="text"
                v-model="editClaim.incidentAssessComment"
                name="incidentAssessComment"
                size="sm"
                placeholder="Enter company name"
              ></b-input>
            </b-col>
            <b-col
              v-if="this.editClaim.incidentAssessDocument === null"
              class="border rouded"
            >
              <b>ASSESSMENT DOCUMENT</b>
              <b-form-file
                size="sm"
                name="incidentAssessDocument"
                placeholder="Choose file..."
                drop-placeholder="Drop file here..."
              ></b-form-file>
            </b-col>
            <b-col v-else class="border rouded">
              <b>ASSESSMENT DOCUMENT</b>
              <p>
                <a :href="this.path + this.editClaim.incidentAssessDocument"
                  >assessment document</a
                >
              </p>
            </b-col>
          </b-row>
          <!-- DISCHARGE VOUCHER INFORMATION -->
          <b-row class="border rounded">
            <b-col class="border rounded">
              <b>DISCHARGE VOUCHER DATE</b>
              <b-input
                size="sm"
                type="date"
                placeholder="Enter discharge date"
                v-model="editClaim.dischargeVoucherDate"
                name="dischargeVoucherDate"
              ></b-input>
            </b-col>
            <b-col class="border rouded">
              <b>COMMENT</b>
              <b-input
                type="text"
                size="sm"
                v-model="editClaim.dischargeVoucherComment"
                name="dischargeVoucherComment"
                placeholder="Enter comment"
              ></b-input>
            </b-col>
            <b-col
              v-if="this.editClaim.dischargeVoucherDocument === null"
              class="border rouded"
            >
              <b>DISCHARGE VOUCHER DOCUMENT</b>
              <b-form-file
                size="sm"
                name="dischargeVoucherDocument"
                placeholder="Choose file..."
                drop-placeholder="Drop file here..."
              ></b-form-file>
            </b-col>
            <b-col v-else class="border rouded">
              <b>DISCHARGE VOUCHER DOCUMENT</b>
              <p>
                <a :href="this.path + this.editClaim.dischargeVoucherDocument"
                  >discharge voucher document</a
                >
              </p>
            </b-col>
          </b-row>
          <!-- PAYMENT INFORMATION -->
          <b-row class="border rounded">
            <b-col class="border rounded">
              <b>PAYMENT DATE</b>
              <b-input
                type="date"
                size="sm"
                v-model="editClaim.paymentDate"
                name="paymentDate"
                placeholder="enter payment dATE"
              ></b-input>
            </b-col>
            <b-col class="border rounded">
              <b>PAYMENT COMMENT</b>
              <b-input
                type="text"
                size="sm"
                v-model="editClaim.paymentComment"
                name="paymentComment"
                placeholder="enter payment comment"
              ></b-input>
            </b-col>
            <b-col
              v-if="this.editClaim.paymentDocument === null"
              class="border rouded"
            >
              <b>PAYMENT DOCUMENT</b>
              <b-form-file
                size="sm"
                name="paymentDocument"
                placeholder="Choose a file or drop it here..."
                drop-placeholder="Drop file here..."
              ></b-form-file>
            </b-col>
            <b-col v-else class="border rouded">
              <b>PAYMENT DOCUMENT</b>
              <p>
                <a :href="this.path + this.editClaim.paymentDocument"
                  >payment document</a
                >
              </p>
            </b-col>
          </b-row>
        </b-container>
      </form>
    </b-modal>
  </div>
</template>
<script>
import api from "../apis/api";
export default {
  data() {
    return {
      path: "http://127.0.0.1:8000/storage/app/",
      loading: false,
      claims: [],
      company: [],
      clients: [],
      claimType: [], //load also trucks, trailers, goods, fidelity
      claimFields: [
        { key: "claimObject", label: "Claim Object", sortable: true },
        { key: "claimObjectOwner", sortable: true },
        { key: "claimType.name", label: "Claim Type", sortable: true },
        { key: "incidentAssessAgent", label: "Incindent Assess Agent" },
        {
          key: "incidentAssessCompany",
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
        claimObjectOwner: "",
      },
      editClaim: {
        id: "",
        claimType: "",
        claimObject: "",
        claimObjectOwner: "",
        claimDocument: "",
        incidentAssessAgent: "",
        incidentAssessCompany: "",
        incidentAssessDate: "",
        incidentAssessComment: "",
        incidentAssessDocument: "",
        dischargeVoucherDate: "",
        dischargeVoucherDocument: "",
        dischargeVoucherComment: "",
        paymentDate: "",
        paymentDocument: "",
        paymentComment: "",
        claimStatus: "",
      },
    };
  },
  computed: {
    clientsWithTransporters() {
      const clientTransporter = this.clients.concat(this.company);
      return clientTransporter.map((item) => item.name);
    },
    intimatedClaims() {
      return this.claims.filter((claim) => claim.claimStatus === "intimated");
    },
    submittedClaims() {
      return this.claims.filter(
        (claim) => claim.claimStatus === "has_claim_document"
      );
    },
    assessedClaims() {
      return this.claims.filter((claim) => claim.claimStatus === "assessed");
    },
    vouchersDischargedClaims() {
      return this.claims.filter(
        (claim) => claim.claimStatus === "has_discharge_voucher"
      );
    },
    paidClaims() {
      return this.claims.filter((claim) => claim.claimStatus === "paid");
    },
    declinedClaims() {
      return this.claims.filter((claim) => claim.claimStatus === "declined");
    },
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
        this.$nextTick(() => {
          this.$bvModal.hide("createClaimModal");
          this.getClaims();
        });
      } catch (error) {
        console.log(error);
      }
    },
    claimInfo(item, button) {
      this.editClaim.id = item.id;
      this.editClaim.claimType = item.claimType;
      this.editClaim.claimObject = item.claimObject;
      this.editClaim.claimObjectOwner = item.claimObjectOwner;
      this.editClaim.claimDocument = item.claimDocument;
      this.editClaim.incidentAssessAgent = item.incidentAssessAgent;
      this.editClaim.incidentAssessCompany = item.incidentAssessCompany;
      this.editClaim.incidentAssessComment = item.incidentAssessComment;
      this.editClaim.incidentAssessDate = item.incidentAssessDate;
      this.editClaim.incidentAssessDocument = item.incidentAssessDocument;
      this.editClaim.dischargeVoucherDate = item.dischargeVoucherDate;
      this.editClaim.dischargeVoucherDocument = item.dischargeVoucherDocument;
      this.editClaim.dischargeVoucherComment = item.dischargeVoucherComment;
      this.editClaim.paymentDate = item.paymentDate;
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
        let claimForm = document.getElementById("claimForm");
        let claimData = new FormData(claimForm);
        claimData.append("_method", "PATCH");
        for (var entry of claimData.entries()) {
          console.log(entry);
        }
        const config = {
          headers: {
            "content-type": "multipart/form-data",
            enctype: "multipart/form-data",
          },
        };
        //patching the claim
        await api
          .post("claims/" + this.editClaim.id, claimData, config)
          .then((response) => console.log(response))
          .catch((error) => console.log(error));
        this.$nextTick(() => {
          this.$bvModal.hide("updateClaimModal");
          this.getClaims();
        });
      } catch (error) {
        console.log(error);
      }
    },
    handleDeclineClaim() {
      this.declineClaim();
    },
    async declineClaim() {
      try {
        this.editClaim.claimStatus = 6;
        await api.patch("claims/" + this.editClaim.id, this.editClaim);
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