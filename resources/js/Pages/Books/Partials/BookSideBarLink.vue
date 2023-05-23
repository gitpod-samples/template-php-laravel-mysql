<script setup>
import { computed } from 'vue';

const props = defineProps({
    href: String,
    active: Boolean,
    title: String,
    haveBage: Boolean,
    bageValue: String,
});

const classes = computed(() => {
    return props.active
        ? 'group block flex items-center rounded-[12px] px-3 py-2 text-left text-sm font-medium hover:bg-panel-800 hover:text-blue text-blue bg-panel-800'
        : 'group  flex items-center rounded-[12px] px-3 py-2 text-left text-sm font-medium hover:bg-panel-800 hover:text-blue text-white/85';
});
const classesForInner = computed(() => {
    return props.active
        ? 'inline-block h-[16px] rounded-xl group-hover:scale-y-125 group-hover:bg-blue scale-y-125  bg-blue'
        : 'inline-block h-[16px] rounded-xl group-hover:scale-y-125 group-hover:bg-blue bg-blue/10';
});
</script>

<template>
    <Link :class="classes" :href="href">
    <span aria-hidden="true" :class="classesForInner"
        style="transition: transform 0.3s ease 0.1s, background-color 0.3s ease; margin-right: 9px; width: 9px;">
    </span>
    {{ title }}

    <div v-if="haveBage"
        class="fade-in flex-center absolute right-0 mr-3 h-5 w-5 rounded-full bg-blue text-3xs font-semibold leading-off text-white">
        {{ bageValue }}
    </div>

    </Link>



</template>
