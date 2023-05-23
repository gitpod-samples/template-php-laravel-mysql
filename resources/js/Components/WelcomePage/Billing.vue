<script setup>
import vLazyImage from "v-lazy-image";
import {apple, bill, google} from "../../../assets/WelcomePage/index.js";

</script>
<template>
  <section id="product" class="sectionReverse">
    <div class="sectionImgReverse">
      <vLazyImage :src="bill" alt="billing" class="w-[100%] h-[100%] relative z-5 " />

      <!--gradient start-->
      <div class="absolute z-3 -left-1/2 top-0 w-[50%] h-[50%] rounded-full white__gradient" ></div>
      <div class="absolute z-0 w-[50%] h-[50%] -left-1/2 bottom-0 rounded-full pink__gradient"></div>
      <!--gradient end-->

    </div>

    <div class="sectionInfo">
      <h2 class="heading2">
        Easily control your <br class="hsm:block hidden" /> billing &
        invoicing
      </h2>
      <p class="max-w-[470px] mt-5 paragraph" >
        Elit enim sed massa etiam. Mauris eu adipiscing ultrices ametodio
        aenean neque. Fusce ipsum orci rhoncus aliporttitor integer platea
        placerat.
      </p>

      <div class="flex flex-row flex-wrap hsm:mt-10 mt-6">
        <vLazyImage :src="apple" alt="google_play" class="w-[128.86px] h-[42.05px] object-contain mr-5 cursor-pointer" />
        <vLazyImage :src="google" alt="google_play" class="w-[144.17px] h-[43.08px] object-contain cursor-pointer" />
      </div>
    </div>
  </section>
</template>
