<script setup lang="ts">
import { computed } from "vue";
const { title, fields, items } = defineProps(["title", "fields", "items"]);
</script>

<template>
  <div class="card m-2">
    <div class="card-header w-100 d-flex justify-content-between">
      {{ title }}
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th v-for="field in fields" :key="field.key" scope="col">
              {{ field.value }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td v-for="item in items" :key="item">
              {{ item }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
.card {
  color: black;
}
</style>
