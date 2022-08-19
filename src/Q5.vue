<script setup lang="ts">
import { computed, onMounted, ref } from "vue";
import NetworkTable from "./components/NetworkTable.vue";

const fields = [
  {
    key: "network_id",
    value: "Network ID",
  },
  {
    key: "score_average",
    value: "Score Average",
  },
  {
    key: "owner_id",
    value: "Owner ID",
  },
  {
    key: "network_name",
    value: "Network Name",
  },
  {
    key: "username",
    value: "Username",
  },
  {
    key: "email",
    value: "Email",
  },
];

const getNetwork = () =>
  fetch("/phpEndpoint/endpoint-Q5/php-endpoint.php")
    .then((resp) => resp.json())
    .then((data) => (network.value = data));

const network = ref({});

const calculationFunction = (a, b, c) => {
  return Math.round((parseInt(a) + parseInt(b) + parseInt(c)) / 3).toFixed(2);
};

const items = computed(() => {
  return {
    network_id: network.value.network["network_id"],
    score_average: calculationFunction(
      network.value.network["score1"],
      network.value.network["score2"],
      network.value.network["score3"]
    ),
    owner_id: network.value.network["owner_id"],
    network_name: network.value.network["network_name"],
    username: network.value.network["username"],
    email: network.value.network["email"],
  };
});

onMounted(async () => {
  await getNetwork();
});
</script>

<template>
  <div class="container-fluid">
    <NetworkTable
      v-if="network !== undefined"
      :title="network.network ? network.network.network_name : 'error'"
      :fields="fields"
      :items="items"
    />
  </div>
</template>

<style scoped>
.card {
  color: black;
}
</style>
