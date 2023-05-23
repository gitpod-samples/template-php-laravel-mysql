<script setup>
import {socialMedia} from '@/Data/HomePage/homeConstants';
import moment from 'moment';
import {logo} from "../../../assets/WelcomePage/index.js";
import vLazyImage from 'v-lazy-image';
// import { Link } from '@inertiajs/vue3';
import FooterLink from "@/Components/WelcomePage/FooterLink.vue"
defineProps({
    footerLinks:Object,
})
const year = moment().format('YYYY')
const openSocialLink = (socialLink) => {
    window.open(socialLink)
}
</script>
<template>
<section class="flexCenter paddingY  flex-col">
    <div class="flexStart hmd:flex-row flex-col mb-8 w-full">
      <div class="flex-1 flex flex-col justify-start mr-10">
        <Link :href="route('home')">
            <vLazyImage
          :src="logo"
          width="180"
            height="38"
          alt="bhu_digital_library"
          class="object-contain"
        />
        </Link>

        <p class="paragraph mt-4 max-w-[312px]">
            Library by the comunity for the community.
        </p>
      </div>

      <div class="flex-[1.5] w-full flex flex-row justify-between flex-wrap md:mt-0 mt-10">
        <div v-for="footerlink in footerLinks" :key="footerlink.title" class="flex flex-col ss:my-0 my-4 min-w-[150px]">
            <h4 class="font-poppins font-medium text-[18px] leading-[27px] text-white">
             {{  footerlink.title }}
            </h4>
            <ul class="list-none mt-4">
                <li v-for="(link, index) in footerlink.links"
                  :key="link.name"
                  :class="`font-poppins font-normal text-[16px] leading-[24px] text-dimWhite hover:text-secondary cursor-pointer ${
                    index !== footerlink.links.length - 1 ? 'mb-4' : 'mb-0'
                  }`"
                > 
                <FooterLink :LinkISAuth="link.auth" :LinkTitle="link.name" :LinkRoute="link.link"/>

                </li>
            </ul>
          </div>
      </div>
    </div>

    <div class="w-full flex justify-between items-center md:flex-row flex-col pt-6 border-t-[1px] border-t-[#3F3E45]">
      <p class="font-poppins font-normal text-center text-[18px] leading-[27px] text-white">
        Copyright Ⓒ {{ year }} BHU. All Rights Reserved.
      </p>

      <div class="flex flex-row md:mt-0 mt-6">
        <vLazyImage v-for="(social, index) in socialMedia"
            :key="social.id"
            :src="social.icon"
            :alt="social.id"
            :class="`w-[21px] h-[21px] object-contain cursor-pointer ${
              index !== socialMedia.length - 1 ? 'mr-6' : 'mr-0'
            }`"
            @Click="openSocialLink(social.link)"
          />
      </div>
    </div>
  </section>
</template>
