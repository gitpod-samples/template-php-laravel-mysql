<script setup>

import HomePageButton from './HomePageButton.vue';


</script>
<template>
 <section class=" flexCenter marginY padding hsm:flex-row flex-col bg-black-gradient-2 rounded-[20px] box-shadow">
    <div class="flex-1 flex flex-col">
      <h2 class="heading2">Get started now!</h2>
      <p  class="paragraph max-w-[470px] mt-5" >
        Join BHUDiL to be a part of a community where the whole idea of academic research is to share the research idea, data and articles.
      </p>
    </div>

    <div class="`flexCenter hsm:ml-10 ml-0 hsm:mt-0 mt-10">
      <HomePageButton />
    </div>
  </section>
</template>
