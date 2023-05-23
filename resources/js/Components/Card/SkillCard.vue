<script setup>
import {computed} from 'vue';

const props = defineProps({
    cardIs: {
        type: String,
        default: null,
    },

})
const cardType = computed(() => {
    const base = [];
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
</script>
<template>
    <a
        class="skill-card relative flex py-4 text-white md:w-1/3 lg:mb-0 lg:w-full lg:max-w-full lg:flex-1 lg:flex-shrink-0 lg:flex-col"
        href="https://laracasts.com/browse/testing"
    >
        <div class="text-center">
            <div class="flex flex-shrink-0 flex-center w-full">
                <img
                    loading="lazy"
                    class="skill-card-thumbnail"
                    :src="'/images/svg/'+props.cardIs+'-default.svg'"
                    alt="TESTING Skill"
                    width="125"
                    height="125"
                />
            </div>

            <h4
                class="mt-2 text-center text-xl font-medium leading-tight tracking-tight"
            >
                Testing
            </h4>
        </div>
        <div class="flex w-full flex-col justify-around py-5 md:py-0 lg:px-6">
            <div class="mt-4 flex items-center justify-around">
                <div class="text-center">
                    <div class="block">
                        <span class="block text-2xl font-medium text-white"
                            >13</span
                        ><span class="text-sm text-white/50 lg:text-grey-800"
                            >Series</span
                        >
                    </div>
                </div>
                <div class="text-center">
                    <span class="block text-2xl font-medium text-white"
                        >108</span
                    ><span class="text-sm text-white/50 lg:text-grey-800">
                        Videos
                    </span>
                </div>
            </div>
            <div class="mx-auto" style="width: 80%">
                <div
                    :class="cardType"
                    style="height: 4px; border-radius: 20px; margin-top: 20px"
                ></div>
                <div style="margin-top: 5px">
                    <div
                        class="bg-blue/10"
                        style="height: 4px; width: 38%; border-radius: 20px"
                    ></div>
                </div>
            </div>
        </div>
    </a>
</template>
