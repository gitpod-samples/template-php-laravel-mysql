<script setup>
import { computed, ref } from "vue";
import AccountSlideInModal from "@/Components/Modals/Account/AccountSlideInModal.vue";
import BaseButton from "../Base/BaseButton.vue";
import { mdiMenu } from "@mdi/js";
import SettingsMenuModal from "../Modals/Menu/SettingsMenuModal.vue";

const props = defineProps({
    size: {
        type: String,
        default: null,
    },
})
const emit = defineEmits(["close"]);
const menuList = ref(false);
const showMenuList = () => {
    menuList.value = true;
};

const close = () => {
    menuList.value = false;
};

const svgSize = computed(() =>
    props.size ?? "15"
);
</script>
<template>
    <button
        class="bg-blue/10 hover:border-blue/20 hover:text-blue mr-1 inline-flex rounded-xl border border-transparent p-2 sm:p-3 leading-none text-white transition-all"
        title="Tip: press / or s anywhere to instantly activate me.">
        <svg viewBox="0 0 15 15" :width="svgSize" >
            <g fill-rule="evenodd" fill="none">
                <path d="M-2-2h20v20H-2z"></path>
                <path class="fill-current"
                    d="M10.443 9.232h-.638l-.226-.218A5.223 5.223 0 0 0 10.846 5.6 5.247 5.247 0 1 0 5.6 10.846c1.3 0 2.494-.476 3.414-1.267l.218.226v.638l4.036 4.028 1.203-1.203-4.028-4.036zm-4.843 0A3.627 3.627 0 0 1 1.967 5.6 3.627 3.627 0 0 1 5.6 1.967 3.627 3.627 0 0 1 9.232 5.6 3.627 3.627 0 0 1 5.6 9.232z">
                </path>
            </g>
        </svg>
    </button>
</template>

