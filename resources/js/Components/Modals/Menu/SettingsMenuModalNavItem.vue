<script setup>

import SettingsMenuModalLink from "./SettingsMenuModalLink.vue";

defineProps({
    item: {
        type: Object,
        required: true,
    },
});


</script>

<template>
    <li>
        <SettingsMenuModalLink
            :active="$page.component === item.page "
            :href="item.route"
            :description="item.description"
            :title="item.label"
        />
    </li>
</template>
