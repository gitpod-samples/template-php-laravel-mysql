<script setup>

import vLazyImage from "v-lazy-image";
import GetStarted from "./GetStarted.vue";

defineProps({
    data: Object,
})
</script>
<template>
    <section id="home" class="flex hmd:flex-row flex-col paddingY" >
      <div class="flex-1  flexStart flex-col hxl:px-0 sm:px-16 px-6">

        <div class="flex flex-row justify-between items-center w-full">
          <h1 class="flex-1 font-poppins font-semibold hhss:text-[72px] text-[52px] text-white hss:leading-[100.8px] leading-[75px]">
            Bule Hora <br class="sm:block hidden" />{{" "}}
            <span class="text-gradient">University</span>{{" "}}
          </h1>
          <div class="hss:flex hidden hmd:mr-4 mr-0">
            <GetStarted />
          </div>
        </div>

        <h1 class="font-poppins font-semibold hss:text-[68px] text-[52px] text-white hss:leading-[100.8px] leading-[75px] w-full">
          Digital Library.
        </h1>
        <p class="paragraph max-w-[470px] mt-5">
          {{ data.subHeading }}
        </p>

        <a :href="route('about.index')" class="more_btn">Learn More</a>

      </div>


      <div class="flex-1 flex flexCenter hmd:my-0 my-10 relative">
        <vLazyImage :src="data.heroImage" alt="billing" class="w-[100%] h-[100%] relative z-[5]" />
        <!--/* gradient start */-->
        <div class="bg_gradient z-0  h-[100%] -left-[20%] w-[200%] -top-[20%] blue__gradient"></div>
        <div class="bg_gradient z-1  h-[100%]  w-[100%] hmd:-top-[20%] hmd:-right-[50%] white__gradient "  ></div>

      </div>

      <div class="hss:hidden flexCenter">
        <GetStarted />
      </div>
    </section>
</template>
