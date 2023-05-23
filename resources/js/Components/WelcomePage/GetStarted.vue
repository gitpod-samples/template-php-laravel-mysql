<script setup>
import { arrowUp } from "../../../assets/WelcomePage/index.js";
import { Link } from '@inertiajs/vue3';

</script>
<template>
<Link :href="route('home')" class="flexCenter w-[140px] h-[140px] hover:scale-110 hover:bg-discount-gradient rounded-full bg-blue-gradient p-[2px] cursor-pointer">
    <div class=" flexCenter flex-col bg-primary w-[100%] h-[100%] rounded-full">
      <div class="flexStart flex-row">
        <p class="font-poppins font-medium text-[18px] leading-[23.4px]">
          <span class="text-gradient">Get</span>
        </p>
        <img :src="arrowUp" alt="arrow-up" class="w-[23px] h-[23px] object-contain" />
      </div>

      <p class="font-poppins font-medium text-[18px] leading-[23.4px]">
        <span class="text-gradient">Started</span>
      </p>
    </div>
  </Link>
</template>
