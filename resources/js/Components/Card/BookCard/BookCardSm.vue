<script setup>
import BaseIcon from "@/Components/Base/BaseIcon.vue";
import {mdiEye, mdiHeart} from "@mdi/js";
import vLazyImage from "v-lazy-image";
import { computed, ref } from "vue";
const props = defineProps({
    cardIs: {
        type: String,
        default: "tooling",
    },
    size: {
        type: String,
        default: "sm",
    },
});
const bookHref = ref('laravel-security-through-examples')
const baseClass = computed(() => {
    const base = [
        " series-thumbnail-card relative z-10 flex h-[144px] rounded-xl border-none text-white mobile:mx-auto lg:min-w-[164px] items-center  flex-1",
        props.size === "sm" ? "w-auto justify-center" : "w-full gap-x-5 p-6",
    ];
    switch (props.cardIs) {
        case "techniques":
            base.push("bg-gradient-left-techniques");
            break;
        case "languages":
            base.push("bg-gradient-left-languages");
            break;
        case "frameworks":
            base.push("bg-gradient-left-frameworks");
            break;
        case "tooling":
            base.push("bg-gradient-left-tooling");
            break;
        case "testing":
            base.push("bg-gradient-left-testing");
            break;
        default:
            base.push("bg-gradient-left-primary");
            break;
    }
    return base;
});
const imgWidth = computed(() => (props.size === "sm" ? "116" : "96"));
</script>
<template>
    <Link
        data-tooltip="Laravel Security Through Examples"
        :class="baseClass"
        :href="route('books.show', bookHref)"

    >
        <div
            :class="{ 'h-full w-full': props.size === 'sm' }"
            class="flex flex-shrink-0 items-center flex-center"
        >
            <vLazyImage
                src="/images/svg/techniques-default.svg"
                alt="Laravel Security Through Examples thumbnail"
                :width="imgWidth"
                :height="imgWidth"
            />
        </div>
        <div v-if="props.size === 'md'">
            <h3
                class=" link inline-flex items-start text-xl font-semibold tracking-tight text-white lg:h-12 lg:items-center"
            >
                <span
                    class="clamp two-lines inherits-color leading-tight"
                    title="Laravel Cookbook"
                    >Laravel Cookbook</span
                >
            </h3>
            <div class="mt-6 flex text-2xs">

                <div class="mr-4 flex items-center">
                    <BaseIcon size="13" :path="mdiEye" />
                    <span class="no-transition">20 Views</span>

                </div>
                <div class="flex items-center">
                    <BaseIcon size="13" :path="mdiHeart" />
                    <span class="no-transition">20 Likes</span>
                </div>
            </div>
        </div>
    </Link>

</template>
<style>
.card {
    --tw-bg-opacity: 1;
    --tw-text-opacity: 1;
    background-color: rgb(255 255 255/var(--tw-bg-opacity));
    border-color: rgba(120, 144, 156, .07);
    border-radius: .934rem;
    border-width: 1px;
    color: rgb(34 34 34/var(--tw-text-opacity));
    max-width: 100%;
    overflow: hidden;
    position: relative;
    width: 345px
}

@media(min-width:768px) {
    .card {
        height: 258px;
        width: 335px
    }
}

@media(min-width:992px) {
    .card {
        height: 258px;
        width: 345px
    }
}
</style>
