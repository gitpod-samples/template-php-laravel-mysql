<script setup>
import HomeMenuLink from "./HomeMenuLink.vue";
defineProps({
    item: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <HomeMenuLink
        :href="item.route"
        :title="item.title"
        :label="item.label"
        :description="item.description"
    />
</template>
