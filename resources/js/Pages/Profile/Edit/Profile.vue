<script setup>
import PagesLayout from "@/Layouts/AuthenticatedLayout.vue";
import BooksSidebar from "@/Pages/Books/Partials/BooksSidebar.vue";

import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Edit/Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import SettingsLayout from "./SettingsLayout.vue";
defineProps({
   status: String,
});
</script>
<template>
    <Head title="Profile-Settings" />
    <SettingsLayout pagename="Profile Settings" pagediscription="Need to tweak a your profile?">
        <UpdateProfileInformationForm
            :status="status"
            class="max-w-xl"
        />
    </SettingsLayout>
</template>


