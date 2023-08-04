<template>
  <div class="container">
    <h3>Create Trans</h3>
    <div class="row mt-4 justify-content-center px-3">
      <div class="col-auto col-sm-7 col-md-5 card p-3 shadow-sm">
        <form @submit.prevent="store()">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
              type="text"
              class="form-control"
              id="title"
              v-model="transaction.title"
            />
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input
              type="number"
              class="form-control"
              id="amount"
              v-model="transaction.amount"
            />
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input
              type="text"
              class="form-control"
              id="time"
              placeholder="time"
              v-model="transaction.time"
            />
          </div>
          <div class="mb-3">
            <label>Type</label>
            <select
              class="form-select"
              aria-label="Default select example"
              v-model="transaction.type"
            >
              <option selected>Open this select menu</option>
              <option value="expense">Expense</option>
              <option value="revenue">Revenue</option>
            </select>
          </div>
          <div class="row justify-content-center">
            <div class="col-auto col-sm-6">
              <button type="submit" class="btn btn-success w-100">
                Submit
              </button>
            </div>
            <div class="col-auto col-md-6">
              <button type="reset" class="btn btn-primary w-100">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default {
  setup() {
    const transaction = reactive({
      title: "",
      amount: "",
      time: "",
      type: "",
    });

    const validate = ref([]);
    const router = useRouter();

    function store() {
      axios
        .post("http://127.0.0.1:8000/api/transaction", transaction)
        .then((respon) => {
          router.push({ name: "transaction.index" });
        })
        .catch((err) => (validate.value = err.response.data));
    }
    return {
      transaction,
      validate,
      router,
      store,
    };
  },
};
</script>

<style></style>
