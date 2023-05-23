<script setup>
import menuList from '@/Data/menusNavBar';
import statsData from '@/Data/statsMenuBar';
import {computed} from 'vue';
import HomeMenuNavList from './HomeMenuNavList.vue';

const baseClass = computed(()=>{
    const base = [
        "code-menu hide-scrollbar top-0 z-10 mt-[80vw] md:mt-[50vw] h-auto w-full overflow-auto rounded-xl bg-blue-900 px-3 py-6 font-bold text-white lg:absolute lg:right-0 lg:ml-auto lg:mt-[80px] lg:w-[285px] xl:right-[5%] 2xl:right-[10%] widescreen:right-[18%]",
    ];
    return base;
})

</script>

<template>
    <div :class="baseClass">
        <HomeMenuNavList :menu="menuList" menuName="menu" />
        <HomeMenuNavList :menu="statsData" menuName="stats" />
    </div>
</template>
