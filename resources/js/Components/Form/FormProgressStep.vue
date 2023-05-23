<script setup>
import BaseIcon from '@/Components/Base/BaseIcon.vue';
import { mdiCheck } from "@mdi/js";
import {computed} from 'vue';

const props = defineProps({
  stepNumber: {
    type: Number,
    required: true,
  },
  stepDescription:{
    type:String,
    required: false,
  },
  stepSucc:{
    type: Boolean,
    required:true,
  },
  stepErr:{
    type: Boolean,
    required:true,
  },
  w: {
    type: String,
    default: "w-14",
  },
  h: {
    type: String,
    default: "h-14",
  },
  icon:{
    type:String,
    default: mdiCheck,
  },
  iconSize: {
    type: [String, Number],
    default: null,
  },
});

const iconSize = computed(() => props.iconSize ?? 20);
const warpperClass = computed(
  () => `z-10 rounded-full overflow-hidden ${props.w} ${props.h}`
);

</script>
<template>
    <div :class="warpperClass">
        <div :class="{'bg-danger-800': stepErr, 'bg-green-700': stepSucc,}" class="w-full bg-gray-700 h-full grid align-middle">
            <span
                v-if="!props.stepSucc"
                class="inline-flex self-center text-xl font-bold justify-center"            >
                {{ props.stepNumber }}
            </span>
            <div
                v-if="props.stepSucc"
                class="inline-flex self-center justify-center"
            >
                <BaseIcon
                    :path="props.icon"
                    w="w-12"
                    h="h-12"
                    :size="iconSize"
                    class="pointer-events-none text-gray-500 dark:text-slate-100"
                />
            </div>
        </div>
    </div>
</template>
