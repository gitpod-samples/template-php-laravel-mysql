<script setup>
import {computed} from 'vue';
import GuestNavBar from '@/Components/Guset/GuestNavBar.vue';
import GuestPageLogo from './GuestPageLogo.vue';
import GuestMainSectionFooter from './GuestMainSectionFooter.vue'
const props = defineProps({
    flexDirection: {
        type:String,
        default:"row",
    },
})
const flexClass = computed(() => {
    const base = [
    "gap-y-4 mb-8",
    props.flexDirection == "col" ? "flex flex-col-reverse mt-12  md:justify-around md:px-6":"",
    ]
    return base;

});

const baseClass = computed(()=>{
    const base = [
    "px-12",
    props.flexDirection == "col" ? "mb-12 flex flex-col gap-y-2":"",
    ]
    return base;
})
</script>
<template>
    <div :class="baseClass">
        <div :class="flexClass">
            <GuestNavBar />
            <GuestPageLogo :flex-direction="props.flexDirection" />
        </div>
        <GuestMainSectionFooter />
    </div>
</template>
