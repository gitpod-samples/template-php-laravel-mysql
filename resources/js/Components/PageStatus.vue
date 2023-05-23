<script setup>
import { computed } from "vue";

const props = defineProps({
    danger: Boolean,
    status: String,
});

const mainClass = computed(() =>
    props.danger
        ? "text-danger-700 dark:text-danger-600"
        : "text-green-600 dark:text-green-400"
);
</script>

<template>
    <div v-if="status" :class="mainClass" class="mb-4 font-medium text-sm">
        {{ status }}
    </div>
</template>
