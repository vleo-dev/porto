<template>
  <div style="width: 100%; height: 100%; position: relative; background: #000;">
    <LightPillar
		topColor="#C81D77"
		bottomColor="#432371"
		:intensity="0.85"
		:rotationSpeed="1.2"
		:glowAmount="0.005"
		:pillarWidth="3.0"
		:pillarHeight="0.4"
		:noiseIntensity="0.2"
		:pillarRotation="70"
		:interactive="true"
		mixBlendMode="normal"
    />
  </div>
  
</template>

<script setup>
import LightPillar from './LightPillar.vue'
</script>
