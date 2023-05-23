<script setup>
import { ref } from 'vue';
import MainNavBar from '@/Components/NavBar/MainNavBar/MainNavBar.vue';
import { useStyleStore } from "@/stores/style.js";
import FooterBar from '@/Components/Admin/FooterBar.vue';
import Footer from '@/Components/WelcomePage/Footer.vue';
import {footerLinks} from '@/Data/HomePage/homeConstants';

const styleStore = useStyleStore();
</script>

<template>
    <div :class="{
      dark: styleStore.darkMode}">
        <div class="bg-gray-50 page-dark dark:[#151f32] dark:text-slate-100 min-h-screen">
            <div class="xl:flex-1">
                <MainNavBar  />
                <!-- Page Heading -->

                <!-- Page Content -->
            <main>
                <slot />
            </main>
            </div>
            <Footer :footer-links="footerLinks" />
        </div>
    </div>

</template>
