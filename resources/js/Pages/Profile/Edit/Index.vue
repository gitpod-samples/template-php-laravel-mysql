<script setup>

import PagesLayout from "@/Layouts/AuthenticatedLayout.vue";
import BooksSidebar from "@/Pages/Books/Partials/BooksSidebar.vue";

import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateAccountInformationForm from "@/Pages/Profile/Partials/UpdateAccountInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import SettingsLayout from "./SettingsLayout.vue";
defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
</script>
<template>
    <Head title="Account-Settings" />
    <SettingsLayout pagename="Account Settings" pagediscription="Need to tweak a setting?">
        <UpdateAccountInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
            class="max-w-xl"
        />
        <UpdatePasswordForm class="max-w-xl mt-6" />
        <DeleteUserForm class="max-w-xl mt-6" />
    </SettingsLayout>
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
