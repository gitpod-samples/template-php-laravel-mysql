<script setup>
import PagesLayout from "@/Layouts/AuthenticatedLayout.vue";
import SettingsSidebar from "@/Pages/Profile/Edit/Partials/SettingsSidebar.vue";

import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";

import { Head } from "@inertiajs/vue3";
const props = defineProps({
    pagename:{
        type: String,
        required: true,
    },
    pagediscription:{
        type: String,
        required: true,
    }
})
</script>
<template>
    <PagesLayout>
        <section>
            <a
                class="relative inline-block md:hidden"
                style="left: -13px; margin-top: -20px"
            >
                <img
                    src="/images/svg/pages/setting/mobile-back-button.svg"
                    alt="Back Button"
                />
            </a>
            <header class="container mx-auto text-center">
                <img
                    class="absolute translate-x-1/2"
                    src="/images/svg/pages/setting/gears.svg"
                    alt="Settings page"
                    aria-hidden="true"
                />
                <h3 class="text-3xl font-medium text-white">
                    {{ pagename }}
                </h3>
                <p class="text-lg font-medium text-grey-600">
                    {{ pagediscription }}
                </p>
            </header>
        </section>
        <div class="section !pt-0">
            <div
                class="panel dark lg:px-15 container !mx-auto relative rounded-xl bg-panel-800 py-8 text-white transition-colors duration-300 hover:bg-panel-700 md:px-16 lg:py-8"
                style="max-width: 970px"
            >
                <div class="mx-auto md:flex">
                    <div
                        class="hidden pr-8 md:block md:w-56 mobile:pt-8"
                        id="settings-nav-links"
                    >
                        <SettingsSidebar />
                    </div>
                    <div class="flex-1 px-8 pb-0 md:pt-0 lg:pr-0">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </PagesLayout>
</template>

<style scoped>
.section,
section {
    margin-left: auto;
    margin-right: auto;
    max-width: 1700px;
    padding: 20px;
    position: relative;
}

@media (min-width: 768px) {
    .section,
    section {
        padding: 40px 30px;
    }
}

.section > .section,
section > .section {
    padding-left: 0;
    padding-right: 0;
}

@media (max-width: 768px) {
    .section > .section,
    section > .section {
        padding-top: 0;
    }
}
img {
    display: initial;
    max-width: 100%;
}
</style>
