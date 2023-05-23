<script setup>
import MainNavBarLink from './MainNavBarLink.vue';
defineProps({
    item: {
        type: Object,
        required: true,
    },
})
</script>
<template>
    <MainNavBarLink
            :active="$page.component === item.page"
            :href="item.route"
            :lable="item.label"
            />
</template>
