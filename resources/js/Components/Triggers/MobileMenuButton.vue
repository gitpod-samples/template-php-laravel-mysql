<script setup>
import { ref } from "vue";
import AccountSlideInModal from "@/Components/Modals/Account/AccountSlideInModal.vue";
import BaseButton from "../Base/BaseButton.vue";
import {mdiMenuLeft} from "@mdi/js";
import SettingsMenuModal from "../Modals/Menu/SettingsMenuModal.vue";



const emit = defineEmits(["close"]);
const menuList = ref(false);
const showMenuList = () => {
    menuList.value = true;
};

const close = () => {
    menuList.value = false;
};
</script>
<template>
    <div>
        <BaseButton @click="showMenuList" :icon="mdiMenuLeft" />


        <SettingsMenuModal :show="menuList" @close="close" />
    </div>
</template>
