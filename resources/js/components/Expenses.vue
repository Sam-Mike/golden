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
        <div class="m-2 row justify-content">
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
            <!-- <b-form-datepicker
              id="range-datepicker"
              v-model="minDate"
              class="mb-2"
              size="sm"
              placeholder="min date"
            ></b-form-datepicker> -->
          </div>
          <div class="col">
            <!-- <b-form-datepicker
              id="range-datepicker"
              v-model="maxDate"
              class="mb-2"
              size="sm"
              placeholder="max range"
            ></b-form-datepicker> -->
          </div>
          <div class="col">
            <b-button size="sm" variant="primary" @click="dateRangeFilter()"
              >Filter Expenses</b-button
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
            <!-- <template #cell(personName)="data">{{
              data.item.person.firstName
            }}</template> -->
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
        scrollable
        title="New Expense"
        class="modal fade"
        button-size="sm"
        id="newExpenseModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        ok-title="Save"
        @ok="handleCreateExpense"
      >
        <form ref="forms" @submit.stop.prevent="createExpense">
          <div class="form-group">
            <label for="exampleInputEmail1">Date</label>
            <input
              type="date"
              class="form-control"
              v-model="newExpense.date"
              placeholder="Enter expense issue date"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Expense Category</label>
            <v-select
              v-model="newExpense.expenseCategoryId"
              label="name"
              :options="expenseCategories"
              :reduce="(expenseCategories) => expenseCategories.id"
              placeholder="Select Expense Category"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Expense SubCategory</label>
            <v-select
              v-model="newExpense.expenseSubcategoryId"
              label="name"
              :options="expenseSubcategoriesCascade"
              :reduce="
                (expenseSubcategoriesCascade) => expenseSubcategoriesCascade.id
              "
              placeholder="Select Expense Category"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input
              type="number"
              class="form-control"
              v-model="newExpense.amount"
              placeholder="Enter expense amount"
              required
            />
          </div>
          <div class="form-group">
            <label for="currency">Currency</label>
            <v-select
              v-model="newExpense.currencyId"
              label="name"
              :options="currency"
              :reduce="(currency) => currency.id"
              placeholder="Select currency"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exchangeRate">Echange Rate</label>
            <input
              type="number"
              min="1"
              class="form-control"
              v-model="newExpense.exchangeRate"
              placeholder="Enter exchange rate"
              required
            />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input
              type="text"
              class="form-control"
              v-model="newExpense.description"
              placeholder="Enter expense description"
              required
            />
          </div>
          <div class="form-group">
            <label for="vehicle">Vehicle</label>
            <v-select
              v-model="newExpense.vehicleId"
              label="registrationNumber"
              :options="vehicles"
              :reduce="(vehicles) => vehicles.id"
              placeholder="Select Vehicle"
            ></v-select>
          </div>

          <div class="form-group">
            <label for="personId">Person</label>
            <v-select
              v-model="newExpense.personId"
              label="firstName"
              :options="people"
              :reduce="(people) => people.id"
              placeholder="Select Person"
            >
              <template v-slot:option="option">
                {{ option.firstName }}
                {{ option.middleName }}
                {{ option.lastName }}
              </template></v-select
            >
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
      tableBusy: false,
      minDate: null,
      maxDate: null,
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
        { key: "id" },
        { key: "date" },
        { key: "expenseSubcategory.expenseCategory.name", label: "Category" },
        { key: "expenseSubcategory.name", label: "Subcategory" },
        { key: "amountTZS", label: "Amount TZS" },
        { key: "amountUSD", label: "Amount USD" },
        { key: "currency.name", label: "Currency" },
        { key: "exchangeRate" },
        { key: "vehicle.registrationNumber", label: "Vehicle" },
        { key: "person.firstName", label: "Person" },
        { key: "description" },
      ],
      tableFilter: null,
      tableHeadVariant: "dark",
      newExpense: {
        exchangeRate: 1,
      },
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
        this.expenses = response.data.expenses;
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
    dateRangeFilter() {
      if (this.minDate && this.maxDate) {
        console.log("here i am");
        const minDate = new Date(this.minDate);
        const maxDate = new Date(this.maxDate);
        this.tableBusy = true;
        this.expenses = this.expenses.filter((expense) => {
          const expenseDate = new Date(expense.date);
          expenseDate >= minDate && expenseDate <= maxDate;
        });
        this.tableBusy = false;
      }
    },
    handleCreateExpense(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.createExpense();
    },
    async createExpense() {
      try {
        await api.post("expenses", this.newExpense);
        this.$nextTick(() => {
          this.$bvModal.hide("newExpenseModal");
          this.getExpenses();
          this.newExpense = {};
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>