<script setup>
import SettingsMenuModalNavItem from "./SettingsMenuModalNavItem.vue";

defineProps({
    menu: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <li>
        <SettingsMenuModalNavItem
            v-for="(item, index) in menu"
            :key="index"
            :item="item"
        />
    </li>
</template>
