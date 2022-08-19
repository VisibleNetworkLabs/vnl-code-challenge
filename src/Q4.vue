<script setup lang="ts">
import PlayerCard from "./components/PlayerCard.vue";
const players = [
  {
    id: 1,
    username: "Alfonso",
    stats: { atk: 5, def: 8, spd: 3 },
  },
  {
    id: 2,
    username: "Balfado",
    stats: { atk: 6, def: 2, spd: 9 },
  },
  {
    id: 3,
    username: "Cortado",
    stats: { atk: 4, def: 4, spd: 4 },
  },
  {
    id: 4,
    username: "Demario",
    stats: { atk: 7, def: 1, spd: 7 },
  },
  {
    id: 5,
    username: "Emanual",
    stats: { atk: 9, def: 1, spd: 2 },
  },
];
</script>

<template>
  <div class="d-flex w-100 flex-wrap justify-content-center">
    <PlayerCard v-for="player in players" :key="player.id" :player="player" />
  </div>
</template>

<style scoped>
</style>

<!-- can use any drawing tool sketch.io or pen and paper are defaults -->
