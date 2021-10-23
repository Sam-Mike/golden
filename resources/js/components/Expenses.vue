<template>
  <div>
    <b-overlay :show="loading">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="d-flex row justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <!-- Button trigger modal -->
            <b-button
              size="sm"
              variant="primary"
              data-toggle="modal"
              data-target="#exampleModal"
              v-b-modal.createExpenseModal
            >
              New Expense
            </b-button>
          </div>
        </div>
      </div>
    </b-overlay>
  </div>
</template>
<script>
export default {};
</script>