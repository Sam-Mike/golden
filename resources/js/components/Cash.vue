<template>
  <div>
    <b-overlay :show="loading">
      <b-tabs active-nav-item-class="font-weight-bold text-uppercase">
        <!-- ACTIVE TRAILERS -->
        <b-tab title="EXPENSES">
          <!-- DataTales Example -->
          <div class="card shadow">
            <div class="card-header py-auto">
              <div class="d-flex row justify-content-end">
                <h6 class="m-0 font-weight-bold text-primary"></h6>

                <!-- Button trigger New Trailer Modal -->
                <b-button
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newTrailerModal
                >
                  New Expense
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
                :items="expenses"
                :fields="expenseFields"
                :filter="tableFilter"
                :head-variant="tableHeadVariant"
                sticky-header="60vh"
                @row-clicked="expenseInfo"
              >
              </b-table>
            </div>
            <!-- </div> -->
          </div>
        </b-tab>
        <b-tab title="DEPOSITS">
          <!-- DataTales Example -->
          <div class="card shadow">
            <div class="card-header py-auto">
              <div class="d-flex row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>

                <!-- Button trigger New Trailer Modal -->
                <b-button
                  size="sm"
                  variant="primary"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  v-b-modal.newTrailerModal
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
                :fields="depositFields"
                :filter="tableFilter"
                :head-variant="tableHeadVariant"
                sticky-header="55vh"
                @row-clicked="depositInfo"
              >
              </b-table>
            </div>
            <!-- </div> -->
          </div>
        </b-tab>
      </b-tabs>

      <!-- New Expense Modal -->
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
            <label for="exampleInputEmail1">New Expense</label>
            <input
              type="date"
              class="form-control"
              v-model="newExpense.issueDate"
              placeholder="Enter expense issue date"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Expense Category</label>
            <v-select
              v-model="newExpense.category"
              label="name"
              :options="expenseCategory"
              :reduce="(expenseCategory) => expenseCategory.id"
              placeholder="Select Expense Category"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Expense SubCategory</label>
            <v-select
              v-model="newExpense.subCategory"
              label="name"
              :options="expenseSubCategory"
              :reduce="(expenseSubCategory) => expenseSubCategory.id"
              placeholder="Select Expense Category"
            ></v-select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Amount</label>
            <input
              type="number"
              class="form-control"
              v-model="newExpense.amount"
              placeholder="Enter expense amount"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">XR</label>
            <input
              type="number"
              class="form-control"
              v-model="newExpense.exchangeRate"
              placeholder="Enter exchange rate"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input
              type="text"
              class="form-control"
              v-model="newExpense.description"
              placeholder="Enter expense description"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Vehicle</label>
            <v-select
              v-model="newExpense.vehicleId"
              label="name"
              :options="vehicles"
              :reduce="(vehicles) => vehicles.id"
              placeholder="Select Trailer Make"
            ></v-select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <v-select
              v-model="newExpense.personId"
              label="name"
              :options="people"
              :reduce="(people) => people.id"
              placeholder="Select Person"
            ></v-select>
          </div>
        </form>
      </b-modal>

      <!-- Create new Deposit Modal -->
      <b-modal
        no-close-on-backdrop
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
            <label for="issueDate">Issue Date</label>
            <input
              type="date"
              class="form-control"
              v-model="newDeposit.date"
              placeholder="Enter deposit date"
              required
            />
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input
              type="number"
              class="form-control"
              v-model="newDeposit.amount"
              placeholder="Enter deposit amount"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Exchange Rate</label>
            <input
              type="number"
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
      expenses: [],
      expenseFields: [
        { key: "id" },
        { key: "issueDate" },
        { key: "subCategory.category.name", label: "Category" },
        { key: "subCategory.name", label: "Subcategory" },
        { key: "subCategory.name", label: "Subcategory" },
        { key: "amount" },
        { key: "exchangeRate" },
        { key: "desription" },
        { key: "vehicle.registrationNumber", label: "Vehicle" },
        { key: "people.firstname", label: "Person" },
      ],
      deposits: [],
      depositFields: [
        { key: "date" },
        { key: "amount" },
        { key: "exchangerate" },
        { key: "description" },
      ],
      newExpense: {},
      expenseInfo: {},
    };
  },
  mounted() {
    this.getExpenses();
    this.getDeposits();
  },
  methods: {
    getExpenses() {},
    getDeposits() {},
    handleCreateExpense() {},
    createExpense() {},
    handleCreateDeposit() {},
    createDeposit() {},
  },
};
</script>