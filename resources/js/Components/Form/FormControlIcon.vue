<script setup>
import {computed} from "vue";
import BaseIcon from "@/Components/Base/BaseIcon.vue";

const props = defineProps({
  icon: {
    type: String,
    default: null,
  },
  h: {
    type: String,
    default: null,
  },
  position:{
    type: String,
    default: "left",
  },
  pointerEve: Boolean,
  iconError: Boolean,
  iconSuccess: Boolean,
});
const iconClass = computed(() => {
  const base = [
    "absolute top-0 z-10   ",
    props.pointerEve? "cursor-pointer": "pointer-events-none",
    props.iconError ? " text-danger-700 dark:text-danger-600" :( props.iconSuccess? "text-emerald-700 dark:text-emerald-600":"text-gray-500 dark:text-slate-400"),
    props.position === "right" ? 'right-0': 'left-0',
  ];

  return base;
});

</script>

<template>
  <BaseIcon
    :path="icon"
    w="w-10"
    :h="h"
    :class="iconClass"
  />
</template>
