<script setup>
import { computed } from "vue";

const props = defineProps({
    href: String,
    active: Boolean,
    lable: String,
});

const classes = computed(() => {
    return props.active
        ? "navbar-link font-poppins text-md block flex-shrink-0 font-medium uppercase hover:text-white md:px-3 xl:px-5 xl:text-center is-active text-white "
        : "navbar-link font-poppins text-md text-grey-600/30 block flex-shrink-0 font-medium uppercase hover:text-white md:px-3 xl:px-5 xl:text-center";
});
</script>

<template>
    <Link :class="classes" :href="route(props.href)">
        {{ props.lable }}
    </Link>
</template>
