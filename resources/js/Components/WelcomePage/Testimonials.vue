<script setup>


import FeedBackCard from "./FeedBackCard.vue";

defineProps({
    feedback:Object,
})
</script>
<template>
  <div id="testimonials" class="paddingY flexCenter flex-col relative ">
    <div class="bg_gradient z-0 w-[100%] h-[100%] -right-[50%] rounded-full blue__gradient bottom-0" ></div>

    <div class="w-full flex justify-center items-center text-center sm:mb-16 mb-6 relative z-1">
      <h2 class="heading2">
        What People are <br class="hsm:block hidden" /> saying about us
      </h2>

    </div>

    <div class="flex flex-wrap sm:justify-start justify-center w-full feedback-container relative z-1">
        <FeedBackCard v-for="card in feedback" :key="card.id" :item="card"  />
    </div>
  </div>
</template>
