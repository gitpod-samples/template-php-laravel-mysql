<script setup>
import MobileMenuButton from "@/Components/Triggers/MobileMenuButton.vue";
import AccountSlideOutMenuButton from "@/Components/Triggers/AccountSlideOutMenuButton.vue";
import SearchButton from "@/Components/Triggers/SearchButton.vue";
</script>
<template>
    <div class="flex items-center md:hidden gap-2">
        <SearchButton size="12" />
        <AccountSlideOutMenuButton size="8" />
        <MobileMenuButton />

    </div>

    <div class="relative hidden md:block xl:w-1/4">
        <div class="flex items-center justify-end gap-2 leading-none">
            <SearchButton size="15" />
            <AccountSlideOutMenuButton />

        </div>
    </div>
</template>
