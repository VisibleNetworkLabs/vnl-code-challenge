<script setup lang="ts">
import { computed } from "vue";
const { player } = defineProps(["player"]);
const orderedStats = computed(() => {
  return Object.entries(player.stats)
    .sort((a, b) => b[1] - a[1])
    .map((stat) => {
      switch (stat[0]) {
        case "atk":
          return ["Attack", stat[1]];
        case "def":
          return ["Defence", stat[1]];
        case "spd":
          return ["Speed", stat[1]];
      }
    });
});
const icon = computed(() => {
  switch (orderedStats.value[0][0]) {
    case "Attack":
      return "/src/assets/attack.svg";
    case "Defence":
      return "/src/assets/defence.svg";
    case "Speed":
      return "/src/assets/speed.svg";
  }
});
</script>

<template>
  <div class="card m-2">
    <div class="card-header w-100 d-flex justify-content-between">
      {{ player.username }}<img :src="icon" />
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item" v-for="stat in orderedStats" :key="stat[0]">
          {{ stat[0] }}: {{ stat[1] }}
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
.card {
  width: 40vw !important;
  color: black;
}

img {
  height: 30px;
  width: 30px;
}
</style>
