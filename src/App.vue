<script setup lang="ts">
import { ref, computed } from "vue";
import Q4 from "./Q4.vue";
import Q5 from "./Q5.vue";
const routes = {
  "/Q4": Q4,
  "/Q5": Q5,
};
const currentPath = ref(window.location.hash);

window.addEventListener("hashchange", () => {
  currentPath.value = window.location.hash;
});

const currentView = computed(() => {
  return routes[currentPath.value.slice(1) || "/"];
});
</script>

<template>
  <div class="d-flex flex-column align-items-center">
    <div class="pb-4">
      <a href="#/Q4">Q4</a>
      <span class="px-3" style="font-size: 25px"> | </span>
      <a href="#/Q5">Q5</a>
    </div>
    <component class="" :is="currentView" />
  </div>
</template>

<style scoped>
</style>
