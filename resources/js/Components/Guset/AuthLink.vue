
<script setup>
import {computed} from 'vue';

const props = defineProps({
        active: Boolean,
    });

const baseClass = computed(()=>{
    const base =[
        "inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded-full  ring-gray-200 dark:ring-purple-600 bg-white text-black dark:bg-slate-900 dark:text-white hover:bg-gray-100 hover:dark:bg-slate-800 py-2 px-6 mr-3 last:mr-0 mb-3",
        props.active? 'border-[#9333ea]':'border-white  dark:border-slate-900',
    ]
    return base
})
</script>

<template>
    <Link :class="baseClass">
    <slot />
    </Link>
</template>
