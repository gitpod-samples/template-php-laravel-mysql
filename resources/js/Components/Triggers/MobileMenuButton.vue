<script setup>
import { ref } from "vue";
import AccountSlideInModal from "@/Components/Modals/Account/AccountSlideInModal.vue";
import BaseButton from "../Base/BaseButton.vue";
import { mdiMenu } from "@mdi/js";
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
        <div>
            <div  @click="showMenuList"  class="block leading-none">
                <div class="hamburger-nav">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- <BaseButton @click="showMenuList" :icon="mdiMenu" /> -->

        <SettingsMenuModal :show="menuList" @close="close" />
    </div>
</template>
<style scoped>

.hamburger-nav {
    cursor: pointer;
    height: 19px;
    position: relative;
    transform: rotate(0deg);
    transition: .5s ease-in-out;
    width: 22px;
}
.hamburger-nav span {
    background: #fff;
    border-radius: 9px;
    display: block;
    height: 3px;
    margin-left: auto;
    opacity: 1;
    position: absolute;
    right: 0;
    transform: rotate(0deg);
    transition: .25s ease-in-out;
    width: 100%;
}
.hamburger-nav span:first-child {
    top: 0;
}
.hamburger-nav span:nth-child(2), .hamburger-nav span:nth-child(3) {
    top: 7px;
    width: 80%;
}
.hamburger-nav span:nth-child(4) {
    top: 14px;
    width: 60%;
}
</style>
