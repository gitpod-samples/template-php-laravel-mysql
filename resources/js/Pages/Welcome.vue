<script setup>

import { Head, Link } from '@inertiajs/vue3';
import FeaturesSection from "@/Components/WelcomePage/Features.vue";
import AboutSection from "@/Components/WelcomePage/AboutSection.vue";
import CommunitiesSection from "@/Components/WelcomePage/CommunitiesSection.vue";
import CTA from "@/Components/WelcomePage/CTA.vue";
import PageFooter from "@/Components/WelcomePage/Footer.vue";
import Stats from "@/Components/WelcomePage/Stats.vue";
import Navbar from "@/Components/WelcomePage/Navbar.vue";
import Testimonials from "@/Components/WelcomePage/Testimonials.vue";
import Hero from "@/Components/WelcomePage/Hero.vue";
import {navLinks, stats, features, feedback, footerLinks, hero}  from "@/Data/HomePage/homeConstants.js";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="BHUDiL" />
    <!-- <Head title="Library by the comunity for the community" /> -->

    <div class="bg-primary w-full overflow-hidden">
    <div class="paddingX flexCenter">
      <div class="boxWidth">
        <Navbar :nav-links="navLinks" />
      </div>

    </div>

    <div class="bg-primary flexStart">
      <div class="boxWidth">
        <Hero :data="hero" />
      </div>
    </div>


    <div  class="bg-primary paddingX flexCenter">
      <div class="boxWidth">
        <Stats :stats="stats" />
        <AboutSection />
        <CommunitiesSection  />
      </div> 
    </div>

    <div  class="flexCenter py-10 hsm:py-24">
      <div class="boxWidth">
        <FeaturesSection :features="features" />
      </div>
    </div>
    <div  class="bg-primary paddingX flexCenter">
      <div class="boxWidth">
        <Testimonials :feedback="feedback" />
        <CTA />
        <PageFooter :footer-links="footerLinks" />
      </div>
    </div>
  </div>
</template>
