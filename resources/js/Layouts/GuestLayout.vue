
<script setup>
import SectionFullScreen from "@/Components/Section/SectionFullScreen.vue";
import { computed} from "vue";
import GuestMainSection from "@/Components/Guset/GuestMainSection.vue";
import { useStyleStore } from "@/stores/style.js";

const props = defineProps({
    flexDirection: {
        type: String,
        default: "row",
    },
});
const flexClass = computed(() => {
    switch (props.flexDirection) {
        case "col":
            return "flex flex-col-reverse mt-12  md:justify-around md:px-6";
        default:
            return "";
    }
});

const styleStore = useStyleStore();
</script>
<template>
    <div  :class="{
      dark: styleStore.darkMode}">
        <div class="bg-gray-50 dark:bg-slate-800 dark:text-slate-100">
            <SectionFullScreen :flex-direction="props.flexDirection">
                <GuestMainSection :flex-direction="props.flexDirection" />
                <slot
                    card-class="w-11/12 md:w-7/12 lg:w-6/12 xl:w-4/12 shadow-2xl"
                    card-class-wide="w-11/12 md:w-9/12 max-w-2xl shadow-2xl"
                />
            </SectionFullScreen>
        </div>
    </div>
</template>
