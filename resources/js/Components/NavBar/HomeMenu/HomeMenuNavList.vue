<script setup>
import HomeMenuNavItem from "./HomeMenuNavItem.vue";

const props = defineProps({
    menu: {
        type: Array,
        default: () => [],
    },
    menuName: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="font-bold">
        <span class="font-bold text-[#ec454f]">"{{ props.menuName }}"</span>
        =&gt; [
        <HomeMenuNavItem
            v-for="(item, index) in menu"
            :key="index"
            :item="item"
        />
        <span class="font-bold"> ]</span>
    </div>
</template>
