<script setup>
import { computed, onMounted, onUnmounted, watch } from "vue";

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    slideDirection:{
        type: String,
        default: 'left',
        validator: (value) => ["left", "right", "up", "down"].includes(value),
    },
    closeable: {
        type: Boolean,
        default: true,
    },

});

const emit = defineEmits(["close"]);

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = "hidden";
        } else {
            document.body.style.overflow = null;
        }
    }
);
const close = () => {
    if (props.closeable) {
        emit("close");
    }
};

const closeOnEscape = (e) => {
    if (e.key === "Escape" && props.show) {
        close();
    }
};

onMounted(() => document.addEventListener("keydown", closeOnEscape));

onUnmounted(() => {
    document.removeEventListener("keydown", closeOnEscape);
    document.body.style.overflow = null;
});

const containerClass = computed(()=>{
    const container = [
    "vfm__container vfm--absolute vfm--inset vfm--outline-none flex ",
    ]
    switch (props.slideDirection) {
        case 'left':
        container.push("justify-end");
            break;
        case 'right':
        container.push("justify-start");
            break;
        default:
        container.push("justify-center m-auto");
            break;
    }
    return container;
})

const transitionClass = computed(()=>{
    return{
        left: {
            enterFrom:"translate-x-full",
            enterTo:"translate-x-0",
            leaveFrom:"translate-x-0",
            leaveTo:"translate-x-full"
        },
        right: {
            enterFrom:"-translate-x-full",
            enterTo:"translate-x-0",
            leaveFrom:"translate-x-0",
            leaveTo:"-translate-x-full"
        },
        up: {
            enterFrom:"translate-y-full",
            enterTo:"translate-y-0",
            leaveFrom:"translate-y-0",
            leaveTo:"translate-y-full"
        },
        down: {
            enterFrom:"-translate-y-full",
            enterTo:"translate-y-0",
            leaveFrom:"translate-y-0",
            leaveTo:"-translate-y-full"
        },
    }[props.slideDirection];
})
</script>
<template>
    <teleport to="body">
        <transition
            enter-active-class="transition-opacity duration-300"
            enter-from-class="opacity-0 "
            enter-to-class="opacity-100"
            leave-active-class=" transition-opacity duration-300"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0 "
        >
            <div
                :aria-expanded="show"
                role="dialog"
                aria-modal="true"
                aria-hidden="true"
                v-show="show"
                style="z-index: 1000"
                class="vfm vfm--inset vfm--fixed vfm__overlay vfm--overlay"
            >
                <transition
                    enter-active-class="transition ease-in-out duration-300"
                    :enter-from-class="transitionClass.enterFrom"
                    :enter-to-class="transitionClass.enterTo"
                    leave-active-class="transition ease-in-out duration-200"
                    :leave-from-class="transitionClass.leaveFrom"
                    :leave-to-class="transitionClass.leaveTo"
                >
                    <div
                        v-show="show"
                        @click="close"
                        :class="containerClass"
                    >
                        <slot  />
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>
