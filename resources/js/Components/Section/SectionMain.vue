<script setup>
import { containerMaxW } from "@/Data/config.js";
</script>

<template>
  <section class="p-6" :class="containerMaxW" >
    <slot />
  </section>
</template>
