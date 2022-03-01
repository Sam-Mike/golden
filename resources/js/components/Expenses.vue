<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow">
        <div class="card-header py-auto">
          <div class="col-md-auto justify-content-end">
            <h6 class="m-0 font-weight-bold text-primary"></h6>

            <!-- Button trigger New Expense Modal -->
            <b-button
              class="float-right"
              size="sm"
              variant="primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.newExpenseModal
            >
              New Expense
            </b-button>
          </div>
        </div>
        <!-- <div class="card-body"> -->
        <!-- <div class="table-search"></div> -->
        <!-- date range picking -->
        <div class="m-2 row justify-content-start">
          <div class="col">
            <b-input-group size="sm">
              <b-form-input
                id="tableFilter"
                type="search"
                v-model="tableFilter"
                placeholder="Search"
              ></b-form-input>
            </b-input-group>
          </div>
          <div class="col">
             <b-input-group size="sm">
              <b-form-input
                id="from"
                type="date"
                v-model="dateRange.from"
                placeholder="to"
              ></b-form-input>
            </b-input-group>
            <!-- <b-form-datepicker
              id="range-datepicker"
              v-model="minDate"
              class="mb-2"
              size="sm"
              placeholder="min date"
            ></b-form-datepicker> -->
          </div>
          <div class="col">
             <b-input-group size="sm">
              <b-form-input
                id="to"
                type="date"
                v-model="dateRange.to"
                placeholder="from"
              ></b-form-input>
            </b-input-group>
            <!-- <b-form-datepicker
              id="range-datepicker"
              v-model="maxDate"
              class="mb-2"
              size="sm"
              placeholder="max range"
            ></b-form-datepicker> -->
          </div>
          <div class="col">
            <b-button size="sm" variant="primary" @click="loadExpenses()"
              >Load Expenses</b-button
            >
          </div>
        </div>
        <div>
          <b-table
            class="table-list"
            bordered
            striped
            outlined
            hover
            sticky-header="58vh"
            :small="true"
            :items="expenses"
            :fields="expenseFields"
            :filter="tableFilter"
            :head-variant="tableHeadVariant"
          >
            <template #cell(amountTZS)="data">{{
              data.value.toLocaleString()
            }}</template>
            <template #cell(amountUSD)="data">{{
              data.value.toLocaleString()
            }}</template>
            <template slot="bottom-row">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <b>TOTAL: {{ sumTZS.toLocaleString() }}</b>
              </td>
              <td>
                <b>TOTAL: {{ sumUSD.toLocaleString() }}</b>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </template>
          </b-table>
        </div>
        <!-- </div> -->
      </div>
      <b-modal
        no-close-on-backdrop
        size="xl"
        title="New Expense"
        class="modal fade"
        button-size="sm"
        id="newExpenseModal"
        ok-title="Save"
        @ok="handleCreateExpense"
      >
        <form ref="forms" @submit.stop.prevent="createExpense">
          <b-container fluid>
            <b-row class="">
              <b-col class="border rounded">
                <label for="exampleInputEmail1"><b>Date</b></label>
                <b-form-input
                  size="sm"
                  type="date"
                  class="form-control"
                  v-model="newExpense.date"
                  placeholder="Enter expense issue date"
                  required
                ></b-form-input>
              </b-col>
              <b-col class="border rounded">
                <label for="exampleInputEmail1"><b>Expense Category</b></label>
                <v-select
                  class="golden-v-select"
                  v-model="newExpense.expenseCategoryId"
                  label="name"
                  :options="expenseCategories"
                  :reduce="(expenseCategories) => expenseCategories.id"
                  placeholder="Select Expense Category"
                  ><template #search="{ attributes, events }">
                    <input
                      v-bind="attributes"
                      v-on="events"
                      class="vs__search" /></template
                ></v-select>
              </b-col>
              <b-col class="border rounded">
                <label for="exampleInputEmail1"
                  ><b>Expense SubCategory</b></label
                >
                <v-select
                  v-model="newExpense.expenseSubcategory"
                  label="name"
                  :options="expenseSubcategoriesCascade"
                  placeholder="Select Expense Category"
                ></v-select>
              </b-col>
              <div class="w-100"></div>
              <b-col class="border rounded">
                <label for="amount"><b>Amount</b></label>
                <b-form-input
                  size="sm"
                  type="number"
                  class="form-control"
                  v-model="newExpense.amount"
                  placeholder="Enter expense amount"
                  required
                ></b-form-input>
              </b-col>
              <b-col class="border rounded">
                <label for="currency"><b>Currency</b></label>
                <v-select
                  v-model="newExpense.currency"
                  label="name"
                  :options="currency"
                  placeholder="Select currency"
                ></v-select>
              </b-col>
              <b-col class="border rounded">
                <label for="exchangeRate"><b>Echange Rate</b></label>
                <b-form-input
                  size="sm"
                  type="number"
                  min="1"
                  class="form-control"
                  v-model="newExpense.exchangeRate"
                  placeholder="Enter exchange rate"
                  required
                ></b-form-input>
              </b-col>
              <b-col class="border rounded">
                <label for="description"><b>Description</b></label>
                <b-form-input
                  size="sm"
                  type="text"
                  class="form-control"
                  v-model="newExpense.description"
                  placeholder="Enter expense description"
                  required
                ></b-form-input>
              </b-col>
              <div class="w-100"></div>
              <b-col cols="2" class="border rounded">
                <label for="personId"><b>Issued to</b></label>
                <div class="">
                  <input
                    type="radio"
                    id="person"
                    :value="true"
                    v-model="issuedTo"
                  />
                  <label for="person" class="form-check-label">Person</label>
                </div>
                <div class="">
                  <input
                    type="radio"
                    id="vehicle"
                    :value="false"
                    v-model="issuedTo"
                  />
                  <label for="vehicle" class="form-check-label">Vehicle</label>
                </div>
              </b-col>
              <b-col v-if="issuedTo" class="border rounded">
                <label for="personId"><b>Issued to</b></label>
                <v-select
                  v-model="newExpense.person"
                  label="fullName"
                  :options="people"
                  placeholder="Select Person(s)"
                ></v-select>
              </b-col>
              <b-col v-else class="border rounded">
                <label for="vehicle"><b>Issued to</b></label>
                <v-select
                  v-model="newExpense.vehicle"
                  label="registrationNumber"
                  :options="vehicles"
                  placeholder="Select Vehicle(s)"
                ></v-select>
              </b-col>
              <b-col cols="" class="pt-4">
                <b-button @click="addExpense" size="sm" variant="primary"
                  >Add</b-button
                >
              </b-col>
            </b-row>
            <div class="w-100"></div>
            <b-row v-if="newExpenses.length > 0" class="border rounded">
              <b-table
                class="table-list"
                bordered
                striped
                outlined
                hover
                sticky-header="58vh"
                :small="true"
                :items="newExpenses"
                :fields="newExpenseArrayFields"
                :filter="tableFilter"
                :head-variant="tableHeadVariant"
              >
                <template #cell(amount)="data">{{
                  data.value.toLocaleString()
                }}</template>
                <template #cell(action)="row">
                  <b-button
                    size="sm"
                    variant="danger"
                    @click="spliceExpense(row.index)"
                    >Delete</b-button
                  >
                </template>
              </b-table>
            </b-row>
          </b-container>
        </form>
        <b-table></b-table>
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
      tableBusy: false,
      dateRange: {
        from: "",
        to: "",
      },
      expenses: [],
      sumTZS: "",
      sumUSD: "",
      currency: [],
      expenseCategories: [],
      expenseSubcategories: [],
      expenseSubcategoriesCascade: [],
      vehicles: [],
      people: [],
      company: [],
      expenseFields: [
        { key: "id", label: "Log ID" },
        { key: "date" },
        { key: "expenseSubcategory.expenseCategory.name", label: "Category" },
        { key: "expenseSubcategory.name", label: "Subcategory" },
        { key: "amountTZS", label: "Amount TZS" },
        { key: "amountUSD", label: "Amount USD" },
        { key: "currency.name", label: "Currency" },
        { key: "exchangeRate" },
        { key: "vehicle.registrationNumber", label: "Vehicle" },
        { key: "person.fullName", label: "Person" },
        { key: "description" },
      ],
      newExpenseArrayFields: [
        { key: "date" },
        { key: "expenseSubcategory.expenseCategory.name", label: "Category" },
        { key: "expenseSubcategory.name", label: "Subcategory" },
        { key: "amount" },
        { key: "currency.name", label: "Currency" },
        { key: "exchangeRate" },
        { key: "vehicle.registrationNumber", label: "Vehicle" },
        { key: "person.fullName", label: "Person" },
        { key: "description" },
        { key: "action" },
      ],
      tableFilter: null,
      tableHeadVariant: "dark",
      newExpense: {
        date: new Date().toISOString().substr(0, 10),
        exchangeRate: 0,
      },
      issuedTo: true,
      newExpenses: [],
    };
  },
  computed: {
    sortOptions() {
      // Create an options list from our fields
      return this.expenseFields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
    },
  },
  watch: {
    "newExpense.expenseCategoryId": function (value) {
      this.expenseSubcategoriesCascade = this.expenseSubcategories.filter(
        (expenseSubcategory) => expenseSubcategory.expenseCategory.id == value
      );
    },
    expenses: function () {
      this.sumTZS = this.expenses.reduce((totalTZS, expense) => {
        return (totalTZS += expense.amountTZS);
      }, 0);
      this.sumUSD = this.expenses.reduce((totalUSD, expense) => {
        return totalUSD + expense.amountUSD;
      }, 0);
    },
  },
  mounted() {
    this.getExpenses();
  },
  methods: {
    async getExpenses() {
      try {
        this.loading = true;
        const response = await api.get("expenses");
        // this.expenses = response.data.expenses;
        this.vehicles = response.data.vehicles;
        this.people = response.data.people;
        this.expenseSubcategories = response.data.expenseSubcategories;
        this.expenseCategories = response.data.expenseCategories;
        this.currency = response.data.currency;
        this.loading = false;
      } catch (error) {
        console.log(error);
      }
    },
    async loadExpenses() {
      if (this.dateRange.from && this.dateRange.to) {
        this.tableBusy = true;
        try {
          const response = await api.post("load_expenses", this.dateRange);
          this.expenses = response.data.expensesFiltered;
        } catch (error) {
          console.log(error);
        }
        this.tableBusy = false;
      } else {
        alert("make sure you entered all dates");
      }
    },
    addExpense() {
      if (this.issuedTo) {
        this.newExpenses.push({
          date: this.newExpense.date,
          expenseSubcategory: this.newExpense.expenseSubcategory,
          expenseSubcategoryId: this.newExpense.expenseSubcategory.id,
          amount: this.newExpense.amount,
          currency: this.newExpense.currency,
          exchangeRate: this.newExpense.exchangeRate,
          description: this.newExpense.description,
          issuedTo: this.issuedTo,
          person: this.newExpense.person,
          personId: this.newExpense.person.id,
        });
      } else {
        this.newExpenses.push({
          date: this.newExpense.date,
          expenseSubcategory: this.newExpense.expenseSubcategory,
          expenseSubcategoryId: this.newExpense.expenseSubcategory.id,
          amount: this.newExpense.amount,
          currency: this.newExpense.currency,
          exchangeRate: this.newExpense.exchangeRate,
          description: this.newExpense.description,
          issuedTo: this.issuedTo,
          vehicle: this.newExpense.vehicle,
          vehicleId: this.newExpense.vehicle.id,
        });
      }
    },
    spliceExpense(index) {
      this.newExpenses.splice(index, 1);
    },
    handleCreateExpense(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createExpense();
    },
    async createExpense() {
      try {
        const exp = { newExpenses: this.newExpenses };
        await api
          .post("expenses", exp)
          .then((response) => console.log(response));
        this.$nextTick(() => {
          this.$bvModal.hide("newExpenseModal");
          this.getExpenses();
          // this.newExpenses = [];
          // this.newExpense = {
          //   date: new Date().toISOString().substr(0, 10),
          //   exchangeRate: 0,
          // };
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>