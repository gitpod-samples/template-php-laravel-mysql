<script setup>

import MainNavBarItem from './MainNavBarItem.vue';
defineProps({
    menu: {
        type: Array,
        default: () => [],
    },

});
</script>
<template>
    <div
        class="navbar-links font-cabin relative mr-auto hidden md:flex md:justify-start lg:justify-around xl:mr-0 xl:w-full"
        style="flex: 0 1 0%"
    >
        <MainNavBarItem v-for="(item, index) in menu"
            :key="index"
            :item="item"/>
    </div>
</template>
