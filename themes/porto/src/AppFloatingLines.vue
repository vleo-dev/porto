<template>
  <div style="width: 100%; height: 100%; position: relative;">
    <FloatingLines
      :line-distance="[8, 6, 4]"
      :bend-radius="5.0"
      :bend-strength="-0.5"
      :interactive="true"
      :parallax="true"
      bendStrength="-2"
    />
  </div>
</template>

<script setup>
import FloatingLines from './FloatingLines.vue'
</script>
