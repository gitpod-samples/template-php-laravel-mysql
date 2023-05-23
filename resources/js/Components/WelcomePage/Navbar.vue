<script setup>
import { close, logo, menu } from "../../../assets/WelcomePage/index.js";

import { ref } from "vue";
import vLazyImage from "v-lazy-image";

defineProps({
    navLinks: Object,
});
const active = ref("Home");
const setActive = (navTitle) => {
    active.value = navTitle;
};
const menuShow = ref(false);
const setToggle = () => {
    menuShow.value = !menuShow.value;
};
</script>
<template>
    <nav class="relative z-[10] w-full flex py-6 justify-between items-center navbar">
        <vLazyImage :src="logo" alt="hoobank" class="w-[124px] h-[32px]" />

        <ul class="list-none hsm:flex hidden justify-end items-center flex-1">
            <li
                v-for="(nav, index) in navLinks"
                :key="nav.id"
                :class="`font-poppins font-normal cursor-pointer text-[16px] ${
                    active === nav.title ? 'text-white' : 'text-dimWhite'
                } ${index === navLinks.length - 1 ? 'mr-0' : 'mr-10'}`"
                @Click="() => setActive(nav.title)"
            >
                <a :href="`#${nav.id}`">{{ nav.title }}</a>
            </li>
        </ul>

        <div class="hsm:hidden flex flex-1 justify-end items-center">
            <img
                :src="menuShow ? close : menu"
                alt="menu"
                class="w-[28px] h-[28px] object-contain"
                @Click="() => setToggle"
            />

            <div
                :class="`${
                    menuShow ? 'flex' : 'hidden'
                } p-6 bg-black-gradient absolute top-20 right-0 mx-4 my-2 min-w-[140px] rounded-xl sidebar`"
            >
                <ul
                    class="list-none flex justify-end items-start flex-1 flex-col"
                >
                    <li
                        v-for="(nav, index) in navLinks"
                        :key="nav.id"
                        :class="`font-poppins font-normal cursor-pointer text-[16px] ${
                            active === nav.title
                                ? 'text-white'
                                : 'text-dimWhite'
                        } ${index === navLinks.length - 1 ? 'mb-0' : 'mb-4'}`"
                        @Click="() => setActive(nav.title)"
                    >
                        <a :href="`#${nav.id}`">{{ nav.title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
