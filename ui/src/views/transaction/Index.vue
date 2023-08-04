<template>
  <div class="container">
    <div class="mt-4 table-responsive">
      <table class="table table align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Amount</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(e, i) in transaction.data" :key="i">
            <th scope="row">{{ i + 1 }}</th>
            <td>{{ e.title }}</td>
            <td>{{ e.amount }}</td>
            <td>{{ e.type }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">
                  <router-link
                    class="text-decoration-none text-white"
                    :to="{ name: 'transaction.edit', params: { id: e.id } }"
                    >Edit</router-link
                  >
                </button>
                <button type="button" class="btn btn-danger">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { onMounted, ref } from "vue";

export default {
  setup() {
    let transaction = ref([]);

    onMounted(() => {
      // mengambil data API
      axios
        .get("http://127.0.0.1:8000/api/transaction")
        .then((respon) => (transaction.value = respon.data))
        .catch((err) => console.log(err));
    });
    return {
      transaction,
    };
  },
};
</script>

<style></style>
