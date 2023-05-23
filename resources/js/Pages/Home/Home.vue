<script setup>

import HomeMenuNav from "@/Components/NavBar/HomeMenu/HomeMenuNav.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import FeaturedBooksSection from "./Partials/FeaturedBooksSection.vue";
import HomeBannerIllustration from "./Partials/HomeBannerIllustration.vue";
import HomeSkillsSection from "./Partials/HomeSkillsSection.vue";


</script>

<template>
    <Head title="Welcome" />

    <AuthenticatedLayout>
        <div>
            <div class="home-banner relative">
                <div class="home-banner-inner flex flex-col">
                    <div
                        class="home-banner-main transition-background-image duration-1000 section flex w-full flex-1 flex-col overflow-hidden pt-10 pb-0 lg:mb-[-100px] lg:items-center"
                        style="max-width: 100vw"
                    >
                        <div
                            class="relative mx-auto flex w-full flex-1 items-end"
                            style="max-width: 1700px"
                        >
                            <HomeBannerIllustration/>
                            <HomeMenuNav />
                        </div>
                    </div>
                </div>
            </div>
            <HomeSkillsSection />
            <FeaturedBooksSection/>
        </div>
    </AuthenticatedLayout>
</template>
