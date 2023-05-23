<script setup>
import AccountSlideInModalNavLink from "./AccountSlideInModalNavLink.vue";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <li
        class="account-slide-out-link flex justify-center align-middle sm:block relative font-medium"
    >
    <!-- {{ props.item.label}} -->
        <AccountSlideInModalNavLink
            :active="item.isLogout ? false : $page.component == item.page "
            :is-logout="props.item.isLogout"
            :lable="props.item.label"
            :href="props.item.route"
            :description="props.item.description"
        />
    </li>
</template>
