<script setup>
defineProps({
    href: String,
    description: String,
    title: String,
    label: String,
});
</script>
<template>
    <Link
        :href="route(href)"
        class="ml-[10px] w-[calc(100%-10px)] code-link relative my-2 block rounded border-none pl-4 text-left text-blue hover:bg-blue hover:text-white"
    >
        <div class="text-[.7rem] font-normal text-white/50">
            // {{ description }}
        </div>
        <span class="font-bold text-white">"{{ title }}"&nbsp;=&gt;&nbsp;</span>
        <span class="font-bold">"{{ label }}"</span
        ><span class="text-white">,</span>
    </Link>
</template>
