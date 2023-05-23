<script setup>

import menuList from "@/Data/menusNavBar";
import MainNavBarList from "./MainNavBarList.vue";
import MainNavLogo from "@/Components/NavBar/MainNavBar/MainNavLogo.vue";
import MainNavBarRightSide from "@/Components/NavBar/MainNavBar/MainNavBarRightSide.vue";
</script>
<template>
    <div class="header-wrap relative">
        <nav
            class="section new-nav z-50 w-full max-w-none py-4 lg:py-3"
            style="height: 60px"
        >
            <div class="relative flex h-full items-center justify-between">
                <MainNavLogo />

                <MainNavBarList v-if="!route().current('home')"  :menu="menuList" />

               <MainNavBarRightSide />
            </div>
        </nav>
    </div>
</template>
