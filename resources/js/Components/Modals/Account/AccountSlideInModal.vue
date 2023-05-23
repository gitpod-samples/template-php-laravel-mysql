<script setup>
import { computed } from "vue";
import accountMenuSideBar from '@/Data/accountMenuSideBar';
import SlideInOutModal from "../SlideInOutModal.vue";
import AccountSlideInModalHead from "./AccountSlideInModalHead.vue";
import AccountSlideInModalNav from "./AccountSlideInModalNav.vue";
import AccountSlideInModalNotification from "./AccountSlideInModalNotification.vue";
const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    slideDirection: {
        type: String,
        default: "left",
        validator: (value) => ["left", "right", "up", "down"].includes(value),
    },
    width: {
        type: String,
        default: null,
    },
    bg: {
        type: String,
        default: null,
    },
    maxWidth: {
        type: String,
        default: "2xl",
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(["close"]);

const close = () => {
    emit("close");
};
const maxWidthClass = computed(() => {
    return {
        sm: "sm:max-w-sm",
        md: "sm:max-w-md",
        lg: "sm:max-w-lg",
        xl: "sm:max-w-xl",
        "2xl": "sm:max-w-2xl",
    }[props.maxWidth];
});

const slotClass = computed(() => {
    const base = [
        "vfm__content account-slide-out-menu rounded-none flex flex-col ",
        props.width ? "w-["+ props.width +"px]" : "w-[625px]",
        props.bg ?? "bg-blue-900",
    ];
    return base;
});
</script>
<template>
    <SlideInOutModal :show="props.show" @close="close" slide-direction="left">
        <div
            aria-modal="true"
            :class="slotClass, maxWidthClass"
            style="width: 625px"
        >
            <div class="px-8 py-6 text-white">
                <div class="flex">
                    <div class="sm:relative flex-shrink-0 w-full sm:w-[200px]">
                        <AccountSlideInModalHead @close="close" />
                        <AccountSlideInModalNav :menu="accountMenuSideBar" />
                    </div>
                    <div class="hidden sm:block mx-6 h-auto w-px bg-deep-black mt-[50px]"></div>
                    <!--Notification-->
                    <AccountSlideInModalNotification />
                </div>
            </div>
        </div>
    </SlideInOutModal>
</template>
