<script setup>

import AccountSlideInModalNavItem from './AccountSlideInModalNavItem.vue';

 defineProps({
    menu: {
        type: Array,
        default: () => [],
  },

})
</script>

<template>

    <AccountSlideInModalNavItem v-for="(item, index) in menu"
    :key="index"
    :item="item"/>
</template>
