<script setup>
import { computed } from "vue";

const props = defineProps({
    bg: {
        type: String,
        default: null,
        // validator: (value) => ["purplePink", "pinkRed"].includes(value),
    },
    flexDirection: {
        type: String,
        default: "row",
        validator: (value) => ["col", "row"].includes(value),
    },
});

const baseClass = computed(() => {
    const base = [
        "transition-background-image duration-1000 flex flex-col min-h-screen items-center justify-center",
        "dark:placeholder-gray-400",
        props.flexDirection == "row"
            ? "md:flex-row md:justify-around md:px-6"
            : "",
    ];
    switch (props.bg) {
        case "purplePink":
            base.push(
                "bg-gradient-to-tr from-purple-400 via-pink-500 to-red-500"
            );
            break;
        case "pinkRed":
            base.push(
                "bg-gradient-to-tr from-pink-400 via-red-500 to-yellow-500"
            );
            break;
        default:
            base.push(
                "bg-gradient-to-tr from-slate-700 via-slate-900 to-slate-800"
            );
            break;
    }

    return base;
});
</script>

<template>
    <div :class="baseClass">
        <slot />
    </div>
</template>
