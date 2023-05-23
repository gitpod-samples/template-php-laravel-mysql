<script setup>
import {computed} from 'vue';

const props = defineProps({
    flexDirection: {
        type: String,
        default: "row",
    },
});

const baseClass = computed(() => {
    const base = [
        "text-center text-white py-12 md:py-0",
        props.flexDirection == "col" ? "mb-4" : "",
    ];
    return base;
});
</script>

<template>
    <div :class="baseClass">
        <h1 class="text-6xl md:text-[3.75rem] font-black">BHU University</h1>
        <h2 class="text-2xl">digital library</h2>
    </div>
</template>
