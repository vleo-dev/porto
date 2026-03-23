<template>
  <ElectricBorder :color="'#B42EFF'">
    <div v-html="phpContent"></div>
  </ElectricBorder>
</template>

<script setup>
import ElectricBorder from './ElectricBorder.vue';
defineProps(['phpContent']);
</script>
