<script setup>

import menuList from "@/Data/menusNavBar";
import MainNavBarList from "@/Components/NavBar/MainNavBar/MainNavBarList.vue";
import MainNavLogo from "@/Components/NavBar/MainNavBar/MainNavLogo.vue";
import MainNavBarRightSide from "@/Components/NavBar/MainNavBar/MainNavBarRightSide.vue";
import GuestNavBar from '@/Components/Guset/GuestNavBar.vue';
</script>
<template>
    <div class="header-wrap relative">
        <nav
            class="section new-nav z-50 w-full max-w-none py-4 lg:py-3"
            style="height: 60px"
        >
            <div class="relative flex h-full items-center justify-between">
                <MainNavLogo />

                <MainNavBarList v-if="!route().current('home') && $page.props.auth.user"  :menu="menuList" />
                <template >
                    <MainNavBarRightSide v-if="$page.props.auth.user" />

                        <GuestNavBar v-else />

                </template >


            </div>
        </nav>
    </div>
</template>
