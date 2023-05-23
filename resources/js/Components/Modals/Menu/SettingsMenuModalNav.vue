<script setup>

import BaseButton from "@/Components/Base/BaseButton.vue";
import {mdiClose} from "@mdi/js";
import SettingsMenuModalNavList from "./SettingsMenuModalNavList.vue";

 defineProps({
    menu: {
        type: Array,
        required: true,
    },
});
const emit = defineEmits(['close']);
const close = () => {
    emit('close');
};
</script>

<template>
    <div class="nav-modal-wrap relative flex h-full flex-col">
        <div class=" absolute right-1 top-[20px]">
            <BaseButton @click="close"  color="contrast" :icon="mdiClose" />

        </div>
        <ul class="my-auto text-center flex flex-col  overflow-auto">
            <SettingsMenuModalNavList :menu="menu" />
        </ul>
    </div>
</template>
