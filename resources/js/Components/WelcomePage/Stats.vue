<script setup>

defineProps({
    stats:Object
})

</script>
<template>
<section class="flexCenter flex-row flex-wrap hsm:mb-20 mb-6">
    <div v-for="(stat, index) in stats" :key="stat.id" class="flex-1 flex justify-start items-center flex-row m-3" >
        <h4 class="font-poppins font-semibold hxs:text-[40.89px] text-[30.89px] hxs:leading-[53.16px] leading-[43.16px] text-white">
         {{  stat.value }}
        </h4>
        <p class="font-poppins font-normal hxs:text-[20.45px] text-[15.45px] hxs:leading-[26.58px] leading-[21.58px] text-gradient uppercase ml-3">
         {{  stat.title }}
        </p>
      </div>
  </section>
</template>
