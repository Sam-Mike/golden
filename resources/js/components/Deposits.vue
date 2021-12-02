<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow">
        <div class="card-header py-auto">
          <div class="d-flex row justify-content-end">
            <h6 class="m-0 font-weight-bold text-primary"></h6>

            <!-- Button trigger New Deposit Modal -->
            <b-button
              size="sm"
              variant="primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.newDepositModal
            >
              New Deposit
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
            ></b-form-input>
          </b-input-group>
        </div>
        <div class="table-responsive">
          <b-table
            class="table-list"
            bordered
            striped
            hover
            :small="true"
            :items="deposits"
            :fields="depositsFields"
            :filter="tableFilter"
            :head-variant="tableHeadVariant"
            sticky-header="60vh"
          >
          </b-table>
        </div>
        <!-- </div> -->
      </div>
      <b-modal
        scrollable
        title="New Deposit"
        class="modal fade"
        button-size="sm"
        id="newDepositModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreateDeposit"
      >
        <form ref="forms" @submit.stop.prevent="createDeposit">
          <div class="form-group">
            <label for="exampleInputEmail1">Deposit Date</label>
            <input
              type="date"
              class="form-control"
              v-model="newDeposit.date"
              placeholder="Enter deposit date"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deposit Amount</label>
            <input
              type="number"
              class="form-control"
              v-model="newDeposit.amount"
              placeholder="Enter deposit amount"
              required
            />
          </div>
          <div class="form-group">
            <label for="currency">Currency</label>
            <v-select
              v-model="newDeposit.currencyId"
              label="name"
              :options="currency"
              :reduce="(currency) => currency.id"
              placeholder="Select currency"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Exchange Rate</label>
            <input
              type="number"
              min="1"
              class="form-control"
              v-model="newDeposit.exchangeRate"
              placeholder="Enter exchange rate"
              required
            />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input
              type="text"
              class="form-control"
              v-model="newDeposit.description"
              placeholder="Enter deposit description"
              required
            />
          </div>
        </form>
      </b-modal>
    </b-overlay>
  </div>
</template>
<script>
import api from "../apis/api";
export default {
  data() {
    return {
      loading: null,
      deposits: [],
      currency: [],
      newDeposit: {
        exchangeRate: 1,
      },
      depositsFields: [
        { key: "id" },
        { key: "date" },
        { key: "amount" },
        { key: "exchangeRate" },
        { key: "description" },
      ],
      tableHeadVariant: "dark",
    };
  },
  mounted() {
    this.getDeposits();
  },
  methods: {
    async getDeposits() {
      try {
        this.loading = true;
        const response = await api.get("deposits");
        this.deposits = response.data.deposits;
        this.currency = response.data.currency;
        this.loading = false;
      } catch (error) {
        console.log(error);
      }
    },
    handleCreateDeposit(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createDeposit();
    },
    async createDeposit() {
      try {
        await api.post("deposits", this.newDeposit);
        this.$nextTick(() => {
          this.$bvModal.hide("newDepositModal");
          this.getDeposits();
          this.newDeposit = {};
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>