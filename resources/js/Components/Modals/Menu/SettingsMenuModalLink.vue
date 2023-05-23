<script setup>
import { computed } from "vue";

const props = defineProps({
    href: String,
    active: Boolean,
    title: String,
    description: String,

});

const classes = computed(() => {
    return props.active
        ? "text-4xl font-medium text-blue "
        : "text-4xl font-medium text-white";
});
</script>

<template>
    <Link :class="classes" :href="href"
        >{{ title
        }}<span class="-mt-1 block text-xs italic text-grey-800">
            // {{ description }}
        </span>
    </Link>
</template>
